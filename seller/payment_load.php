<?php
// Enable error reporting for debugging purposes
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Define your Paystack API credentials and other necessary details
require 'variables.php';
require 'uniquereference.php';
require './classes/Database.php'; // Include the Database class
session_start();
header('Content-Type: application/json'); // Set the content type to JSON

$response = array('status' => false, 'message' => 'An error occurred'); // Default response

if (isset($_POST['bankName'])) {
    $bankname = $_POST['bankName'];
    $destinationAccountNumber = $_POST['accountNumber'];
    $destinationBankCode = $_POST['bankCode'];
    $amount = $_POST['amount'] + 50; // to be debited from his account
    $amount1 = $_POST['amount']; // to be debited from paystack and credit the sellers account

    // Create a new Database object and connect
    $db = new Database();
    $conn = $db->connect();

    // Fetch previous balance from admin table
    $admin_email = $_SESSION['admin_email'];
    $query = "SELECT wallet FROM admin WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $admin_email);
    $stmt->execute();
    $result = $stmt->get_result();
    $adminData = $result->fetch_assoc();
    $previousBalance = $adminData['wallet'];
    $newBalance = $previousBalance - $amount;

    // Construct the payload for the transfer
    $transferPayload = array(
        "source" => "balance",
        "reason" => "Single Transaction Withdrawal",
        "amount" => ($amount1) * 100,  // Amount in kobo
        "recipient" => $uniqueReference
    );

    // Get the recipient code (or create a recipient if not already created)
    $recipientPayload = array(
        "type" => "nuban",
        "name" => $bankname,
        "description" => "Recipient for fund transfer",
        "account_number" => $destinationAccountNumber,
        "bank_code" => $destinationBankCode,
        "currency" => "NGN"
    );

    // Set headers including the authorization token
    $headers = array(
        'Content-Type: application/json',
        'Authorization: Bearer ' . $paystackSecretKey
    );

    // Create recipient
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.paystack.co/transferrecipient');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($recipientPayload));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $recipientResponse = curl_exec($ch);
    if ($recipientResponse === false) {
        $response['message'] = 'Curl error: ' . curl_error($ch);
    } else {
        $recipientData = json_decode($recipientResponse, true);
        if (isset($recipientData['status']) && $recipientData['status'] === true) {
            $recipientCode = $recipientData['data']['recipient_code'];

            // Add the recipient code to the transfer payload
            $transferPayload['recipient'] = $recipientCode;

            // Make the transfer
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://api.paystack.co/transfer');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($transferPayload));
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            $transferResponse = curl_exec($ch);
            if ($transferResponse === false) {
                $response['message'] = 'Curl error: ' . curl_error($ch);
            } else {
                $transferData = json_decode($transferResponse, true);
                if (isset($transferData['status']) && $transferData['status'] === true) {
                    $response['status'] = true;
                    $response['message'] = 'Transfer initiated successfully!';
                    $response['data'] = array(
                        'amount' => ($transferData['data']['amount']) / 100,
                        'reference' => $transferData['data']['reference'],
                        'status' => $transferData['data']['status'],
                        'admin_email' => $admin_email,
                        'previousbalance' => $previousBalance,
                        'newbalance' => $newBalance
                    );
                } else {
                    $response['message'] = 'Error occurred: ' . $transferData['message'];
                }
            }
            curl_close($ch);
        } else {
            $response['message'] = 'Error occurred: ' . $recipientData['message'];
        }
    }
    curl_close($ch);
} else {
    $response['message'] = 'Required fields are missing';
}

// Output the JSON response
echo json_encode($response);
?>
