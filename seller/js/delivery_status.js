function UpdateDeliveryInfo(trx_id) {
    $.ajax({
        url: 'classes/delivery_status.php', // Replace with your backend endpoint
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

