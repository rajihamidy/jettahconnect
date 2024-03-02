<?php
error_reporting(0);
require "config/constants.php";

session_start();
if (!isset($_SESSION["uid"])) {
	header("location:index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Jettah Connect</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<script src="js/jquery2.js"></script>
	<script type="text/javascript" src="js/updateReceivedStatus.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="main.js"></script>
	<style>
		table tr td {
			padding: 10px;
		}
	</style>
</head>

<body>

	<?php require 'head.php'; ?>
	<p><br /></p>
	<p><br /></p>
	<p><br /></p>
	<div class="container-fluid">

		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading"></div>
					<div class="panel-body">
						<h1>Customer Order Details</h1>
						<hr />
						<?php
							include_once("db.php");
							$user_id = $_SESSION["uid"];

							$orders_list = "SELECT o.order_id, o.user_id, o.product_id, o.qty, o.trx_id, o.p_status, o.orderdate,o.deliveryStatus,o.received_Status, p.product_title, p.product_price, p.product_image, a.name, a.email, a.mobile, a.shopaddress 
							FROM orders o
							INNER JOIN products p ON o.product_id = p.product_id
							INNER JOIN admin a ON o.seller_id = a.id
							WHERE o.user_id = '$user_id'
							ORDER BY o.orderdate DESC";//order_id

						$query = mysqli_query($con, $orders_list);
						$count = mysqli_num_rows($query);
						$sn = 0;
						if (mysqli_num_rows($query) > 0) {
							echo 'Total Orders: ' . $count;
							while ($row = mysqli_fetch_array($query)) {
								$sn++;
						?>
								<script>
									//alert($user_id)
								</script>
								<div class="row">
									<div class="col-md-6">
										<img style="float:right;" src="product_images/<?php echo $row['product_image']; ?>" alt="Product Image" class="img-responsive img-thumbnail" />
									</div>
									<div class="col-md-6">
										<table>
											<tr>
												<td>Serial Number</td>
												<td><b><?php echo $sn; ?></b> </td>
											</tr>
											<tr>
												<td>Product Name</td>
												<td><b><?php echo $row["product_title"]; ?></b> </td>
											</tr>
											<tr>
												<td>Product Price</td>
												<td><b><?php echo  CURRENCY . " " . $row["product_price"]; ?></b></td>
											</tr>
											<tr>
												<td>Quantity</td>
												<td><b><?php echo $row["qty"]; ?></b></td>
											</tr>
											<tr>
												<td>Amount</td>
												<td><b><?php echo CURRENCY . " " . $row["product_price"] * $row["qty"]; ?></b></td>
											</tr>
											<tr>
												<td>Transaction Id</td>
												<td><b><?php echo $row["trx_id"]; ?></b></td>
											</tr>
											<tr>
												<td>Order date</td>
												<td><b><?php echo $row["orderdate"]; ?></b></td>
											</tr>
											<tr>
												<td>Seller Name</td>
												<td><b><?php echo $row["name"]; ?></b></td>
											</tr>
											<tr>
												<td>Seller Email</td>
												<td><b><?php echo $row["email"]; ?></b></td>
											</tr>
											<tr>
												<td>Seller Contacts</td>
												<td><b><?php echo $row["mobile"] . ", " . $row["shopaddress"]; ?></b></td>
											</tr>
											<tr>
												<td>Payment Status</td>
												<?php
												if ($row["p_status"]==="Completed"){
													$del=$row["p_status"];
													echo "
													<td class=' text-primary'><b>$del </b></td>
													";
												} else{
													$del=$row["p_status"];
													echo "
													<td class=' text-danger'><b>$del </b></td>
													";
												}
												?>
												
											</tr>
											<tr>
												<td>Delivery</td>
												<?php
												if ($row["deliveryStatus"]==="Delivered"){
													$del=$row["deliveryStatus"];
													echo "
													<td class=' text-primary'><b>$del </b></td>
													";
												} else{
													$del=$row["deliveryStatus"];
													echo "
													<td class=' text-danger'><b>$del </b></td>
													";
												}
												?>
												
											</tr>
											<tr>

											<?php 
												if ($row["received_Status"]==="Item Received"){
													$received_Status = $row["received_Status"];
													echo "
													<td class=' text-primary'><b>$received_Status </b></td>
													";
												} else{
													$del=$row["received_Status"];
													$trx_id = $row["trx_id"];
													echo '
<td colspan="2"><button class="btn btn-primary btn-block" onclick="UpdateReceived_Status(\''.$trx_id.'\')"> Item Received ?</button>
';
												}
												?>
					
												
											</tr>
										</table>

									</div>
								</div>
								<hr />
						<?php
							}
						}
						?>

					</div>
					<div class="panel-footer"></div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</body>

</html>