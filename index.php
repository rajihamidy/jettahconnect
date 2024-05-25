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
	<title>Jettah Connect</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<script src="js/jquery2.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/sidebar.css">
	<link rel="stylesheet" href="css/img.css">
	<script src="main.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
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
					<div class="container-sm panel-heading">Products</div>
					<div class="panel-body">
						<div class="container-fluid">
							<div id="get_product" class="rows">
								<!-- Here we get product jQuery Ajax Request -->
								<!-- End of product panel -->
							</div>
						</div>
					</div>
					<div class="container-fluid">
						<div class="row panel-footer">
							<div class=" col-md-10">&copy; <?php echo date("Y"); ?> | Developed By <a href="https://ypdatahub.com.ng">Young Programa</a></div>
							<div class="col-md-2">
								<a href="admin/index.php" class=""> Admin </a>
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