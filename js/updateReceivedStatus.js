function UpdateReceived_Status(trx_id) {
    $.ajax({
        url: 'orderReceivedStatus.php', 
        type: 'POST',
        data: { trx_id: trx_id },
        success: function(response) {
            
            alert(response);
           location.reload();
        },
        error: function(response) {
         
            alert(response);
        }
    });
}
