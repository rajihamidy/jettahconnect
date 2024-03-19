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
    overflow-x: auto; /* Add scrollbar for vertical overflow */
    width: 100vw; /* Set height of container to full viewport height */
}

/* Adjust styles for small devices */
@media screen and (max-width: 768px) {
    .col-md-2,
    .col-md-8,
    .col-md-1 {
        width: 100%; /* Make columns full width on small devices */
    }
}
	</style>
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
				<a href="index.php" class="navbar-brand">Jettah Connect</a>
			</div>
			<div class="collapse navbar-collapse" id="collapse">
				<ul class="nav navbar-nav">
					<li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
					<li><a href="seller/index.php"><span class="glyphicon glyphicon-user"></span> Seller Account</a></li>
					<li><a href="index.php"><span class="glyphicon glyphicon-modal-window"></span> Products</a></li>
				</ul>
				<form class="navbar-form navbar-left">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Search" id="search">
					</div>
					<button type="submit" class="btn btn-primary" id="search_btn"><span class="glyphicon glyphicon-search"></span></button>
				</form>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span> Cart <span class="badge">0</span></a>
						<div class="dropdown-menu" style="width:400px;">
							<div class="panel panel-success">
								<div class="panel-heading">
									<div class="row">
										<div class="col-md-3">SN</div>
										<div class="col-md-3">Product Image</div>
										<div class="col-md-3">Product Name</div>
										<div class="col-md-3">Price in <?php echo CURRENCY; ?></div>
									</div>
								</div>
								<div class="panel-body">
									<div id="cart_product">

									</div>
								</div>
								<div class="panel-footer"></div>
							</div>
						</div>
					</li>
					<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> Login/Register</a>
						<ul class="dropdown-menu">
							<div style="width:300px;">
								<div class="panel panel-primary">
									<div class="panel-heading">Login</div>
									<div class="panel-heading">
										<form onsubmit="return false" id="login">
											<label for="email">Email</label>
											<input type="email" class="form-control" name="email" id="email" required />
											<label for="email">Password</label>
											<input type="password" class="form-control" name="password" id="password" required />
											<p><br /></p>
											<input type="submit" class="btn btn-warning" value="Login">
											<a href="customer_registration.php?register=1" style="color:white; text-decoration:none;">Create Account Now</a>
										</form>
									</div>
									<div class="panel-footer" id="e_msg"></div>
								</div>
							</div>
						</ul>
					</li>
				</ul>
			</div>

		</div>
	</div>
	<p><br /></p>
	<p><br /></p>
	<p><br /></p>


	<div class="container">
    <div class="row">
        <!--1 first part side bar	 -->
        <div class="col-md-2 col-xs-6">
            <div id="main">
                <button id="open1" class="openbtn" onclick="openNav()">☰ Menu</button>
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
                <div class="panel-footer">&copy; <?php echo date("Y"); ?> | Developed By <a href="https://rajiypentdataservices.com">Young Programa</a></div>
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