 	<nav class="navbar navbar-dark fixed-top bg-dark navbar-expand-sm ">
 		<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Jettah Connect</a>

 		<ul class="navbar-nav">
 			<?php


				$uri = $_SERVER['REQUEST_URI'];
				$uriAr = explode("/", $uri);
				$page = end($uriAr);

				?>
 			<?php
				if (isset($_SESSION['admin_id'])) {
				?>


 				<!-- Dropdown -->
 				<li class="nav-item dropdown">
 					<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
 						Menu
 					</a>

 					<div class="dropdown-menu">

 						<a class="dropdown-item <?php echo ($page == '' || $page == 'index.php') ? 'active' : ''; ?>" href="index.php">
 							<span data-feather="home"></span>Dashboard <span class="sr-only">(current)</span>
 						</a>
 						<a class="dropdown-item <?php echo ($page == 'customer_orders.php') ? 'active' : ''; ?>" href="customer_orders.php">
 							<span data-feather="clipboard"></span>
 							Orders
 						</a>
 						<a class="dropdown-item <?php echo ($page == 'products.php') ? 'active' : ''; ?>" href="products.php">
 							<span data-feather="shopping-cart"></span>
 							Products
 						</a>
 						<a class="dropdown-item <?php echo ($page == 'brands.php') ? 'active' : ''; ?>" href="brands.php">
 							<span data-feather="box"></span>
 							Brands
 						</a>
 						<a class="dropdown-item <?php echo ($page == 'categories.php') ? 'active' : ''; ?>" href="categories.php">
 							<span data-feather="layers"></span>
 							Categories
 						</a>
						<hr>
						<a class="dropdown-item <?php echo ($page == 'inbox.php') ? 'active' : ''; ?>" href="inbox.php">
 							<span data-feather="inbox"></span>
 							Inbox
 						</a>
						 <a class="dropdown-item <?php echo ($page == 'sent.php') ? 'active' : ''; ?>" href="sent.php">
 							<span data-feather="send"></span>
 							Sent
 						</a>
						 <a class="dropdown-item <?php echo ($page == 'seller_complaints.php') ? 'active' : ''; ?>" href="seller_complaints.php">
 							<span data-feather="alert-triangle"></span>
 							Submit Complaints
 						</a>
 						<!--  <a class="dropdown-item <?php //echo ($page == 'customers.php') ? 'active' : ''; 
														?>" href="customers.php">
              <span data-feather="users"></span>
              Customers
            </a> -->
 					</div>
 				</li>
 			<?php
				}
				?>
 		</ul>

 		<ul class="navbar-nav px-3">
 			<li class="nav-item text-nowrap">
 				<?php
					if (isset($_SESSION['admin_id'])) {
					?>

 					<a class="nav-link " href="../seller/admin-logout.php">Sign out</a>
 					<?php
					} else {
						$uriAr = explode("/", $_SERVER['REQUEST_URI']);
						$page = end($uriAr);
						if ($page === "login.php") {
						?>

 						<a class="nav-link" href="../seller/register.php">Register</a>
 					<?php
						} else {
						?>
 						<a class="nav-link" href="../seller/login.php">Login</a>
 				<?php
						}
					}

					?>

 			</li>
 		</ul>

 	</nav>