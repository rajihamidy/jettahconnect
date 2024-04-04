<?php
require 'db.php';

// Retrieve the order_id sent via POST
if ($_POST['trx_id']) {
    $trx_id = $_POST['trx_id'];

    // Prepare and execute the SQL update statement
    $sql = "UPDATE orders SET received_Status = 'Item Received' WHERE trx_id = '$trx_id'";

    //$user_id = $_SESSION["uid"];
    $qr = "SELECT * from orders where trx_id ='$trx_id'";
    $runqr = mysqli_query($con, $qr);
    if (mysqli_num_rows($runqr) > 0) {
        $row = mysqli_fetch_array($runqr);
        $prod_id = $row['product_id'];
        $seller = $row['seller_id'];
        $qty = $row['qty'];
    }
    $qrpr = "SELECT * from products where product_id ='$prod_id'";
    $runqrpr = mysqli_query($con, $qrpr);
    if (mysqli_num_rows($runqrpr) > 0) {
        $rowpr = mysqli_fetch_array($runqrpr);
        $product_price = $rowpr['product_price'];
        $product_id = $rowpr['product_id'];
        $product_desc =$rowpr['product_desc'];
        
    }
    $qrAdmin = "SELECT * from admin where id ='$seller'";
    $runqrAdmin = mysqli_query($con, $qrAdmin);
    if (mysqli_num_rows($runqrAdmin) > 0) {
        $rowAdmin = mysqli_fetch_array($runqrAdmin);
        $wallet_balance = $rowAdmin['wallet'];
        $id = $rowAdmin['id'];
        
    }

    date_default_timezone_set('Africa/Lagos');
    $currentDateTime = date("Y-m-d H:i:s");
    
    
    $price = ($qty * $product_price)+ $wallet_balance;
    mysqli_query($con, "insert into transactions (seller_id, old_balance,new_balance, trxdate, product_desc)
     values ('$seller','$wallet_balance','$price','$currentDateTime','$product_desc')");// Updating transaction table to keep track of balances
    // $seller, wallet_balance, price, datetime

    $update_wallet = "UPDATE admin SET wallet = $price WHERE id = '$seller'";
    mysqli_query($con, $update_wallet);
    // $qty = $rowx['qty'];
     $uprice = $product_price;
    $query = mysqli_query($con, $sql);
    if ($query) {
       // echo "Unit Price = ". $uprice."\n"; 
        echo "Delivery Status Updated.";
        
    } else {
        echo "Error during Status Update.";
    }
} else {
    echo "No value posted.";
}
// I need to update the account of seller with the price