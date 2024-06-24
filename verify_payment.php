<?php
header('Content-Type: application/json');
include 'sk.php';



// Get the reference from the request body
$input = file_get_contents('php://input');
$request = json_decode($input, true);

if (!isset($request['reference'])) {
    echo json_encode(['status' => 'error', 'message' => 'No reference provided']);
    exit;
}

$reference = $request['reference'];

// Initialize cURL
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, "https://api.paystack.co/transaction/verify/$reference");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
   // "Authorization: Bearer " . $Tsk
    "Authorization: Bearer " . $sk
]);

// Execute cURL request
$response = curl_exec($ch);

// Check for cURL errors
if (curl_errno($ch)) {
    echo json_encode(['status' => 'error', 'message' => 'Curl error: ' . curl_error($ch)]);
    exit;
}

// Close cURL resource
curl_close($ch);

$responseData = json_decode($response, true);

if ($responseData['status']) {
    if ($responseData['data']['status'] === 'success') {
        echo json_encode(['status' => 'success', 'message' => 'Payment verified successfully']);
    } else {
        echo json_encode(['status' => 'failure', 'message' => 'Payment verification failed']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Verification error: ' . $responseData['message']]);
}

