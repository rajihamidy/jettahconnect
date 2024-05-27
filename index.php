<?php
require "config/constants.php";
session_start();
if (isset($_SESSION["uid"])) {
	header("location:profile.php");
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Jettah Connect</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<script src="js/jquery2.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/sidebar.css">
	<link rel="stylesheet" href="css/img.css">
	<script src="main.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">

	<style>
		.img-container {
			display: flex;
			justify-content: center;
			align-items: center;
			overflow: hidden;
			height: 200px;
			/* Adjust as necessary */
		}

		.img-container img {
			max-height: 100%;
			max-width: 100%;
			height: auto;
			width: auto;
		}

		.panel-body .img-container {
			width: 100%;
			height: 200px;
			overflow: hidden;
		}

		.panel-body .img-container img {
			width: 100%;
			height: auto;
		}

		@media (max-width: 767px) {
			.column {
				margin-bottom: 20px;
			}
		}

		.custom-button {
			padding: 10px;
			/* Adjust the padding as needed */
			margin-top: 10px;
		}
	</style>
	<style>
		.panel-footer {
			display: flex;
			justify-content: space-between;
			align-items: center;
			flex-wrap: wrap;
		}

		.panel-footer .footer-left,
		.panel-footer .footer-right {
			margin-bottom: 10px;
		}

		@media (max-width: 767px) {
			.panel-footer {
				flex-direction: column;
				text-align: center;
			}

			.panel-footer .footer-right {
				margin-top: 10px;
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
	<!-- Heading      -->


	<?php require "indexhead.php";  ?>

	<!-- End of Heading -->

	<div class="container">
		<div class="row">
			<!--1 first part side bar	 -->
			<div class="col-md-2 col-xs-6">
				<div id="main">

				</div>

			</div>
			<!--1 first part side bar End	 -->

			<!--2 Second part side bar	 -->
			<div class="col-md-8 col-xs-12">
				<div class="row">
					<div class="col-md-12 col-xs-12" id="product_msg">
					</div>
				</div>
				<div class="panel panel-info">
					<div class="container-fluid">
						<div class="panel panel-default">
							<div class="panel-heading">Products</div>
							<div class="panel-body">
								<div id="get_product" class="row">
									<!-- Here we get product jQuery Ajax Request -->
									<!-- End of product panel -->
								</div>
							</div>
						</div>
					</div>
					<div class="container-fluid">
						<div class="row panel-footer">
							<div class="footer-left col-xs-12 col-md-10">
								&copy; <?php echo date("Y"); ?> | Developed By <a href="https://ypdatahub.com.ng">Young Programa</a>
							</div>
							<div class="footer-right col-xs-12 col-md-2">
								<a href="admin/index.php">Admin</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
	</div>
	<!--2 Second part side bar	 ends -->
	</div>
</body>
<script type="text/javascript" src="./js/sidebar.js"></script>
<script>
	const togglePassword = document.querySelector('#togglePassword');
	const password = document.querySelector('#password');
	const eye = document.querySelector('#eye');

	togglePassword.addEventListener('click', function(e) {
		// toggle the type attribute
		const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
		password.setAttribute('type', type);

		// toggle the eye icon
		eye.classList.toggle('glyphicon-eye-open');
		eye.classList.toggle('glyphicon-eye-close');
	});
</script>

</html>