function UpdateReceived_Status(trx_id) {
    $.ajax({
        url: 'orderReceivedStatus.php', // Replace with your backend endpoint
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
