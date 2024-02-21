$(document).ready(function () {

	getCustomers();
	getCustomerOrders();
	
	function getCustomers() {
		$.ajax({
			url: '../seller/classes/Customers.php',
			method: 'POST',
			data: { GET_CUSTOMERS: 1 },
			success: function (response) {

				console.log(response);
				var resp = $.parseJSON(response);
				if (resp.status == 202) {

					var customersHTML = "";

					$.each(resp.message, function (index, value) {

						customersHTML += '<tr>' +
							'<td>#</td>' +
							'<td>' + value.first_name + ' ' + value.last_name + '</td>' +
							'<td>' + value.email + '</td>' +
							'<td>' + value.mobile + '</td>' +
							'<td>' + value.address1 + '<br>' + value.address2 + '</td>' +
							'</tr>'

					});

					$("#customer_list").html(customersHTML);

				} else if (resp.status == 303) {

				}

			}
		})

	}

	

	function getCustomerOrders() {
		$.ajax({
			url: '../seller/classes/Customers.php',
			method: 'POST',
			data: { GET_CUSTOMER_ORDERS: 1 },
			success: function (response) {

				console.log(response);
				var resp = $.parseJSON(response);
				if (resp.status == 202) {

					var customerOrderHTML = "";
					var sn=0;

					$.each(resp.message, function (index, value) {
						sn++;
						if (value.p_status === "Not Completed") {
							
							customerOrderHTML += '<tr>' +
								'<td>' + sn + '</td>' +

								'<td class="text-wrap">' + value.first_name + " " + value.last_name + '</td>' +
								'<td class="text-wrap">' + value.address1 + '</td>' +
								'<td class="text-wrap">' + value.mobile + '</td>' +
								'<td class="text-wrap">' + value.email + '</td>' +
								'<td class="text-wrap">' + value.product_title + '</td>' +
								'<td class="text-wrap">' + value.qty + '</td>' +
								'<td class="text-wrap">' + value.trx_id + '</td>' +
								'<td class="text-wrap">' + value.orderdate + '</td>' +
								'<td><button class="btn btn-danger" onclick="submitPaymentInfo(\'' + value.trx_id + '\')">Payment Received?</button></td>' +

								'</tr>';
						} else {
							customerOrderHTML += '<tr>' +
								'<td>' + sn + '</td>' +

								'<td class="text-wrap">' + value.first_name + " " + value.last_name + '</td>' +
								'<td class="text-wrap">' + value.address1 + '</td>' +
								'<td class="text-wrap">' + value.mobile + '</td>' +
								'<td class="text-wrap">' + value.email + '</td>' +
								'<td class="text-wrap">' + value.product_title + '</td>' +
								'<td class="text-wrap">' + value.qty + '</td>' +
								'<td class="text-wrap">' + value.trx_id + '</td>' +
								'<td class="text-wrap">' + value.orderdate + '</td>' +
								'<td class="text-wrap text-primary">' + value.p_status + '</td>' +
								'</tr>';
						}
					});
					
					

					$("#customer_order_list").html(customerOrderHTML);

				} else if (resp.status == 303) {
					$("#customer_order_list").html(resp.message);
				}

			}
		})

	}

	


	
});


