function submitPaymentInfo(trx_id) {
    $.ajax({
        url: 'classes/update_payment.php', // Replace with your backend endpoint
        type: 'POST',
        data: { trx_id: trx_id },
        success: function(response) {
            // Check if the update was successful
            alert(response);
           location.reload();
        },
        error: function(response) {
            // Handle errors
            alert(response);
        }
    });
}

