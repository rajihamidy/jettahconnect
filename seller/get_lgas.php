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

// Fetch LGAs based on the selected state
$stateId = $_POST['state_id']; // Make sure to sanitize this input to prevent SQL injection
$sql = "SELECT * FROM lgas WHERE state_id = $stateId";
$result = $conn->query($sql);

$options = '<option value="">Select an LGA</option>';
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $options .= '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
        //                    ^^^^^^^^^^^ Change this to use the ID
    }
}

echo $options;

$conn->close();
?>
