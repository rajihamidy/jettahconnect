<?php
require 'Database.php';

// Retrieve the order_id sent via POST
if ($_POST['trx_id']) {
    $trx_id = $_POST['trx_id'];

    // Prepare and execute the SQL update statement
    $sql = "UPDATE orders SET p_status = 'Completed' WHERE trx_id = '$trx_id'";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo "Customer Order Updated.";
    } else {
        echo "Error during update.";
    }
} else {
    echo "No value posted.";
}
