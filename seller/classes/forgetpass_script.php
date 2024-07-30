<?php
include "Database.php";

session_start();
error_reporting(0);
if (isset($_POST["email"])) {
    $email = mysqli_real_escape_string($conn, $_POST["email"]);

    $sql = "SELECT * FROM admin WHERE email = '$email'";
    $run_query = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($run_query);

    if ($count == 1) {

        //        $recovery_code = bin2hex(random_bytes(16));
        $recovery_code = random_int(1000000, 9999999);

        // Optionally, cast to string if needed
        $recovery_code = (string)$recovery_code;
        $recovery_expiration = date("Y-m-d H:i:s", strtotime('+1 hour'));

        $update_sql = "UPDATE admin SET recovery_code = '$recovery_code', recovery_expiration = '$recovery_expiration' WHERE email = '$email'";
        if (mysqli_query($conn, $update_sql)) {
            sendRecoveryEmail($email, $recovery_code);
            echo "<div class='text-primary'>A recovery email has been sent to your email address.</div>";
        } else {
            echo "<div class='text-danger'>Failed to set recovery code. Please try again.</div>";
        }
    } else {
        echo "<span style='color:red;'>No user with $email found.</span>";
    }
}

function sendRecoveryEmail($email, $recovery_code)
{
    $subject = "Password Recovery";
    $message = "Use the following recovery code to reset your password: $recovery_code\n\n";
    $message .= "This code will expire in 1 hour.";
    $headers = "From: noreply@jettahconnect.com.ng";

    mail($email, $subject, $message, $headers);
}
