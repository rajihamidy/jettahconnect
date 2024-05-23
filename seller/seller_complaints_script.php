<?php
// Set the default timezone to Africa/Lagos
date_default_timezone_set('Africa/Lagos');

// Get the current date and time
$currentDateTime = date('d-m-Y h:i A');


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Database connection (replace with your actual database connection code)
require_once './classes/Database.php';
// Check if all POST values are set
if (isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['complaints'])) {
    // Handle file upload
    $targetDir = "complaints/"; // Folder to store complaints
    if (!(isset($_FILES['file']))) {
        $fileName = "";
    } else {
        $fileName = basename($_FILES["file"]["name"]);
    }

    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Validate email
    if ($_POST['email'] === "") {
        echo "<div class='text-danger'>Email cannot be empty.</div>";
        exit;
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        echo "<div class='text-danger'>Invalid email format.</div>";
        exit;
    }

    // Validate phone number
    $phoneRegex = "/^(08|07|09)[01][0-9]{8}$/";
    if (!preg_match($phoneRegex, $_POST['phone'])) {
        echo "<div class='text-danger'>
        Invalid phone number format. Phone numbers must start with 08, 07, or 09 followed by 01 and any 8 digits.</div>";
        exit;
    }

    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $complaints = $_POST['complaints'];
    $userid = $_SESSION['admin_id'];

    if (isset($_FILES['file'])) {
        $allowTypes = array('pdf', 'jpeg', 'jpg');
        if (in_array($fileType, $allowTypes)) {
            // Upload file to the server
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
                // Insert file details into database

                $sql = "INSERT INTO seller_complaints (user_id,email, phone, complaints, file_name, submDate) VALUES ('$userid','$email', '$phone', '$complaints', '$fileName', '$currentDateTime')";
                if ($conn->query($sql) === TRUE) {
                    echo "<div class='text-success'>Complaints submitted successfully with file uploads.</div>";
                } else {
                    echo "<div class='text-danger'>Error: " . $sql . "<br>" . $con->error . "</div>";
                }
            } else {
                echo "<div class='text-danger'>Sorry, there was an error uploading your file.</div>";
            }
        } else {
            echo "<div class='text-danger'>Invalid file type. Allowed types: PDF, JPEG, JPG.</div>";
        }
    } else {
        $allowTypes = array('pdf', 'jpeg', 'jpg');

        // Insert file details into database
        $sql = "INSERT INTO seller_complaints (user_id,email, phone, complaints, submDate) VALUES ('$userid','$email', '$phone', '$complaints', '$currentDateTime')";
        if ($conn->query($sql) === TRUE) {
            echo "<div class='text-success'>Complaints submitted successfully without files.</div>";
        } else {
            echo "<div class='text-danger'>Error: " . $sql . "<br>" . $con->error . "</div>";
        }
    }
    // Check if file is a valid image
} else {
    echo "<div class='text-danger'>Incomplete form submission. Please fill in all required fields.</div>";
}

$conn->close();
