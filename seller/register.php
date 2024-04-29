<?php include "./templates/top.php"; ?>

<?php include "./templates/navbar.php"; ?>

<?php include "get_states.php"; ?>
<div class="container">
	<div class="row justify-content-center" style="margin:100px 0;">
		<div class="col-md-4">
			<h4 class="text-center">Seller's Registration Form</h4>
			<hr>
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
				<label for="state" >Select Shop Location State</label>
					<select id="stateSelect" name="states" class="form-control">
					<?php echo $options; ?>
					</select>
				</div>
				<div class="form-group">
				<label for="lga">Select Shop Location L.G.A.</label>
					<select id="lgaSelect" name="lga" class="form-control">
						<option value="">Select a state first</option>
						<!-- LGAs will be populated via AJAX -->
					</select>
				</div>
				<div class="form-group">
					<label for="items">Select Business Category:</label>
					<select id="cat" name="cat" class="form-control">
						<option value="">---Select Business Category---</option>
						<option value="Provision Shop">Provision Shop</option>
						<option value="Plumber">Plumber</option>
						<option value="Food Vendor">Food Vendor</option>
						<option value="Electrician">Electrician</option>
						<option value="Building Materials">Building Materials</option>
						<option value="Carpentry">Carpentry</option>
						<option value="Super Market">Super Market</option>
						<option value="Air Dressing Saloon">Air Dressing Saloon</option>
						<option value="Pharmacy">Pharmacy</option>
						<option value="Real Estate">Real Estate</option>
						<option value="Cusmetic Shop">Cusmetic Shop</option>
						<option value="Mechanic">Mechanic Workshop</option>
						<option value="Restaurant">Restaurants</option>
						<option value="Motor Spear Parts">Motor Spear Parts</option>
						<option value="Block Industry">Block Industry</option>
						<option value="Furniture">Furniture</option>
					</select>
				</div>
				<div class="form-group">
					<label for="mobile">Contact Number</label>
					<input type="text" id="mobile" name="mobile" class="form-control" placeholder="Contact Number" >
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
<script>
	$(document).ready(function() {
		// Call the openNav() function when the document is ready
		$('#open1').hide();
		$('#stateSelect').change(function() {
                var stateId = $(this).val();
                $('#lgaSelect').html('<option value="">Loading...</option>');
                $.ajax({
                    type: 'POST',
                    url: 'get_lgas.php',
                    data: { state_id: stateId },
                    success: function(response) {
                        $('#lgaSelect').html(response);
                    }
                });
            });
	});
</script>
