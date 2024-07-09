<?php
session_start();
require 'Database.php'; // Include the Database class

header('Content-Type: application/json');
$response = array('status' => false, 'message' => 'An error occurred');

if (isset($_POST['admin_email']) && isset($_POST['reference']) && isset($_POST['date_time']) && isset($_POST['amount']) && isset($_POST['previousbalance']) && isset($_POST['newbalance'])) {
    $admin_email = $_POST['admin_email'];
    $reference = $_POST['reference'];
    $date_time = $_POST['date_time'];
    $amount = $_POST['amount'];
    $previousbalance = $_POST['previousbalance'];
    $newbalance = $_POST['newbalance'];
    $admin_email = $_SESSION['admin_email'];

    // Create a new Database object and connect
    $db = new Database();
    $conn = $db->connect();

    // Insert into withdrawal table
    $insertWithdrawalSql = "INSERT INTO withdrawal (seller_email, reference, date_time, amount, previousbalance, newbalance) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insertWithdrawalSql);
    $stmt->bind_param("ssssss", $admin_email, $reference, $date_time, $amount, $previousbalance, $newbalance);

    if ($stmt->execute()) {
        // Update admin wallet
        $updateWalletSql = "UPDATE admin SET wallet = ? WHERE email = ?";
        $stmt = $conn->prepare($updateWalletSql);
        $stmt->bind_param("ds", $newbalance, $admin_email);

        if ($stmt->execute()) {
            $response['status'] = true;
            $response['message'] = 'Withdrawal recorded and wallet updated successfully!';
        } else {
            $response['message'] = 'Failed to update wallet: ' . $stmt->error;
        }
    } else {
        $response['message'] = 'Failed to record withdrawal: ' . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    $response['message'] = 'Required fields are missing';
}

echo json_encode($response);
?>
