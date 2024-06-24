$(document).ready(function () {


	getSellerInbox();
	getSellerOutBox();

	function getSellerInbox() {
		$.ajax({
			url: '../seller/classes/Messages.php',
			method: 'POST',
			data: { GET_SELLER_INBOX: 1 },
			success: function (response) {

				console.log(response);
				var resp = $.parseJSON(response);
				if (resp.status == 202) {

					var customerOrderHTML = "";
					var sn = 0;

					$.each(resp.message, function (index, value) {
						sn++;


						customerOrderHTML += '<tr>' +
							'<td class="col-auto">' + sn + '</td>' +

							'<td class="text-wrap">' + value.replier_email  + '</td>' +

							'<td class="text-wrap">' + value.complaints.split(' ').slice(0, 5).join(' ') + '</td>' +
							'<td class="text-wrap">' + value.reply_text + '</td>' +

							'<td class="text-wrap">' + value.reply_date + '</td>' +
							
							'</tr>';


						
					});



					$("#seller_inbox_list").html(customerOrderHTML);

				} else if (resp.status == 303) {
					$("#seller_inbox_list").html(resp.message);
				}

			}
		})

	}

	function getSellerOutBox() {
		$.ajax({
			url: '../seller/classes/Messages.php',
			method: 'POST',
			data: { GET_SELLER_OUTBOX: 1 },
			success: function (response) {

				console.log(response);
				var resp = $.parseJSON(response);
				if (resp.status == 202) {

					var customerOrderHTML = "";
					var sn = 0;

					$.each(resp.message, function (index, value) {
						sn++;


						customerOrderHTML += '<tr>' +
							'<td class="col-auto">' + sn + '</td>' +

							
							'<td class="text-wrap">' + value.complaints.split(' ').slice(0, 5).join(' ') + '</td>' +
							'<td class="text-wrap">' + value.complaints  + '</td>' +

							'<td class="text-wrap">' + value.submDate + '</td>' +
							
							'</tr>';


						
					});



					$("#seller_OutBox_list").html(customerOrderHTML);

				} else if (resp.status == 303) {
					$("#seller_OutBox_list").html(resp.message);
				}

			}
		})

	}




});


