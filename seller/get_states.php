<?php
// Include the Database class
require_once './classes/Database.php';

// Instantiate the Database class
$db = new Database();
$conn = $db->connect();

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch states
$sql = "SELECT * FROM states order by name asc";
$result = $conn->query($sql);

$options = '<option value="">Select a state</option>';
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $options .= '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
    }
}

$conn->close();
