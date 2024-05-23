$(document).ready(function(){

	$(".register-btn").on("click", function(){

		$.ajax({
			url : '../admin/classes/Credentials.php',
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
			},
			error: function(xhr, status, error) {
				console.error("Error Occured: " + status + ", " + error);
				// Handle the error here, for example:
				$(".message").html('<span class="text-danger">Error Occured: ' + status + ', ' + error + '</span>');
			}
		});

	});

	$(".login-btn").on("click", function(){

		$.ajax({
			url : '../admin/classes/Credentials.php',
			method : "POST",
			data : $("#admin-login-form").serialize(),
			success : function(response){
				console.log(response);
				var resp = $.parseJSON(response);
				if (resp.status == 202) {
					$("#admin-register-form").trigger("reset");
					//$(".message").html('<span class="text-success">'+resp.message+'</span>');
					window.location.href = window.origin+"/jettahconnect/admin/index.php";
				}else if(resp.status == 303){
					$(".message").html('<span class="text-danger">'+resp.message+'</span>');
				}
			},
			error: function(xhr, status, error) {
				console.error("Error Occured: " + status + ", " + error);
				// Handle the error here, for example:
				$(".message").html('<span class="text-danger">Error Occured: ' + status + ', ' + error + '</span>');
			}
		});

	});

});