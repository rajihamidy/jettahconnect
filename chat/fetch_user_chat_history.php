<?php

//fetch_user_chat_history.php

include('database_connection.php');

session_start();

// Initialize name variable
$name = '';

// Check for active session
if (isset($_SESSION['admin_id'])) {
    $from_user_id = $_SESSION['admin_id'];
} elseif (isset($_SESSION['uid'])) {
    $from_user_id = $_SESSION['uid'];
} else {
    echo "User not logged in.";
    exit;
}


echo fetch_user_chat_history($from_user_id, $_POST['to_user_id'], $connect);

?>