<?php
require 'db.php';

// Retrieve the order_id sent via POST
if ($_POST['trx_id']) {
    $trx_id = $_POST['trx_id'];

    // Prepare and execute the SQL update statement
    $sql = "UPDATE orders SET received_Status = 'Item Received' WHERE trx_id = '$trx_id'";
    $query = mysqli_query($con, $sql);
    if ($query) {
        echo "Delivery Status Updated.";
    } else {
        echo "Error during Status Update.";
    }
} else {
    echo "No value posted.";
}
