// Function to update delivery information
function UpdateDeliveryInfo(trx_id) {
    $.ajax({
        url: 'classes/delivery_status.php', // Replace with your backend endpoint
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

// Make sure to attach event listeners after the DOM is fully loaded
document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('.alert-button').addEventListener('click', function() {
        document.getElementById('customAlert').style.display = 'none';
    });
});
