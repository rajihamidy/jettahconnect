<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("location:login.php");
}

include "./templates/top.php";

?>

<?php include "./templates/navbar.php"; ?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="./js/myJs.js"></script>

<?php include "./templates/footer.php"; ?>
<div class="container">
    <main role="main" class="col-md-9 ml-sm-auto col-lg-12 px-4">
        <div class="content">
            <br>
            <h2 class="text-center bg-primary p-2 mt-2 text-white">SELLER'S WITHDRAWAL PAGE</h2>
            <div class="alert alert-success" id="mysuccess" style="display: none;">
                <strong>info</strong> Disbursement Successful <i class="fa fa-check-circle" aria-hidden="true"></i>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <label for="bankName">Bank Name:</label>
                        <select name="bankName" class="form-control" id="bankName" required>
                            <option value="">Select Bank</option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label for="accountNumber">Account Number:</label>
                        <input type="text" id="accountNumber" name="accountNumber" maxlength="10" class="form-control" required>
                    </div>
                    <div class="col-lg-4">
                        <label for="amount">Amount:</label>
                        <input type="number" id="amount" name="amount" placeholder="#500" value="500" class="form-control" required>
                    </div>
                 <!--   <div class="col-lg-3">
                        <label for="customerName">Customer Name:</label> -->
                        <input type="hidden" id="customerName" name="customerName" class="form-control" readonly>
                 <!--   </div> -->
                </div>
                <div class="row mt-3">
                    <div class="col-lg-3">
                       
                    </div>
                    <div class="col-lg-6">
                        <button type="button" onclick="submitForm();" class="form-control btn-primary">Proceed</button>
                    </div>
                    <div class="col-lg-3">
                       
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<script>
    document.addEventListener("contextmenu", (event) => {
        event.preventDefault();
    });
</script>
<p></p>
<?php include 'footer.php' ?>
</body>
<?php require 'customAlert.php'; ?>
<script type="text/javascript" src="./js/customalert.js"></script>

<script type="text/javascript" src="./js/sidebar.js"></script>
</html>
