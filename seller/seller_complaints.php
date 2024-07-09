<?php
session_start();
if (!isset($_SESSION["admin_id"])) {
    header("location:login.php");
}else{
    $email=$_SESSION['admin_email'];
}

include "./templates/top.php";
include_once("./templates/navbar.php");
$userid = $_SESSION['admin_id'];

?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="../fontawesome6.5.2/css/all.css">
<style>
    .panel-footer {
        text-align: center;

        bottom: 0;
        left: 0;
        width: 100%;
        margin-top: 35px;
    }
</style>
<script>
      document.addEventListener("DOMContentLoaded", (event) => {
         document.addEventListener("contextmenu", (event) => {
            event.preventDefault();
         });
      });
   </script>
<?php  ?>
<div class="container-fluid">
    <div class="row">

        <?php include "./templates/sidebar2.php"; ?>

        <div class="container">

            <div class="row">
                <!--1 first part side bar	 -->
                <div class="col-md-2 col-xs-6">
                    <div id="main">

                    </div>
                    <div id="get_category" style="display:none"></div>
                    <div id="get_brand" style="display:none"></div>
                </div>
                <!--1 first part side bar End	 -->

                <!--2 Second part side bar	 -->
                <div class="col-md-8 col-xs-12">
                    <div class="row">
                        <div class="col-md-12 col-xs-12" id="product_msg">
                        </div>
                    </div>

                    <div class="panel panel-info">
                        <h4 class="text-center text-success mb-4">Customer Complaint Form</h4>
                        <hr>
                        <h4>

                            <div id="complaint">
                                <form enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone Number (11 characters):</label>
                                        <input type="text" max="11" class="form-control" id="phone" name="phone" pattern=".{11}" maxlength="11" title="Exactly 11 characters">
                                    </div>
                                    <div class="form-group">
                                        <label for="complaints">Complaints:</label>
                                        <textarea class="form-control" id="complaints" name="complaints" rows="5" placeholder="Enter your complaints" maxlength="500"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="file">Upload Image (PDF or JPEG):</label>
                                        <input type="file" class="form-control-file" id="file" name="file" accept=".pdf,.jpg,.jpeg">
                                    </div>
                                    <div class="form-group">
                                        <label>Preview:</label>
                                        <img id="preview" src="#" alt="Preview" style="display: none; max-width: 200px; max-height: 200px;">
                                    </div>
                                    <div id="msg"></div>
                                    <button type="submit" class="btn btn-primary mt-3">Submit Complaints</button>
                                </form>
                            </div>



                        </h4>
                      <!--  <div class="panel-footer mt-5">&copy; <?php echo date("Y"); ?> | Developed By <a href="https://ypdatahub.com.ng">Young Programa</a></div> -->
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            // Function to handle file input change event
            function previewFile() {
                var preview = document.getElementById('preview');
                var file = document.getElementById('file').files[0];
                var reader = new FileReader();

                reader.onloadend = function() {
                    preview.src = reader.result;
                    preview.style.display = 'block';
                }

                if (file) {
                    reader.readAsDataURL(file);
                } else {
                    preview.src = '';
                    preview.style.display = 'none';
                }
            }

            // Attach the previewFile function to the file input's change event
            document.getElementById('file').addEventListener('change', previewFile);

            $(document).ready(function() {
                $('#complaint form').submit(function(event) {
                    event.preventDefault();

                    var formData = new FormData();
                    var email = $('#email').val();
                    var phone = $('#phone').val();
                    var complaints = $('#complaints').val();
                    var file = $('#file')[0].files[0];

                    formData.append('email', email);
                    formData.append('phone', phone);
                    formData.append('complaints', complaints);
                    formData.append('file', file);

                    $.ajax({
                        method: 'POST',
                        url: 'seller_complaints_script.php',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            $("#msg").html(response);
                            setTimeout(() => {
                                $("#msg").html("");
                                $('#complaint form')[0].reset(); // Reset the form
                            }, 3000);

                            console.log(response);
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                });
            });
        </script>


    </div>
    </main>
</div>
</div>

<p>
<?php require 'footer.php' ?>



<?php include_once("./templates/footer.php"); ?>



<script type="text/javascript" src="./js/products.js"></script>
<script type="text/javascript" src="./js/sidebar.js"></script>