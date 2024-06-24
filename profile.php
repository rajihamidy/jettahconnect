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
	<link rel="stylesheet" href="fontawesome6.5.2/css/all.css">
	<script src="js/jquery2.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/sidebar.css">
	<link rel="stylesheet" href="css/img.css">
	<script src="main.js"></script>
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
	<?php require 'head.php'; ?>
	
	<div class="container">
		<div class="row">
			<!--1 first part side bar	 -->
			<div class="col-md-2 col-xs-6">
				<div id="main">
					
				</div>
				<div id="get_category" style="display:none"></div>
				<div id="get_brand" style="display:none"></div>
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
					<div class="panel-footer">&copy; <?php echo date("Y"); ?> | Developed By <a href="https://ypdatahub.com.ng">Young Programa</a></div>
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
	</div>
	<!--2 Second part side bar	 ends -->
	</div>
</body>
<script type="text/javascript" src="./js/sidebar.js"></script>

</html>