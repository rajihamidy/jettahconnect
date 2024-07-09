<?php
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
	<script src="js/bootstrap.min.js"></script>
	<script src="main.js"></script>
	<script src="main2.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
	</script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
	</script>
	<?php require 'customAlert.php'; ?>
	<script type="text/javascript" src="js/customalert.js"></script>
	<link href="css/alert.css" rel="stylesheet">
	<style>
		/* CSS for scrollbar */
		.container {
			overflow-x: auto;
			/* Add scrollbar for vertical overflow */
			width: 100vw;
			/* Set height of container to full viewport height */
		}

		/* Adjust styles for small devices */
		@media screen and (max-width: 768px) {

			.col-md-2,
			.col-md-8,
			.col-md-1 {
				width: 100%;
				/* Make columns full width on small devices */
			}
		}
	</style>
</head>

<body>
	<script>
		document.addEventListener("DOMContentLoaded", (event) => {
			document.addEventListener("contextmenu", (event) => {
				event.preventDefault();
			});
		});
	</script>
	<div class="wait overlay">
		<div class="loader"></div>
	</div>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
					<span class="sr-only">navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="#" class="navbar-brand">Jettah Connect</a>
			</div>
			<div class="collapse navbar-collapse" id="collapse">
				<ul class="nav navbar-nav">
					<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
					<li><a href="index.php"><span class="glyphicon glyphicon-modal-window"></span>Product</a></li>
					<li><a href="logout.php" style="text-decoration:none; "> <span class="glyphicon glyphicon-log-out "></span>Logout</a></li>
				</ul>

			</div>
		</div>
	</div>
	<p><br /></p>
	<p><br /></p>
	<p><br /></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8" id="cart_msg">
				<!--Cart Message-->
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-primary">
					<div class="panel-heading">Cart Checkout</div>
					<div class="panel-body">
						<!--	<div class="row">
							<div class="col-md-2 col-xs-2"><b>Action</b></div>
							<div class="col-md-2 col-xs-2"><b>Product Image</b></div>
							<div class="col-md-2 col-xs-2"><b>Product Name</b></div>
							<div class="col-md-2 col-xs-2"><b>Quantity</b></div>
							<div class="col-md-2 col-xs-2"><b>Product Price</b></div>
							<div class="col-md-2 col-xs-2"><b>Price in <?php //echo CURRENCY; 
																		?></b></div>
						</div>
	-->
						<div id="cart_checkout"></div>

					</div>
				</div>
				<div class="panel-footer"></div>
			</div>
		</div>
		<div class="col-md-2"></div>

	</div>

	<script>
		var CURRENCY = '<?php echo CURRENCY; ?>';
	</script>
<!--<a href="pay.php">Pay</a> -->
</body>
<script src="https://js.paystack.co/v1/inline.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
	function payWithPaystack(total_amount, buyer_name, buyer_email, buyer_mobile) {
		var handler = PaystackPop.setup({
			key: 'pk_live_0bff82479cc9dbf584a3aefcfc8a11b1676815fd', // Replace with your public key
			//key: 'pk_test_ba6fc5ef2109b6e491d37ab4c0294d8fc8ee22eb', // Replace with your public key
			email: buyer_email,
			amount: total_amount * 100, // Amount is in kobo, hence multiply by 100
			currency: "NGN",
			ref: '' + Math.floor((Math.random() * 1000000000) + 1), // Generate a random reference number
			metadata: {
				custom_fields: [{
						display_name: "Mobile Number",
						variable_name: "mobile_number",
						value: buyer_mobile
					},
					{
						display_name: "Buyer Name",
						variable_name: "buyer_name",
						value: buyer_name
					}
				]
			},
			callback: function(response) {
				// Implement what happens when transaction is completed.
				var prod_owner = [];
				var user_id = [];
				var product_id = [];
				var qty = [];
				var trx_id = [];
				var seller_Email = [];
				var seller_id = [];
				var delM = $("#delM").val();
				var address = $("#address").val();

				$(".row").each(function() {
					var $row = $(this);
					prod_owner.push($row.find("[name='prod_owner[]']").val());
					user_id.push($row.find("[name='user_id[]']").val());
					product_id.push($row.find("[name='product_id[]']").val());
					trx_id.push($row.find("[name='trx_id[]']").val());
					seller_Email.push($row.find("[name='seller_Email[]']").val());
					qty.push($row.find("[name='qty[]']").val());
					seller_id.push($row.find("[name='seller_id[]']").val());
				});

				var combinedArray = user_id.map(function(_, i) {
					return {
						prod_owner: prod_owner[i],
						user_id: user_id[i],
						product_id: product_id[i],
						qty: qty[i],
						trx_id: trx_id[i],
						seller_Email: seller_Email[i],
						seller_id: seller_id[i],
						delM: delM,
						address: address
					};
				});

				var filteredArray = combinedArray.filter(function(record) {
					return Object.values(record).every(function(value) {
						return value !== null && value !== undefined && value !== '';
					});
				});

				$.ajax({
					url: 'action3.php',
					method: 'POST',
					data: JSON.stringify(filteredArray),
					contentType: 'application/json',
					success: function(response) {
						showCustomAlert(response);
						location.reload();
						window.location = 'profile.php';
					},
					error: function(xhr, status, error) {
						showCustomAlert(error);
					}
				});
			},
			onClose: function() {
				// Implement what should happen when the modal is closed here
				showCustomAlert('Payment Window Closed.');

			}
		});
		handler.openIframe();
	}

	function toggleAddressInput() {
		var deliveryMethod = $('#delM').val();
		if (deliveryMethod === 'Pick-up at Store') {
			$('#address').hide();
		} else {
			$('#address').show();
		}
	}

	$(document).ready(function() {
		toggleAddressInput();
		$('#delM').change(toggleAddressInput);
	});
</script>

</html>
