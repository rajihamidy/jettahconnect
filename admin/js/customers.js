$(document).ready(function () {

	getCustomers();
	getCustomerOrders();
	getCustomerComplaints();
	getSellerComplaints();
	getRegisteredAdmin()
	function getCustomers() {
		$.ajax({
			url: '../admin/classes/Customers.php',
			method: 'POST',
			data: { GET_CUSTOMERS: 1 },
			success: function (response) {

				console.log(response);
				var resp = $.parseJSON(response);
				if (resp.status == 202) {

					var customersHTML = "";
					sn = 0;

					$.each(resp.message, function (index, value) {
						sn++;
						customersHTML += '<tr>' +
							'<td>' + sn + '</td>' +
							'<td>' + value.user_id.toString().padStart(5, '0') + '</td>' +
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
			url: '../admin/classes/Customers.php',
			method: 'POST',
			data: { GET_CUSTOMER_ORDERS: 1 },
			success: function (response) {

				console.log(response);
				var resp = $.parseJSON(response);
				if (resp.status == 202) {

					var customerOrderHTML = "";

					$.each(resp.message, function (index, value) {

						customerOrderHTML += '<tr>' +

							'<td>' + value.order_id + '</td>' +
							'<td>' + value.product_id + '</td>' +
							'<td>' + value.product_title + '</td>' +
							'<td>' + value.qty + '</td>' +
							'<td>' + value.trx_id + '</td>' +
							'<td>' + value.p_status + '</td>' +
							'<td>' + value.orderdate + '</td>' +
							'<td>' + value.seller_id + " " + value.name + '</td>' +
							'</tr>';

					});

					$("#customer_order_list").html(customerOrderHTML);

				} else if (resp.status == 303) {
					$("#customer_order_list").html(resp.message);
				}

			}
		})

	}


	function getSellerComplaints() {
		$.ajax({
			url: '../admin/classes/Customers.php',
			method: 'POST',
			data: {
				GET_SELLER_COMPLAINTS: 1,
				_: new Date().getTime() // Adding timestamp to prevent caching
			},
			success: function (response) {
				console.log("Server response:", response);

				var resp = $.parseJSON(response);
				if (resp.status == 202) {
					var customerOrderHTML = "";
					sn = 0;

					$.each(resp.message, function (index, value) {
						console.log("Processing item:", value);

						sn++;
						var userId = (value.user_id !== undefined && value.user_id !== null) ? value.user_id : "N/A";
						var email = (value.email !== undefined && value.email !== null) ? value.email : "N/A";
						var phone = (value.phone !== undefined && value.phone !== null) ? value.phone : "N/A";
						var complaints = (value.complaints !== undefined && value.complaints !== null) ? value.complaints : "N/A";
						var fileName = (value.file_name !== undefined && value.file_name !== null) ? value.file_name : "No file";
						var submDate = (value.submDate !== undefined && value.submDate !== null) ? value.submDate : "N/A";

						customerOrderHTML += '<tr>' +
							'<td>' + sn + '</td>' +
							'<td>' + userId.toString().padStart(4, '0') + '</td>' +
							'<td>' + email + '</td>' +
							'<td>' + phone + '</td>' +
							'<td>' + complaints + '</td>' +
							'<td>' + (fileName !== "No file" ? '<a href="../seller/complaints/' + encodeURIComponent(fileName) + '" download>' + fileName + '</a>' : fileName) + '</td>' +
							'<td>' + submDate + '</td>' +
							'</tr>';

					});

					$("#Selcomplaints_list").html(customerOrderHTML);

				} else if (resp.status == 303) {
					$("#Selcomplaints_list").html(resp.message);
				}
			},
			error: function (xhr, status, error) {
				console.error("Error in AJAX request:", status, error);
			}
		});
	}


	function getCustomerComplaints() {
		$.ajax({
			url: '../admin/classes/Customers.php',
			method: 'POST',
			data: {
				GET_CUSTOMER_COMPLAINTS: 1,
				_: new Date().getTime() // Adding timestamp to prevent caching
			},
			success: function (response) {
				console.log("Server response:", response);

				var resp = $.parseJSON(response);
				if (resp.status == 202) {
					var customerOrderHTML = "";
					sn = 0;

					$.each(resp.message, function (index, value) {
						console.log("Processing item:", value);

						sn++;
						var userId = (value.user_id !== undefined && value.user_id !== null) ? value.user_id : "N/A";
						var email = (value.email !== undefined && value.email !== null) ? value.email : "N/A";
						var phone = (value.phone !== undefined && value.phone !== null) ? value.phone : "N/A";
						var complaints = (value.complaints !== undefined && value.complaints !== null) ? value.complaints : "N/A";
						var fileName = (value.file_name !== undefined && value.file_name !== null) ? value.file_name : "No file";
						var submDate = (value.submDate !== undefined && value.submDate !== null) ? value.submDate : "N/A";

						customerOrderHTML += '<tr>' +
							'<td>' + sn + '</td>' +
							'<td>' + userId.toString().padStart(4, '0') + '</td>' +
							'<td>' + email + '</td>' +
							'<td>' + phone + '</td>' +
							'<td>' + complaints + '</td>' +
							'<td>' + (fileName !== "No file" ? '<a href="../seller/complaints/' + encodeURIComponent(fileName) + '" download>' + fileName + '</a>' : fileName) + '</td>' +
							'<td>' + submDate + '</td>' +
							'</tr>';

					});

					$("#complaints_list").html(customerOrderHTML);

				} else if (resp.status == 303) {
					$("#complaints_list").html(resp.message);
				}
			},
			error: function (xhr, status, error) {
				console.error("Error in AJAX request:", status, error);
			}
		});
	}

	function getRegisteredAdmin() {
		$.ajax({
			url: '../admin/classes/Customers.php',
			method: 'POST',
			data: {
				GET_REGISTERED_ADMIN: 1,
				_: new Date().getTime() // Adding timestamp to prevent caching
			},
			success: function (response) {
				console.log("Server response:", response);

				var resp = $.parseJSON(response);
				if (resp.status == 202) {
					var customerOrderHTML = "";
					sn = 0;

					$.each(resp.message, function (index, value) {
						

						sn++;
						var userId = (value.id !== undefined && value.id !== null) ? value.id : "N/A";
						var name = (value.name !== undefined && value.name !== null) ? value.name : "N/A";
						var email = (value.email !== undefined && value.email !== null) ? value.email : "N/A";
						var phone = (value.mobile !== undefined && value.mobile !== null) ? value.mobile : "N/A";
						var submDate = (value.regdate !== undefined && value.regdate !== null) ? value.regdate : "N/A";

						customerOrderHTML += '<tr>' +
							'<td>' + sn + '</td>' +
							'<td>' + userId.toString().padStart(4, '0') + '</td>' +
							'<td>' + name + '</td>' +
							'<td>' + email + '</td>' +
							'<td>' + phone + '</td>' +
							//'<td>' + (fileName !== "No file" ? '<a href="../seller/complaints/' + encodeURIComponent(fileName) + '" download>' + fileName + '</a>' : fileName) + '</td>' +
							'<td>' + submDate + '</td>' +
							'</tr>';

					});

					$("#complaints_list").html(customerOrderHTML);

				} else if (resp.status == 303) {
					$("#complaints_list").html(resp.message);
				}
			},
			error: function (xhr, status, error) {
				console.error("Error in AJAX request:", status, error);
			}
		});
	}



});