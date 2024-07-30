<?php

//group_chat.php

include('database_connection.php');

session_start();
if (isset($_SESSION['admin_userid'])) {
    $name = $_SESSION['admin_userid'];
} elseif (isset($_SESSION['admin_id'])) {
    $name = $_SESSION['admin_id'];
}
if($_POST["action"] == "insert_data")
{
	$data = array(
		':from_user_id'		=>	$name,
		':chat_message'		=>	$_POST['chat_message'],
		':status'			=>	'1'
	);

	$query = "
	INSERT INTO chat_message 
	(from_user_id, chat_message, status) 
	VALUES (:from_user_id, :chat_message, :status)
	";

	$statement = $connect->prepare($query);

	if($statement->execute($data))
	{
		echo fetch_group_chat_history($connect);
	}

}

if($_POST["action"] == "fetch_data")
{
	echo fetch_group_chat_history($connect);
}

?>