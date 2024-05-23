$(document).ready(function(){
	getAdmins();
	
	function getAdmins(){
	  $.ajax({
		url: '../admin/classes/Admin.php',
		method: 'POST',
		data: {GET_ADMIN: 1},
		success: function(response){
		  console.log(response);
		  var resp = $.parseJSON(response);
  
		  if (resp.status == 202) {
			var adminHTML = '';
			var sn = 0;
  
			$.each(resp.message, function(index, value){
			  sn++;
			  
			  adminHTML += '<tr>'+
							'<td>'+sn+'</td>'+
							'<td>'+ value.name +'</td>'+
							'<td>'+ value.shopname +'</td>'+
							'<td>'+ value.shopaddress +'</td>'+
							'<td>'+ value.mobile +'</td>'+
							'<td>'+ value.email +'</td>'+
							'<td>'+ value.id.toString().padStart(4, '0') +'</td>'+
							
						  '</tr>';
			});
  
			$("#admin_list").html(adminHTML);
		  } else if (resp.status == 303) {
			$("#admin_list").html(resp.message);
		  }
		}
	  })
	}
  
	$(".add-brand").on("click", function(){
	  alert();
	});
  });
  