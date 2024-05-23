<?php
require "config/constants.php";
session_start();
if (!isset($_SESSION["uid"])) {
    header("location:index.php");
}else{
    $email=$_SESSION['buyer_email'];
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Jettah Connect</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="fontawesome6.5.2/css/all.css">
    <script src="js/jquery2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/img.css">
    <script src="main.js"></script>
    <style>
        /* CSS for scrollbar */
        .container {
            overflow-x: auto;
            /* Add scrollbar for vertical overflow */
            width: 100vw;
            /* Set height of container to full viewport height */
        }

        /* Adjust styles for small devices */
        @media screen and (max-width: 768px) {

            .col-md-2,
            .col-md-8,
            .col-md-1 {
                width: 100%;
                /* Make columns full width on small devices */
            }
        }
    </style>
</head>

<body>
<script>
      document.addEventListener("DOMContentLoaded", (event) => {
         document.addEventListener("contextmenu", (event) => {
            event.preventDefault();
         });
      });
   </script>
    <?php require 'head.php'; ?>

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
                    <div class="container-sm panel-heading">Customer Complaint Form</div>
                    <h4>

                        <div id="complaint">
                            <form  enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $email ?>"  readonly>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone Number (11 characters):</label>
                                    <input type="text"  class="form-control" id="phone" name="phone" pattern=".{11}" maxlength="11" title="Exactly 11 characters" >
                                    
                                </div>
                                <div class="form-group">
                                    <label for="complaints">Complaints:</label>
                                    <textarea class="form-control" id="complaints" placeholder="Narrate your complaints" name="complaints" rows="5" ></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="file">Upload Image (PDF or JPEG):</label>
                                    <input type="file" class="form-control-file" id="file" name="file" accept=".pdf,.jpg,.jpeg" >
                                </div>
                                <div class="form-group">
                                    <label>Preview:</label>
                                    <img id="preview" src="#" alt="Preview" style="display: none; max-width: 200px; max-height: 200px;">
                                </div>
                                <div id="msg"></div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>



                    </h4>
                    <div class="panel-footer">&copy; <?php echo date("Y"); ?> | Developed By <a href="https://rajiypentdataservices.com">Young Programa</a></div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
    <!--2 Second part side bar	 ends -->
    </div>
</body>
<script type="text/javascript" src="./js/sidebar.js"></script>
<script>
    // Function to handle file input change event
    function previewFile() {
        var preview = document.getElementById('preview');
        var file = document.getElementById('file').files[0];
        var reader = new FileReader();

        reader.onloadend = function() {
            preview.src = reader.result;
            preview.style.display = 'block'; // Display the preview image
        }

        if (file) {
            reader.readAsDataURL(file); // Read the file as a data URL
        } else {
            preview.src = ''; // Clear the preview if no file selected
            preview.style.display = 'none';
        }
    }

    // Attach the previewFile function to the file input's change event
    document.getElementById('file').addEventListener('change', previewFile);
    
    $(document).ready(function () {
    $('#complaint form').submit(function (event) {
        // Prevent the default form submission
        event.preventDefault();

        var formData = new FormData();
        var email = $('#email').val();
        var phone = $('#phone').val();
        var complaints = $('#complaints').val();
        var file = $('#file')[0].files[0]; // Get the file object

        // Add form data to FormData object
        formData.append('email', email);
        formData.append('phone', phone);
        formData.append('complaints', complaints);
        formData.append('file', file);

        $.ajax({
            method: 'POST',
            url: 'customer_complaints_script.php',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                // Handle the response from the server
                $("#msg").html(response);
                setTimeout(() => {
                    $("#msg").html("");
                    $('#complaint form')[0].reset(); // Reset the form
                }, 3000);
                
                console.log(response);
                // You can perform further actions here, such as displaying a success message
            },
            error: function (xhr, status, error) {
                // Handle errors
                
                console.error(xhr.responseText);
            }
        });
    });
});


</script>

</html>