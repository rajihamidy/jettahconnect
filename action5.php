<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve POST variables
    $trx_id = mysqli_real_escape_string($con, $_POST['trx_id']);
    $amountx = mysqli_real_escape_string($con, $_POST['amountx']);
    $buyer_Email = mysqli_real_escape_string($con, $_POST['buyer_Email']);
    //$seller_Email=mysqli_real_escape_string($con, $_POST['seller_Email']);
    // Initialize other required variables
    $pStatus = 'Completed';
    $payMethod = 'Paystack Payment at delivery';

    // Example logic to associate the payment with a product or order
    // You might need to fetch the relevant product or user data using $trx_id, $amountx, or $buyer_Email
    $fetchOrderSql = "SELECT * FROM orders WHERE trx_id = '$trx_id' ";
    $orderResult = mysqli_query($con, $fetchOrderSql);

    if ($orderResult && mysqli_num_rows($orderResult) > 0) {
        while ($row = mysqli_fetch_assoc($orderResult)) {
            $userId = mysqli_real_escape_string($con, $row['user_id']);
            $productId = mysqli_real_escape_string($con, $row['product_id']);
            $qty = mysqli_real_escape_string($con, $row['qty']);
            $prod_owner = mysqli_real_escape_string($con, $row['seller_id']);
           // $seller_Email = mysqli_real_escape_string($con, $row['seller_Email']);
           // $delM = mysqli_real_escape_string($con, $row['delM']);
           // $address = mysqli_real_escape_string($con, $row['address']);

            // Fetch current product quantity
            $fetchQtySql = "SELECT product_qty FROM products WHERE product_id = '$productId' AND user_id = '$prod_owner'";
            $fetchQtyResult = mysqli_query($con, $fetchQtySql);

            if ($fetchQtyResult && mysqli_num_rows($fetchQtyResult) > 0) {
                $row = mysqli_fetch_assoc($fetchQtyResult);
                $currentQty = $row['product_qty'];

                // Calculate new quantity
                $newQty = $currentQty - $qty;

                // Update product quantity
                $updateQtySql = "UPDATE products SET product_qty = '$newQty' WHERE product_id = '$productId' AND user_id = '$prod_owner'";
                mysqli_query($con, $updateQtySql);

                // Send email to seller
              /*  $subject = "New Order Payment Notification from Jettah Customer";
                $body = '<p>New payment has been made for products. Kindly login to your dashboard to supply the orders.</p>';
                $email_from = 'noreply@jettahconnect.com';
                $headers = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                $headers .= 'From: ' . $email_from . "\r\n" . 'Reply-To: ' . $email_from . "\r\n" . 'X-Mailer: PHP/' . phpversion();
                mail($seller_Email, $subject, $body, $headers);
*/
                // Insert into orders table
                $timeZone = new DateTimeZone('Africa/Lagos');
                $dateTime = new DateTime('now', $timeZone);
                $currentDateTime = $dateTime->format('Y-m-d H:i:s');

                $insertOrderSql = "Update orders SET p_status='$pStatus', payMethod= '$payMethod' WHERE trx_id = '$trx_id'  ";
                if (mysqli_query($con, $insertOrderSql)) {
                    $updateCartSql = "UPDATE cart SET order_status = 'Ordered' WHERE user_id = '$userId' AND trx_id = '$trx_id'";
                    mysqli_query($con, $updateCartSql);
                    echo "Payment made successfully.";
                } else {
                    echo "Error: " . mysqli_error($con);
                }
                
                // Update cart status
               
            } else {
                echo "Product not found for productId: $productId and Product Owner: $prod_owner";
            }
        }
        
        //echo "Records inserted and cart updated successfully.";
    } else {
        echo "No orders found with the provided transaction ID and buyer email."+ $trx_id;
    }
} else {
    echo "Invalid request method.";
}
