<?php
include 'sk.php';
$url = "https://api.paystack.co/transaction/initialize";
if ($_SERVER['HTTP_HOST'] === 'localhost') {
    $callback_url = "http://localhost/jettahconnect/verify_payment.php";
    $cancel_url = "http://localhost/jettahconnect/index.php";
} else {
    $callback_url = "https://www.jettahconnect.com/index.php";
}

$fields = [
    'email' => $_POST['email'],
    'amount' => $_POST['amount'],
    'callback_url' => $callback_url,
    'metadata' => json_encode(["cancel_action" => $callback_url])
];

$fields_string = http_build_query($fields);

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Authorization: Bearer " . $sk, // Replace YOUR_SECRET_KEY with your Paystack secret key
    "Cache-Control: no-cache",
));

//So that curl_exec returns the contents of the cURL; rather than echoing it
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//execute post
$result = curl_exec($ch);

echo $result;

