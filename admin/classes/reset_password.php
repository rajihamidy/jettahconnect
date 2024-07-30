<?php
include "Database.php";
session_start();

if (isset($_POST['email']) && isset($_POST['recovery_code']) && isset($_POST['new_password']) && isset($_POST['cnew_password'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $recovery_code = mysqli_real_escape_string($con, $_POST['recovery_code']);
    $new_password = mysqli_real_escape_string($con, $_POST['new_password']);
    $cnew_password = mysqli_real_escape_string($con, $_POST['cnew_password']);
    // Validate that the new passwords match
    if ($new_password !== $cnew_password) {
        echo "<div class='text-danger'>Password not match.</div>";
        exit;
    }
    // Additional password validation (e.g., length, complexity)
    if (strlen($new_password) < 8) {
        echo "<div class='text-danger'>Password must be at least 8 characters long.<div>";
        exit;
    }
    // You can add more complex validations here, such as checking for numbers, uppercase letters, etc.

    //$hashed_password = password_hash($new_password, PASSWORD_BCRYPT); // Hash the new password
    $hashed_password = md5($new_password); // Using md5 is not recommended for passwords

    $sql = "SELECT recovery_code, recovery_expiration FROM masteradmin WHERE email = '$email'";
    $run_query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($run_query);

    if ($row) {
        $stored_recovery_code = $row['recovery_code'];
        $recovery_expiration = $row['recovery_expiration'];

        // Check if the recovery code matches and is not expired
        if ($recovery_code === $stored_recovery_code && strtotime($recovery_expiration) > time()) {
            $update_sql = "UPDATE masteradmin SET password = '$hashed_password', recovery_code = NULL, recovery_expiration = NULL WHERE email = '$email'";
            if (mysqli_query($conn, $update_sql)) {
                echo "<div class='text-primary'>Your password has been successfully reset.</div>";
            } else {
                echo "<div class='text-danger'>Failed to update the password. Please try again.</div>";
            }
        } else {
            echo "<div class='text-danger'>Invalid or expired recovery code.<div>";
        }
    } else {
        echo "<div class='text-danger>No user found with that email address.</div>";
    }
} else {
    echo "<div class='text-danger'>All fields are required.</div>";
}
