<?php

require "config/constants.php";

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
	<script type="text/javascript" src="https://sdk.monnify.com/plugin/monnify.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
	</script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
	</script>

	<script>

	</script>
</head>

<body>
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
						<div class="row">


							<div class="col-md-2 col-xs-2"><b>Action</b></div>
							<div class="col-md-2 col-xs-2"><b>Product Image</b></div>
							<div class="col-md-2 col-xs-2"><b>Product Name</b></div>
							<div class="col-md-2 col-xs-2"><b>Quantity</b></div>
							<div class="col-md-2 col-xs-2"><b>Product Price</b></div>
							<div class="col-md-2 col-xs-2"><b>Price in <?php echo CURRENCY; ?></b></div>
						</div>
						<div id="cart_checkout"></div>
						<!--<div class="row">
							<div class="col-md-2">
								<div class="btn-group">
									<a href="#" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
									<a href="" class="btn btn-primary"><span class="glyphicon glyphicon-ok-sign"></span></a>
								</div>
							</div>
							<div class="col-md-2"><img src='product_images/imges.jpg'></div>
							<div class="col-md-2">Product Name</div>
							<div class="col-md-2"><input type='text' class='form-control' value='1' ></div>
							<div class="col-md-2"><input type='text' class='form-control' value='5000' disabled></div>
							<div class="col-md-2"><input type='text' class='form-control' value='5000' disabled></div>
						</div> -->
						<!--<div class="row">
							<div class="col-md-8"></div>
							<div class="col-md-4">
								<b>Total $500000</b>
							</div> -->
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

</body>
<script>
	function payWithMonnify(total_amount, buyer_name, buyer_email, buyer_mobile) {
		MonnifySDK.initialize({

			amount: total_amount,
			currency: "NGN",
			fee: 20,
			reference: new String((new Date()).getTime()),
			customerFullName: buyer_name,
			customerEmail: buyer_email,
			customerMobileNumber: buyer_mobile,
			apiKey: "MK_TEST_ENTY115CZW",
			contractCode: "6073096540",
			paymentDescription: "My depo",



			// reference: '' + Math.floor((Math.random() * 1000000000) + 1),
			//  customerName,
			//  customerEmail,
			//  customerMobileNumber,
			//  apiKey: "", //Your api key
			//  contractCode: "", //Your contract code
			//  paymentDescription: "Payment of Product",
			// isTestMode: true, //True or False for testmode
			paymentMethods: ["CARD", "ACCOUNT_TRANSFER"],
			onComplete: function(response) {
				//Implement what happens when transaction is completed.
				//console.log(response);
				//alert('Payment made');
				var user_id = [];
				var product_id = [];
				var qty = [];
				var trx_id = [];
				//var p_status = [];
				var seller_id = [];

				// Iterate over each row
				$(".row").each(function() {
					var $row = $(this);
					user_id.push($row.find("[name='user_id[]']").val());
					product_id.push($row.find("[name='product_id[]']").val());
					trx_id.push($row.find("[name='trx_id[]']").val());
					qty.push($row.find("[name='qty[]']").val());
				//	p_status.push($row.find("[name='p_status[]']").val());
					seller_id.push($row.find("[name='seller_id[]']").val());
				});

				// Combine arrays into an array of objects
				var combinedArray = user_id.map(function(_, i) {
					return {
						user_id: user_id[i],
						product_id: product_id[i],
						qty: qty[i],
						trx_id: trx_id[i],
				//		p_status: p_status[i],
						seller_id: seller_id[i]
					};
				});

				// Filter out blank records
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
						alert(response);
						location.reload();
						window.location = 'profile.php';
					},
					error: function(xhr, status, error) {
						alert(error);
					}
				});





				// End of Action to perform on complete

			},
			onClose: function(data) {
				//Implement what should happen when the modal is closed here
				console.log(data);
				alert('Payment Window Closed');
			}
		});
	}
</script>

</html>