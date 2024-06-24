<?php
include 'classes/Database.php';

// Create a new instance of the Database class and connect to the database
$db = new Database();
$con = $db->connect();

// Get the JSON data from the POST request
$data = json_decode(file_get_contents("php://input"), true);

$check = $data['check'];

// Validate the 'check' parameter and necessary data
if (!isset($check)) {
    echo "Invalid operation";
    exit;
}

if (empty($data['complaint_id']) || empty($data['replierEmail']) || empty($data['reply']) || empty($data['reply_date'])) {
    echo "All fields are required";
    exit;
}

$complaint_id = $data['complaint_id'];
$replierEmail = $data['replierEmail'];
$reply = $data['reply'];
$reply_date = $data['reply_date'];

// Ensure the reply is not empty
if (trim($reply) === '') {
    echo "Reply cannot be empty";
    exit;
}

// Process based on the value of the 'check' parameter
if ($check === 'reply_to_customer') {
    // Prepare and bind
    $stmt = $con->prepare("INSERT INTO customer_complaints_replies (complaint_id, replier_email, reply_text, reply_date) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $complaint_id, $replierEmail, $reply, $reply_date);

    if ($stmt->execute()) {
        echo "Reply sent successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
} elseif ($check === 'reply_to_seller') {
    // Prepare and bind
    $stmt = $con->prepare("INSERT INTO seller_complaints_replies (complaint_id, replier_email, reply_text, reply_date) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $complaint_id, $replierEmail, $reply, $reply_date);

    if ($stmt->execute()) {
        echo "Reply sent successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Invalid operation";
}

$con->close();
