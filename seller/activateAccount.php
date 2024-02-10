<?php include "./templates/top.php"; ?>

<?php include "./templates/navbar.php"; ?>

<div class="container">
	<div class="row justify-content-center" style="margin:100px 0;">
		<div class="col-md-4">
			<h4 class="text-center">Seller's Account Activation</h4>
			<p class="message"></p>
			<form id="admin-login-form">
			  <div class="form-group">
			    <label for="email">Registered Email Address</label>
			    <input type="email" class="form-control" name="email" id="email"  placeholder="Registered Email Address">
			    
			  </div>
			  
			  <input type="hidden" name="Seller_Activation" value="1">
			  <button type="button" class="btn btn-primary login-btn">Proceed>></button>
			</form>
		</div>
	</div>
</div>





<?php include "./templates/footer.php"; ?>

<script type="text/javascript" src="./js/main.js"></script>
