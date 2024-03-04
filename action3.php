<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the posted JSON data
    $postData = file_get_contents("php://input");

    // Decode the JSON data into PHP array
    $dataArray = json_decode($postData, true);

    // Check if decoding was successful
    if ($dataArray !== null) {
        // Initialize arrays to store unique records
        $uniqueRecords = array();

        // Process the received data
        foreach ($dataArray as $data) {
            // Access individual fields and escape them
            $userId = mysqli_real_escape_string($con, $data['user_id']);
            $productId = mysqli_real_escape_string($con, $data['product_id']);
            $seller_Email = mysqli_real_escape_string($con, $data['seller_Email']);
            $trxId = mysqli_real_escape_string($con, $data['trx_id']);

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
            $seller_Email = mysqli_real_escape_string($con, $record['seller_Email']);
            $qty = mysqli_real_escape_string($con, $record['qty']);
            $trxId = mysqli_real_escape_string($con, $record['trx_id']);
           // $pStatus = mysqli_real_escape_string($con, $record['p_status']);
           $pStatus = 'Completed';
            $sellerId = mysqli_real_escape_string($con, $record['seller_id']);
            // Set the time zone
            $timeZone = new DateTimeZone('Africa/Lagos');

            // Create a DateTime object with the current date and time in the specified time zone
            $dateTime = new DateTime('now', $timeZone);

            // Format the date and time
            $currentDateTime = $dateTime->format('Y-m-d H:i:s');

            // send email to Seller
            $subject = "New order Payment Notification from Jettah Customer";
            $body  ='<p>New payment has been made for products, Kindly Login to your profile to supply the Orders</p><br/><br/><hr/>';
           // $body .='<p>Full Name:  '.$full_name.'.</p>';
           // $body .='<p>Email Add: '.$f_emailaddress.'.</p>';
           // $body .='<p>Mobile No. '.$mobile_no.'.</p>';
           // $body .='<p>Reg. Date: '.$time.'.</p><br/><br/>';
        
             $email_to = $seller_Email;
             $email_from ='noreply@jettahconnect.com'; // Enter Sender Email
        
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'From: '.$email_from."\r\n".
            'Reply-To: '.$email_from."\r\n" .
            'X-Mailer: PHP/' . phpversion();
            mail($email_to, $subject, $body, $headers);
        
        
        
            // Insert the record into the orders table
            $sql .= "INSERT INTO orders (user_id, product_id, qty, trx_id, p_status, seller_id,orderdate) 
                    VALUES ('$userId', '$productId', '$qty', '$trxId', '$pStatus', '$sellerId', '$currentDateTime');";

            // Update the cart table for each record individually
            $sql .= "UPDATE cart SET order_status = 'Ordered' WHERE user_id = '$userId';";
        }

        // Execute multi-query
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
        // JSON decoding failed
        echo "Error decoding JSON data";
    }
} else {
    // Request method is not POST
    echo "Invalid request method";
}
