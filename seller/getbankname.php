
<?php
require 'variables.php';
$url = "https://api.paystack.co/bank";
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Authorization: Bearer ' . $paystackSecretKey, // Replace with your actual secret key
    "Cache-Control: no-cache",
));

$response = curl_exec($ch);
curl_close($ch);

$banks = json_decode($response, true);
if ($banks['status']) {
    echo "<option value=''>" . "Select a bank" . "</option>";
    foreach ($banks['data'] as $bank) {
        
        echo "<option value='" . $bank['code'] . "'>" . $bank['name'] . "</option>";
    }
} else {
    echo "<option value=''>Unable to load banks</option>";
}
?>
