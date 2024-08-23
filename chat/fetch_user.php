<?php

//fetch_user.php

include('database_connection.php');

session_start();

$output = '
<table class="table table-bordered table-striped">
	<tr>
	<th width="10%">SN</th>
		<th width="60%">Username</th>
		<th width="20%">Status</th>
		<th width="10%">Action</th>
	</tr>
';

if (isset($_SESSION['admin_id'])) {
	// If an admin is logged in, show the list of users
	$query = "
	SELECT DISTINCT user_info.user_id, CONCAT(user_info.first_name, ' ', user_info.last_name) AS username 
	FROM user_info 
	INNER JOIN chat_message ON user_info.user_id = chat_message.from_user_id 
	WHERE chat_message.to_user_id = '" . $_SESSION['admin_id'] . "'
	";
	$session_user_id = $_SESSION['admin_id'];
	$statement = $connect->prepare($query);
	$statement->execute();
	$users = $statement->fetchAll();

	$hasChat = false;
	$sn = 0;
	foreach ($users as $row) {
		$sn++;
		$status = '';
		$current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 seconds');
		$current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
		$user_last_activity = fetch_user_last_activity($row['user_id'], $connect);
		if ($user_last_activity > $current_timestamp) {
			$status = '<span class="label label-success">Online</span>';
		} else {
			$status = '<span class="label label-danger">Offline</span>';
		}

		// Get the count of unseen messages
		$unseen_message_count = count_unseen_message($row['user_id'], $session_user_id, $connect);

		// Check if there is at least 1 unseen message
		/*	if($unseen_message_count > 0)
	{
		$hasChat = true; */
		$output .= '
		<tr>
		<td>' . $sn . '</td>
			<td>' . $row['username'] . ' ' . $unseen_message_count . ' ' . fetch_is_type_status($row['user_id'], $connect) . '</td>
			<td>' . $status . '</td>
			<td><button type="button" class="btn btn-info btn-xs start_chat" data-touserid="' . $row['user_id'] . '" data-tousername="' . $row['username'] . '">Start Chat</button></td>
		</tr>
		';
		//}
	}
	/*
if (!$hasChat) {
	$output .= '
	<tr>
		<td colspan="3" align="center">No New Chat available</td>
	</tr>
	';
} */
} elseif (isset($_SESSION['uid']) && !(isset($_SESSION['start_chat']))) {
	// If a user is logged in, show the admin
	$query = "
	SELECT id AS user_id, name AS username FROM admin
	WHERE id = '" . $_SESSION['admin_userid'] . "'
	";
	$session_user_id = $_SESSION['uid'];
	$statement = $connect->prepare($query);
	$statement->execute();
	$users = $statement->fetchAll();

	$hasChat = false;
	$sn = 0;
	foreach ($users as $row) {
		$sn++;
		$status = '';
		$current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 seconds');
		$current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
		$user_last_activity = fetch_user_last_activity($row['user_id'], $connect);
		if ($user_last_activity > $current_timestamp) {
			$status = '<span class="label label-success">Online</span>';
		} else {
			$status = '<span class="label label-danger">Offline</span>';
		}

		// Get the count of unseen messages
		$unseen_message_count = count_unseen_message($row['user_id'], $session_user_id, $connect);

		// Check if there is at least 1 unseen message
		/*	if($unseen_message_count > 0)
		{
			$hasChat = true; */
		$output .= '
			<tr>
			<td>' . $sn . '</td>
				<td>' . $row['username'] . ' ' . $unseen_message_count . ' ' . fetch_is_type_status($row['user_id'], $connect) . '</td>
				<td>' . $status . '</td>
				<td><button type="button" class="btn btn-info btn-xs start_chat" data-touserid="' . $row['user_id'] . '" data-tousername="' . $row['username'] . '">Start Chat</button></td>
			</tr>
			';
		//}
	}
	/*
	if (!$hasChat) {
		$output .= '
		<tr>
			<td colspan="3" align="center">No New Chat available</td>
		</tr>
		';
	} */
}
if (isset($_SESSION['start_chat']) && $_SESSION['start_chat'] === true) {
	// If an admin is logged in, show the list of users
	$query = "
SELECT DISTINCT user_info.user_id, CONCAT(user_info.first_name, ' ', user_info.last_name) AS username 
FROM user_info 
INNER JOIN chat_message ON user_info.user_id = chat_message.from_user_id and user_info.user_id = chat_message.to_user_id 

";
	$session_user_id = $_SESSION['uid'];
	$statement = $connect->prepare($query);
	$statement->execute();
	$users = $statement->fetchAll();

	$hasChat = false;
	$sn = 0;
	foreach ($users as $row) {
		$sn++;
		$status = '';
		$current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 seconds');
		$current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
		$user_last_activity = fetch_user_last_activity($row['user_id'], $connect);
		if ($user_last_activity > $current_timestamp) {
			$status = '<span class="label label-success">Online</span>';
		} else {
			$status = '<span class="label label-danger">Offline</span>';
		}

		// Get the count of unseen messages
		$unseen_message_count = count_unseen_message($row['user_id'], $session_user_id, $connect);

		// Check if there is at least 1 unseen message
		/*	if($unseen_message_count > 0)
{
	$hasChat = true; */
		$output .= '
	<tr>
	<td>' . $sn . '</td>
		<td>' . $row['username'] . ' ' . $unseen_message_count . ' ' . fetch_is_type_status($row['user_id'], $connect) . '</td>
		<td>' . $status . '</td>
		<td><button type="button" class="btn btn-info btn-xs start_chat" data-touserid="' . $row['user_id'] . '" data-tousername="' . $row['username'] . '">Start Chat</button></td>
	</tr>
	';
	$_SESSION['start_chat'] = false;
		//}
	}
	
} else {
	// No one is logged in
	echo $output . '</table>';
	exit;
}



$output .= '</table>';

echo $output;
