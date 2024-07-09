$(document).ready(function () {
    // Perform AJAX POST request to get bank names
    $.ajax({
        url: 'getbankname.php',
        method: 'POST',
        success: function (response) {
            // Display HTML response in the select element with id 'bankName'
            $('#bankName').html(response);
        }
    });
});

function submitForm() {
    var numberPattern = /^\d{10}$/;
    var bankname = $('#bankName').val();
    var realBankName = $("#bankName option:selected").text();
    var accountNumber = $('#accountNumber').val();
    var amount = $('#amount').val();

    if (bankname.trim() === '') {
        showCustomAlert('Select Bank Name');
        $('#bankName').focus();
    } else if (accountNumber.trim() === '') {
        showCustomAlert('Enter Account Number');
        $('#accountNumber').focus();
    } else if (accountNumber.length != 10) {
        showCustomAlert('Account number must be 10 digits');
        $('#accountNumber').focus();
    } else if (!(numberPattern.test(accountNumber))) {
        showCustomAlert('Account number must be digits');
        $('#accountNumber').focus();
    } else if (amount.trim() === '') {
        showCustomAlert('Enter Amount');
        $('#amount').focus();
    } else if (amount < 500) {
        showCustomAlert('Minimum value is #500');
        $('#amount').focus();
    } else {

      //  var submitButton = $("button[onclick='submitForm();']");
      //  submitButton.text('Processing...'); 
      //  submitButton.prop('disabled', true);
        
        document.getElementById("customerName").value = "";
        var accountNumber = document.getElementById("accountNumber").value;
        var bankCode = $("#bankName").val();
        var amount = $("#amount").val();
       // var accountBalance = sessionStorage.getItem('accountBalance'); // Assuming you store account balance in sessionStorage

        // Send request to server-side script
        $.ajax({
            type: 'POST',
            url: 'validate_account.php',  // URL to your server-side script
            data: { accountNumber: accountNumber, bankCode: bankCode, amount: amount },
            success: function (response) {
                var data = JSON.parse(response);
                console.log('Response:', data);
                if (data.status) {
                    document.getElementById("customerName").value = data.data.account_name;

                    // Prepare form data for AJAX call
                    var formData = {
                        bankCode: bankCode,
                        bankName: realBankName,
                        accountNumber: accountNumber,
                        amount: amount,
                        customerName: data.data.account_name
                    };

                    // AJAX call
                    $.ajax({
                        type: 'POST',
                        url: 'payment.php',  // Update this URL to your server endpoint
                        data: formData,
                        success: function (response) {
                            // Store form values in sessionStorage
                            sessionStorage.setItem('bankCode', bankCode);
                            sessionStorage.setItem('bankName', realBankName);
                            sessionStorage.setItem('accountNumber', accountNumber);
                            sessionStorage.setItem('amount', amount);
                            sessionStorage.setItem('customerName', data.data.account_name);
        var submitButton = $("button[onclick='submitForm();']");
        submitButton.text('Processing...'); 
        submitButton.prop('disabled', true);
                            // Redirect to the next page
                            window.location.href = 'payment.php';
                        },
                        error: function (xhr, status, error) {
                            console.error('AJAX error:', error);
                            showCustomAlert('An error occurred while processing your request.');
                        }
                    });
                } else {
                   
                    showCustomAlert(data.message);

                }
            },
            error: function (xhr, status, error) {
                console.error('AJAX error:', error);
                showCustomAlert('An error occurred while verifying account details.');
            }
        });
    }
}
