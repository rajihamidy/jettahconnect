<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("location:login.php");
}

include "./templates/top.php";
?>

<?php include "./templates/navbar.php"; ?>

<div class="container-fluid">
    <main role="main" class="col-md-9 ml-sm-auto col-lg-12 px-4">
        <div class="container">
            <div class="content">
                <h2 class="text-center bg-primary p-2 mt-2 text-white">Seller's Payment Form</h2>

                <div class="alert alert-success" id="mysuccess" style="display: none;">
                    <strong>Info:</strong> Disbursement Successful <i class="fa fa-check-circle" aria-hidden="true"></i>
                </div>

                <form id="disbursementForm" action="payment_load.php" method="post">
                    <div class="row">
                        <div class="col-lg-2">
                            <label for="bankName">Bank Name:</label>
                            <input type="text" id="bankName" name="bankName" class="form-control" readonly><br><br>
                        </div>
                        <div class="col-lg-2">
                            <label for="accountNumber">Account Number:</label>
                            <input type="text" id="accountNumber" name="accountNumber" class="form-control" readonly><br><br>
                        </div>
                        <div class="col-lg-2">
                            <label for="customerName">Customer Name:</label>
                            <input type="text" id="customerName" name="customerName" class="form-control" readonly><br><br>
                        </div>
                        <div class="col-lg-2">
                            <label for="amount">Amount #:</label>
                            <input type="text" id="amount" name="amount" class="form-control" readonly><br><br>
                        </div>
                        <div class="col-lg-2">
                            <label for="bankCode">Bank Code:</label>
                            <input type="text" id="bankCode" name="bankCode" class="form-control" readonly><br><br>
                        </div>
                    </div>
                    <div class="row">
                        <label class="text-danger d-flex align-content-center">You will be charged #50 for this transaction.</label>
                    </div>
                    <div class="row">
                        <button type="submit" id="submitButton" class="form-control btn-primary">Proceed</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get the form values from sessionStorage
        var bankCode = sessionStorage.getItem('bankCode');
        var bankName = sessionStorage.getItem('bankName');
        var accountNumber = sessionStorage.getItem('accountNumber');
        var customerName = sessionStorage.getItem('customerName');
        var amount = sessionStorage.getItem('amount');

        // Set the form values
        document.getElementById('bankCode').value = bankCode;
        document.getElementById('bankName').value = bankName;
        document.getElementById('accountNumber').value = accountNumber;
        document.getElementById('customerName').value = customerName;
        document.getElementById('amount').value = amount;
    });

    document.addEventListener("contextmenu", (event) => {
        event.preventDefault();
    });

    $(document).ready(function() {
        $('#disbursementForm').on('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission
            var submitButton = $('#submitButton');
            submitButton.text('Processing...');
            submitButton.prop('disabled', true);
            $.ajax({
                url: 'payment_load.php',
                method: 'POST',
                data: $(this).serialize(), // Serialize the form data
                success: function(response) {
                    try {
                        // Check if response is a string and try to parse it
                        var res = (typeof response === "string") ? JSON.parse(response) : response;

                        if (res.status === true) {
                            // Extract data from the response
                            var admin_email = res.data.admin_email;
                            var reference = res.data.reference;
                            var date_time = new Date().toISOString().slice(0, 19).replace('T', ' ');
                            var amount = res.data.amount+50;
                            var previousbalance = res.data.previousbalance;
                            var newbalance = res.data.newbalance;
                            var bankname = res.data.bankname;
                            var accountNumber = res.data.accountNumber;
                            var receivername = res.data.receivername;

                            // Make the AJAX call to update_withdrawal.php
                            $.ajax({
                                url: 'classes/update_withdrawal.php',
                                method: 'POST',
                                dataType: 'json',
                                data: {
                                    admin_email: admin_email,
                                    reference: reference,
                                    date_time: date_time,
                                    amount: amount,
                                    previousbalance: previousbalance,
                                    newbalance: newbalance,
                                    bankname:bankname,
                                    accountNumber:accountNumber,
                                    receivername:receivername
                                },
                                success: function(response) {
                                    if (response.status) {
                                        console.log(response.message);
                                    } else {
                                        console.error(response.message);
                                    }
                                },
                                error: function(xhr, status, error) {
                                    console.error('AJAX Error:', status, error);
                                }
                            });
                            $('#mysuccess').show(); // Show the success message
                            showCustomAlert(res.message);
                             // Redirect to index.php after 20 seconds
                             setTimeout(function() {
                                window.location.href = 'index.php';
                                window.history.replaceState(null, null, 'index.php');
                            }, 10000);
                        } else {
                            showCustomAlert('Error: ' + res.message); // Display the error message
                        }
                    } catch (e) {
                        console.log('Error parsing JSON:', e);
                        console.log('Response:', response);
                        showCustomAlert('An error occurred while processing the response.');
                    }
                },
                error: function(xhr, status, error) {
                    console.log('XHR:', xhr);
                    console.log('Status:', status);
                    console.log('Error:', error);

                    var errorMessage = //'An error occurred: ' + error + '\n' +
                                      //'Status: ' + status + '\n' +
                                       xhr.responseText;
                    
                    showCustomAlert(errorMessage); // Display detailed error information
                }
            });
        });
    });
</script>

<?php require 'customAlert.php'; ?>
<script type="text/javascript" src="./js/customalert.js"></script>
<script type="text/javascript" src="./js/sidebar.js"></script>
<?php include "./templates/footer.php"; ?>
