function submitPaymentInfo(trx_id) {
    $.ajax({
        url: 'classes/update_payment.php', // Replace with your backend endpoint
        type: 'POST',
        data: { trx_id: trx_id },
        success: function(response) {
            // Show custom alert and reload the page after the alert is closed
            showCustomAlert(response, function() {
                location.reload();
            });
        },
        error: function(response) {
            // Handle errors
            showCustomAlert('An error occurred: ' + response.statusText);
        }
    });
}

// Ensure the custom alert functionality works correctly
document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('.alert-button').addEventListener('click', function() {
        document.getElementById('customAlert').style.display = 'none';
    });
});
