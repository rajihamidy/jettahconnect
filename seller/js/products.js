$(document).ready(function(){

	var productList;

	function getProducts(){
		$.ajax({
			url : '../seller/classes/Products.php',
			method : 'POST',
			data : {GET_PRODUCT:1},
			success : function(response){
				//console.log(response);
				var resp = $.parseJSON(response);
				if (resp.status == 202) {

					var productHTML = '';

					productList = resp.message.products;
sn=0;
					if (productList) {
						$.each(resp.message.products, function(index, value){
sn++;
							productHTML += '<tr>'+
								              '<td>'+sn+'</td>'+
								              '<td>'+ value.product_title +'</td>'+
								              '<td><img width="60" height="60" src="../product_images/'+value.product_image+'"></td>'+
								              '<td>'+ value.product_price +'</td>'+
								              '<td>'+ value.product_qty +'</td>'+
								              '<td>'+ value.cat_title +'</td>'+
								              '<td>'+ value.brand_title +'</td>'+
								              '<td><a class="btn btn-sm btn-info edit-product" style="color:#fff;"><span style="display:none;">'+JSON.stringify(value)+'</span><i class="fas fa-pencil-alt"></i></a>&nbsp;<a pid="'+value.product_id+'" class="btn btn-sm btn-danger delete-product" style="color:#fff;"><i class="fas fa-trash-alt"></i></a></td>'+
								            '</tr>';

						});

						$("#product_list").html(productHTML);
					}

					


					var catSelectHTML = '<option value="">Select Category</option>';
					$.each(resp.message.categories, function(index, value){

						catSelectHTML += '<option value="'+ value.cat_id +'">'+ value.cat_title +'</option>';

					});

					$(".category_list").html(catSelectHTML);

					var brandSelectHTML = '<option value="">Select Brand</option>';
					$.each(resp.message.brands, function(index, value){

						brandSelectHTML += '<option value="'+ value.brand_id +'">'+ value.brand_title +'</option>';

					});

					$(".brand_list").html(brandSelectHTML);

				}
			}

		});
	}

	getProducts();

	$(".add-product").on("click", function() {
		// Validation for required fields
		var productName = $("input[name='product_name']").val().trim();
		var brandId = $("select[name='brand_id']").val();
		var categoryId = $("select[name='category_id']").val();
		var productDesc = $("textarea[name='product_desc']").val().trim();
		var productQty = $("input[name='product_qty']").val();
		var productPrice = $("input[name='product_price']").val();
		var productkeywords = $("input[name='product_keywords']").val();
		var productImage = $("input[name='product_image']").val();
	
		// Check if any required field is empty
		if (!productName) {
			showCustomAlert("Product Name is required.");
			return;
		}
		if (!brandId) {
			showCustomAlert("Please select a Brand.");
			return;
		}
		if (!categoryId) {
			showCustomAlert("Please select a Category.");
			return;
		}
		if (!productDesc) {
			showCustomAlert("Product Description is required.");
			return;
		}
		if (!productQty || productQty <= 0) {
			showCustomAlert("Please enter a valid Product Quantity.");
			return;
		}
		if (!productPrice || productPrice <= 0) {
			showCustomAlert("Please enter a valid Product Price.");
			return;
		}
		if (!productkeywords) {
			showCustomAlert("Please Enter Product Keywords.");
			return;
		}
		if (!productImage) {
			showCustomAlert("Please upload a Product Image.");
			return;
		}
	
		// If all fields are valid, proceed with AJAX call
		$.ajax({
			url: '../seller/classes/Products.php',
			method: 'POST',
			data: new FormData($("#add-product-form")[0]),
			contentType: false,
			cache: false,
			processData: false,
			success: function(response) {
				console.log(response);
				try {
					var resp = $.parseJSON(response);
					if (resp.status == 202) {
						$("#add_product_modal").modal('hide');
						$("#add-product-form")[0].reset();
						getProducts();
						showCustomAlert(resp.message);
					} else if (resp.status == 303) {
						showCustomAlert(resp.message);
					} else {
						showCustomAlert("Unexpected JSON response. Please try again later.");
					}
				} catch (error) {
					showCustomAlert("Error parsing JSON response. Please try again later.");
				}
			}
		});
	});
	
			
		

	$(document.body).on('click', '.edit-product', function(){

		console.log($(this).find('span').text());

		var product = $.parseJSON($.trim($(this).find('span').text()));

		console.log(product);

		$("input[name='e_product_name']").val(product.product_title);
		$("select[name='e_brand_id']").val(product.brand_id);
		$("select[name='e_category_id']").val(product.cat_id);
		$("textarea[name='e_product_desc']").val(product.product_desc);
		$("input[name='e_product_qty']").val(product.product_qty);
		$("input[name='e_product_price']").val(product.product_price);
		$("input[name='e_product_keywords']").val(product.product_keywords);
		$("input[name='e_product_image']").siblings("img").attr("src", "../product_images/"+product.product_image);
		$("input[name='pid']").val(product.product_id);
		$("#edit_product_modal").modal('show');

	});

	$(".submit-edit-product").on('click', function(){

		$.ajax({

			url : '../seller/classes/Products.php',
			method : 'POST',
			data : new FormData($("#edit-product-form")[0]),
			contentType : false,
			cache : false,
			processData : false,
			success : function(response){
				console.log(response);
				var resp = $.parseJSON(response);
				if (resp.status == 202) {
					$("#edit-product-form").trigger("reset");
					$("#edit_product_modal").modal('hide');
					getProducts();
					showCustomAlert(resp.message);
					window.location.href = "products.php";
				}else if(resp.status == 303){
					showCustomAlert(resp.message);
				}
			}

		});


	});

	$(document.body).on('click', '.delete-product', function() {
		var pid = $(this).attr('pid');
		
		$('#confirm_message').text('Are you sure you want to delete this product?');
		$('#confirm_modal').modal('show');
	
		$('#confirm_yes').off('click').on('click', function() {
			$.ajax({
				url: '../admin/classes/Products.php',
				method: 'POST',
				data: {DELETE_PRODUCT: 1, pid: pid},
				success: function(response) {
					console.log(response);
					var resp = $.parseJSON(response);
					if (resp.status == 202) {
						getProducts();
					} else if (resp.status == 303) {
						showCustomAlert(resp.message);
					}
				}
			});
			$('#confirm_modal').modal('hide');
		});
	});
	

});