 
 	<nav class="navbar navbar-dark fixed-top bg-dark p-0 shadow d-flex flex-nowrap">
 		<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Jettah Connect</a>
 		<input class="form-control form-control-dark w-100" type="hidden" placeholder="Search" aria-label="Search">
 		<ul class="navbar-nav px-3">
 			<li class="nav-item text-nowrap">
 				<?php
					if (isset($_SESSION['admin_id'])) {
					?>
 					<a class="nav-link" href="../seller/admin-logout.php">Sign out</a>
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
 