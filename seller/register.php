<?php include "./templates/top.php"; ?>

<?php include "./templates/navbar.php"; ?>

<div class="container">
	<div class="row justify-content-center" style="margin:100px 0;">
		<div class="col-md-4">
			<h4 class="text-center">Seller's Registration Form</h4>
			
			<form id="admin-register-form">
			<div class="form-group">
			    <label for="shopname">Shop Name</label>
			    <input type="text" class="form-control" name="shopname" id="shopname" placeholder="Your Shop Name" required>
			  </div>  
			<div class="form-group">
			    <label for="name">Full Name</label>
			    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
			  </div>
			  <div class="form-group">
			    <label for="email">Email Address</label>
			    <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required>
			    
			  </div>
			  <div class="form-group">
			    <label for="address">Shop Address</label>
			    <input type="text" class="form-control" name="shopaddress" id="shopaddress" placeholder="shop Address" required>
			    
			  </div>
			  <div class="form-group">
								<label for="mobile">Contact Number</label>
								<input type="text" id="mobile" name="mobile"class="form-control" placeholder="Contact Number" required>
							</div>
			  <div class="form-group">
			    <label for="password">Password</label>
			    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
			  </div>
			  <div class="form-group">
			    <label for="cpassword">Confirm Password</label>
			    <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Password">
			  </div>
			  <input type="hidden" name="admin_register" value="1">
			  <p class="message"></p>
			  <button type="button" class="btn btn-primary register-btn">Register</button>
			</form>
		</div>
	</div>
</div>





<?php include "./templates/footer.php"; ?>

<script type="text/javascript" src="./js/main.js"></script>
