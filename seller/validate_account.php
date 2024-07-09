<?php
require 'variables.php';
session_start();

if (isset($_POST['accountNumber']) && isset($_POST['bankCode']) && isset($_POST['amount']) ) {
    $accountNumber = $_POST['accountNumber'];
    $bankCode = $_POST['bankCode'];
    $amount = $_POST['amount'];
    $accountBalance = $_SESSION['accountbalance'];
    $fee = 50;

    // Check if the amount plus fee exceeds the account balance
    if (($amount + $fee) > $accountBalance) {
        echo json_encode(array('status' => false, 'message' => 'The amount you attempt to withdraw is greater than your wallet balance.'));
        exit;
    }

    // Set your Paystack secret key
    // $paystackSecretKey should be defined in variables.php

    // Set the Paystack API endpoint
    $url = "https://api.paystack.co/bank/resolve?account_number={$accountNumber}&bank_code={$bankCode}";

    // Initialize cURL session
    $ch = curl_init();

    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Authorization: Bearer ' . $paystackSecretKey,
        'Content-Type: application/json'
    ));

    // Execute cURL request
    $response = curl_exec($ch);

    // Check for cURL errors
    if ($response === false) {
        echo json_encode(array('status' => false, 'message' => curl_error($ch)));
    } else {
        // Decode and return the response
        echo $response;
    }

    // Close cURL session
    curl_close($ch);
} else {
    echo json_encode(array('status' => false, 'message' => 'Invalid parameters.'));
}
