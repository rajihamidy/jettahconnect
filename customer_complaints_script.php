<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Database connection (replace with your actual database connection code)
require "db.php";
// Check if all POST values are set
if (isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['complaints']) && isset($_FILES['file'])) {
    // Handle file upload
    $targetDir = "complaints/"; // Folder to store complaints
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Validate email
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
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

    // Check if file is a valid image
    $allowTypes = array('pdf', 'jpeg', 'jpg');
    if (in_array($fileType, $allowTypes)) {
        // Upload file to the server
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
            // Insert file details into database
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $complaints = $_POST['complaints'];
            $userid =$_SESSION['uid'];
            $sql = "INSERT INTO customer_complaints (user_id,email, phone, complaints, file_name) VALUES ('$userid','$email', '$phone', '$complaints', '$fileName')";
            if ($con->query($sql) === TRUE) {
                echo "<div class='text-success'>File uploaded successfully and data saved into database.</div>";
            } else {
                echo "<div class='text-danger'>Error: " . $sql . "<br>" . $con->error."</div>";
            }
        } else {
            echo "<div class='text-danger'>Sorry, there was an error uploading your file.</div>";
        }
    } else {
        echo "<div class='text-danger'>Invalid file type. Allowed types: PDF, JPEG, JPG.</div>";
    }
} else {
    echo "<div class='text-danger'>Incomplete form submission. Please fill in all required fields.</div>";
}

$con->close();

