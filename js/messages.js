$(document).ready(function () {


	getBuyerInbox();
	getBuyerOutBox();

	function getBuyerInbox() {
		$.ajax({
			url: 'Messages.php',
			method: 'POST',
			data: { GET_BUYER_INBOX: 1 },
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



					$("#buyer_inbox_list").html(customerOrderHTML);

				} else if (resp.status == 303) {
					$("#buyer_inbox_list").html(resp.message);
				}

			}
		})

	}

	function getBuyerOutBox() {
		$.ajax({
			url: 'Messages.php',
			method: 'POST',
			data: { GET_BUYER_OUTBOX: 1 },
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



					$("#buyer_Outbox_list").html(customerOrderHTML);

				} else if (resp.status == 303) {
					$("#buyer_Outbox_list").html(resp.message);
				}

			}
		})

	}




});


