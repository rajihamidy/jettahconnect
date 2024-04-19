$(document).ready(function(){

	$(".register-btn").on("click", function(){

		$.ajax({
			url : '../seller/classes/Credentials.php',
			method : "POST",
			data : $("#admin-register-form").serialize(),
			success : function(response){
				console.log(response);
				var resp = $.parseJSON(response);
				if (resp.status == 202) {
					$("#admin-register-form").trigger("reset");
					$(".message").html('<span class="text-success">' + resp.message + '</span>');
				
					// Hide the success message after 5 seconds
					setTimeout(function() {
						$(".message").empty();
					}, 5000); // 5 seconds in milliseconds
				} else if (resp.status == 303) {
					$(".message").html('<span class="text-danger">' + resp.message + '</span>');
				
					// Hide the error message after 5 seconds
					setTimeout(function() {
						$(".message").empty();
					}, 5000); // 5 seconds in milliseconds
				}
				
			}
		});

	});

	$(".login-btn").on("click", function(){

		$.ajax({
			url : '../seller/classes/Credentials.php',
			method : "POST",
			data : $("#admin-login-form").serialize(),
			success : function(response){
				console.log(response);
				var resp = $.parseJSON(response);
				if (resp.status == 202) {
					$("#admin-register-form").trigger("reset");
					//$(".message").html('<span class="text-success">'+resp.message+'</span>');
					window.location.href = window.origin+"/jettahconnect/seller/index.php";
					//window.location.href = "https://example.com/jettahconnect/seller/index.php";

				}else if(resp.status == 303){
					$(".message").html('<span class="text-danger">'+resp.message+'</span>');
				}else if(resp.status == 305){
					$(".message").html('<span class="text-danger">'+resp.message+'</span>');
					setTimeout(function() {
						// Redirect to ActivateAccount.php
						window.location.href = window.origin+"/jettahconnect/seller/ActivateAccount.php";
						//window.location.href = "https://example.com/jettahconnect/seller/index.php";
					}, 2000);
				
				}
			}
		});

	});

});