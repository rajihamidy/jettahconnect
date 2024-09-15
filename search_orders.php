<?php
session_start();
require_once "db.php";

// Debug: Print session variables to check if 'uid' is set
//print_r($_SESSION);

if (!isset($_SESSION["uid"])) {
    header("location:index.php");
 //   echo "Unauthorized access! Please log in.";
    exit;
}

$user_id = $_SESSION["uid"];

function formatCurrency($amount)
{
	// Format the amount as Naira
	$formatted_amount = '₦' . number_format($amount, 0);

	// If the amount is not a whole number (kobo exists), add kobo
	if ($amount != floor($amount)) {
		$kobo = round(($amount - floor($amount)) * 100);
		$formatted_amount .= '.' . str_pad($kobo, 2, '0', STR_PAD_LEFT) . ' kobo';
	}

	return $formatted_amount;
}

if (isset($_POST["getOrders"])) {
	$orders_list = "SELECT o.order_id, o.user_id, o.product_id, o.qty, o.trx_id, o.p_status, o.orderdate,o.deliveryStatus,o.received_Status,o.payMethod, p.product_title, p.product_price, p.product_image, a.name, a.email, a.mobile, a.shopaddress 
							FROM orders o
							INNER JOIN products p ON o.product_id = p.product_id
							INNER JOIN admin a ON o.seller_id = a.id
							WHERE o.user_id = '$user_id'
							ORDER BY o.orderdate DESC"; //order_id

	$query = mysqli_query($con, $orders_list);
	$count = mysqli_num_rows($query);
	$sn = 0;
	if (mysqli_num_rows($query) > 0) {
		echo 'Total Orders: ' . $count;
		while ($row = mysqli_fetch_array($query)) {
			$sn++;
			$payMethod= $row["payMethod"];
			echo '
			
			<div class="row">
			<div class="col-md-6">
				<img style="float:right;" src="product_images/'. $row["product_image"].'" alt="Product Image" class="img-responsive img-thumbnail" />
			</div>
			<div class="col-md-6">
				<table >
					<tr>
						<td>Serial Number</td>
						<td><b> '.$sn.' </b> </td>
					</tr>
					<tr>
						<td>Product Name</td>
						<td><b> '.$row["product_title"].' </b> </td>
					</tr>
					<tr>
						<td>Product Price</td>
						<td><b> ' . formatCurrency($row["product_price"]).'</b></td>
					</tr>
					<tr>
						<td>Quantity</td>
						<td><b> '.$row["qty"].' </b></td>
					</tr>
					<tr>
						<td>Amount</td>
						<td><b> ' . formatCurrency($row["product_price"] * $row["qty"]).'</b></td>
					</tr>
					<tr>
						<td>Transaction Id</td>
						<td><b>'. $row["trx_id"].'</b></td>
					</tr>
					<tr>
						<td>Order date</td>
						<td><b> '.$row["orderdate"].'</b></td>
					</tr>
					<tr>
						<td>Seller Name</td>
						<td><b> '.$row["name"].'</b></td>
					</tr>
					<tr>
						<td>Seller Email</td>
						<td><b>'. $row["email"].'</b></td>
					</tr>
					<tr>
						<td>Seller Contacts</td>
						<td><b>'. $row["mobile"] . ", " . $row["shopaddress"].'</b></td>
					</tr>
					<tr>
						<td>Payment Status</td>
					';
						if ($row["p_status"] === "Completed") {
							$del = $row["p_status"];
							echo '
						<td class=" text-primary"><b>'.$del.' </b></td>
						';
						} else {
							$del = $row["p_status"];
							echo '
						<td class=" text-danger"><b>'.$del.' </b></td>
						';
						}
						
echo'
					</tr>
					<tr>
						<td>Payment Method</td>
						<td><b>'. $row["payMethod"].'</b></td>
					</tr>  
					';
					if ($row["payMethod"] === "At Delivery/Paystack") {
						$trx_id = $row["trx_id"];
						$amount = formatCurrency($row["product_price"] * $row["qty"]);
						$amountx = $row["product_price"] * $row["qty"];
						$buyer_Email = $_SESSION["buyer_email"];
						echo'	
						<td colspan="2"><button class="btn btn-primary btn-block" onclick="payWithPaystack(\'' . $trx_id . '\', \'' . $amountx . '\', \'' . $buyer_Email . '\')"> Pay Now ?</button>
						';
						
					} else if ($row["payMethod"] === "At Delivery/Cash") {
						$trx_id = $row["trx_id"];
					/*	echo'	
						<td colspan="2"><button class="btn btn-primary btn-block" onclick="UpdatePayment_Status(\'' . $trx_id . '\')"> Paid ?</button>
						';
						*/
					}else{
						//Nothing
					}
					echo'
					<tr>
						<td>Delivery</td>
						';
						if ($row["deliveryStatus"] === "Delivered") {
							$del = $row["deliveryStatus"];
							echo '
						<td class=" text-primary"><b>'.$del.' </b></td>
						';
						} else {
							$del = $row["deliveryStatus"];
							echo '
						<td class=" text-danger"><b>'.$del.' </b></td>
						';
						}
						
						echo'
					</tr>
					<tr>
					';
						
						if ($row["received_Status"] === "Item Received") {
							$received_Status = $row["received_Status"];
							echo '
						<td class=" text-primary"><b>'.$received_Status.' </b></td>
						';
						} else {
							
							$del = $row["received_Status"];
							$trx_id = $row["trx_id"];
						echo'	
<td colspan="2"><button class="btn btn-primary btn-block" onclick="UpdateReceived_Status(\'' . $trx_id . '\')"> Item Received ?</button>
';
						}
						

echo'
					</tr>
				</table>

			</div>
		</div>
				<hr />
			';
		}
	}else{
		echo'No record Found.';
	}
}

if (isset($_SESSION["uid"]) || isset($_POST["search"])) {
	$user_id = $_SESSION["uid"];
	//$keyword = $_GET['keyword'];
	if ((isset($_POST["keyword"]))) {
		$keyword = $_POST["keyword"];
		$orders_list = "SELECT o.order_id, o.user_id, o.product_id, o.qty, o.trx_id, o.p_status, o.orderdate, o.deliveryStatus, o.received_Status,o.payMethod, p.product_title, p.product_price, p.product_image, a.name, a.email, a.mobile, a.shopaddress 
                    FROM orders o
                    INNER JOIN products p ON o.product_id = p.product_id
                    INNER JOIN admin a ON o.seller_id = a.id
                    WHERE o.user_id = '$user_id' AND p.product_title LIKE '%$keyword%'
                    ORDER BY o.orderdate DESC";
	} else {
		$orders_list = "SELECT o.order_id, o.user_id, o.product_id, o.qty, o.trx_id, o.p_status, o.orderdate, o.deliveryStatus, o.received_Status,o.payMethod, p.product_title, p.product_price, p.product_image, a.name, a.email, a.mobile, a.shopaddress 
                    FROM orders o
                    INNER JOIN products p ON o.product_id = p.product_id
                    INNER JOIN admin a ON o.seller_id = a.id
                    WHERE o.user_id = '$user_id' 
                    ORDER BY o.orderdate DESC";
	}
	

	$query = mysqli_query($con, $orders_list);
	$count = mysqli_num_rows($query);
	$sn = 0;

	if (mysqli_num_rows($query) > 0) {
		echo 'Total Orders: ' . $count;
		while ($row = mysqli_fetch_array($query)) {
			$sn++;
			echo '
			
			<div class="row">
			<div class="col-md-6">
				<img style="float:right;" src="product_images/'. $row["product_image"].'" alt="Product Image" class="img-responsive img-thumbnail" />
			</div>
			<div class="col-md-6">
				<table>
					<tr>
						<td>Serial Number</td>
						<td><b> '.$sn.' </b> </td>
					</tr>
					<tr>
						<td>Product Name</td>
						<td><b> '.$row["product_title"].' </b> </td>
					</tr>
					<tr>
						<td>Product Price</td>
						<td><b> '. formatCurrency($row["product_price"]).'</b></td>
					</tr>
					<tr>
						<td>Quantity</td>
						<td><b> '.$row["qty"].' </b></td>
					</tr>
					<tr>
						<td>Amount</td>
						<td><b> '.formatCurrency($row["product_price"] * $row["qty"]).'</b></td>
					</tr>
					<tr>
						<td>Transaction Id</td>
						<td><b>'. $row["trx_id"].'</b></td>
					</tr>
					<tr>
						<td>Order date</td>
						<td><b> '.$row["orderdate"].'</b></td>
					</tr>
					<tr>
						<td>Seller Name</td>
						<td><b> '.$row["name"].'</b></td>
					</tr>
					<tr>
						<td>Seller Email</td>
						<td><b>'. $row["email"].'</b></td>
					</tr>
					<tr>
						<td>Seller Contacts</td>
						<td><b>'. $row["mobile"] . ", " . $row["shopaddress"].'</b></td>
					</tr>
					<tr>
						<td>Payment Status</td>
					';
						if ($row["p_status"] === "Completed") {
							$del = $row["p_status"];
							echo '
						<td class=" text-primary"><b>'.$del.' </b></td>
						';
						} else {
							$del = $row["p_status"];
							echo '
						<td class=" text-danger"><b>'.$del.' </b></td>
						';
						}
						
echo'
					</tr>
					<tr>
						<td>Payment Method</td>
						<td><b>'. $row["payMethod"] .'</b></td>
					</tr>
					<tr>
						<td>Delivery</td>
						';
						if ($row["deliveryStatus"] === "Delivered") {
							$del = $row["deliveryStatus"];
							echo '
						<td class=" text-primary"><b>'.$del.' </b></td>
						';
						} else {
							$del = $row["deliveryStatus"];
							echo '
						<td class=" text-danger"><b>'.$del.' </b></td>
						';
						}
						
						echo'
					</tr>
					<tr>
					';
						
						if ($row["received_Status"] === "Item Received") {
							$received_Status = $row["received_Status"];
							echo '
						<td class=" text-primary"><b>'.$received_Status.' </b></td>
						';
						} else {
							
							$del = $row["received_Status"];
							$trx_id = $row["trx_id"];
						echo'	
<td colspan="2"><button class="btn btn-primary btn-block" onclick="UpdateReceived_Status(\'' . $trx_id . '\')"> Item Received ?</button>
';
						}
						

echo'
					</tr>
				</table>

			</div>
		</div>
				<hr />
			';
		}
	}else{
		echo'No record Found.';
	}
} else {
	echo "Unauthorized access!";
}
?>
