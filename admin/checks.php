<?php
// Check if a session is already started
if (session_status() == PHP_SESSION_NONE) {
    // Start the session
    session_start();
}

// Check if the session variable 'masteradmin_name' is not set
if (!isset($_SESSION['masteradmin_name'])|| !isset($_SESSION['masteradmin_id'])) {
    // Redirect to login.php
    header("Location: login.php");
    // Ensure that the script stops executing after the redirect
    exit();
}
?>
