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
					$(".message").html('<span class="text-success">'+resp.message+'</span>');
				}else if(resp.status == 303){
					$(".message").html('<span class="text-danger">'+resp.message+'</span>');
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