<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the posted JSON data
    $postData = file_get_contents("php://input");

    // Log or print raw JSON data for debugging
    // error_log("Received JSON data: " . $postData); // Uncomment to log data to error log
    // echo "Received JSON data: " . $postData; // Uncomment to echo data for debugging

    // Decode the JSON data into PHP array
    $dataArray = json_decode($postData, true);

    // Check if decoding was successful and if data array contains values
    if ($dataArray !== null && !empty($dataArray)) {
        // Initialize arrays to store unique records
        $uniqueRecords = array();

        // Process the received data
        foreach ($dataArray as $data) {
            // Access individual fields and escape them
            $userId = mysqli_real_escape_string($con, $data['user_id']);
            $productId = mysqli_real_escape_string($con, $data['product_id']);
            $trxId = mysqli_real_escape_string($con, $data['trx_id']);
            $delM = mysqli_real_escape_string($con, $data['delM']);
            $address = mysqli_real_escape_string($con, $data['address']);
            // Check if the combination of user_id, product_id, and trx_id already exists in the uniqueRecords array
            $recordKey = $userId . $productId . $trxId;
            if (!isset($uniqueRecords[$recordKey])) {
                // Record is unique, add it to the uniqueRecords array
                $uniqueRecords[$recordKey] = $data;
            }
        }

        // Initialize the SQL string for multi-query
        $sql = "";

        // Insert the unique records into the orders table
        foreach ($uniqueRecords as $record) {
            $userId = mysqli_real_escape_string($con, $record['user_id']);
            $productId = mysqli_real_escape_string($con, $record['product_id']);
            $qty = mysqli_real_escape_string($con, $record['qty']);
            $trxId = mysqli_real_escape_string($con, $record['trx_id']);
            $pStatus = mysqli_real_escape_string($con, $record['p_status']);
            $sellerId = mysqli_real_escape_string($con, $record['seller_id']);
            $delM = mysqli_real_escape_string($con, $record['delM']);
            $address = mysqli_real_escape_string($con, $record['address']);

            // Set the time zone
            $timeZone = new DateTimeZone('Africa/Lagos');

            // Create a DateTime object with the current date and time in the specified time zone
            $dateTime = new DateTime('now', $timeZone);

            // Format the date and time
            $currentDateTime = $dateTime->format('Y-m-d H:i:s');

            // Insert the record into the orders table
            $sql .= "INSERT INTO orders (user_id, product_id, qty, trx_id, delM, addres, p_status, seller_id, orderdate) 
                    VALUES ('$userId', '$productId', '$qty', '$trxId', '$delM', '$address', '$pStatus', '$sellerId', '$currentDateTime');";

            // Update the cart table for each record individually
            $sql .= "UPDATE cart SET order_status = 'Ordered' WHERE user_id = '$userId';";
        }

        // Execute multi-query if there are SQL statements to execute
        if (!empty($sql)) {
            if (mysqli_multi_query($con, $sql)) {
                do {
                    // Check if there are more results
                    if ($result = mysqli_store_result($con)) {
                        // Free result set
                        mysqli_free_result($result);
                    }
                } while (mysqli_next_result($con));
                echo "Records inserted and cart updated successfully";
            } else {
                echo "Error: " . mysqli_error($con);
            }
        } else {
            echo "No valid data to process";
        }
    } else {
        // JSON decoding failed or empty data array
        echo "Error decoding JSON data or empty data array";
        // Optional: Print JSON decoding error details for debugging
        echo "JSON Error: " . json_last_error_msg();
    }
} else {
    // Request method is not POST
    echo "Invalid request method";
}
