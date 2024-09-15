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
	<?php require 'customAlert.php'; ?>
	<script type="text/javascript" src="js/customalert.js"></script>
	<link href="css/alert.css" rel="stylesheet">
	<script src="js/bootstrap.min.js"></script>
	<script src="https://js.paystack.co/v1/inline.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
		function payWithPaystack(trx_id, amountx, buyer_Email, seller_Email) {
			event.preventDefault();

			let handler = PaystackPop.setup({
				key: 'pk_live_0bff82479cc9dbf584a3aefcfc8a11b1676815fd', // Replace with your public key
				email: buyer_Email,
				amount: amountx * 100, // Amount is in kobo, hence multiply by 100
				currency: "NGN",
				ref: '' + Math.floor((Math.random() * 1000000000) + 1), // Generate a random reference number
				metadata: {
					custom_fields: [{
						display_name: "Buyer Email",
						variable_name: "buyer_Email",
						value: buyer_Email
					}]
				},
				callback: function(response) {
					// Transaction completed, submit data to action5.php
					const data = {
						trx_id: trx_id,
						amountx: amountx,
						buyer_Email: buyer_Email,
						seller_Email: seller_Email,
						reference: response.reference // Paystack transaction reference
					};

					$.ajax({
						url: 'action5.php',
						method: 'POST',
						data: data,
						success: function(response) {
							showCustomAlert(response);
							location.reload();
							setTimeout(function() {
								window.location = 'profile.php';
							}, 1000);
						},
						error: function(xhr, status, error) {
							showCustomAlert(error);
						}
					});
				},
				onClose: function() {
					showCustomAlert('Transaction was not completed, window closed.');
				}
			});

			handler.openIframe(); // Open the payment modal
		}
	</script>

	<script src="main.js"></script>
	<style>
		table tr td {
			padding: 10px;
		}
	</style>
</head>

<body>

	<?php require 'headorders.php'; ?>
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
						<div id="searchResults">


						</div>
					</div>
					<div class="panel-footer"></div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</body>

</html>