<?php
require "config/constants.php";
session_start();
if (isset($_SESSION["uid"])) {
    header("location:profile.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Jettah Connect</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="js/jquery2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/img.css">
    <script src="main.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

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

        /* Center the form */
        .centered-form {
            display: flex;
            justify-content: center;
            align-items: center;

        }

        /* Adjust styles for small devices */
        @media screen and (max-width: 768px) {
            .centered-form {
                padding: 0 15px;
                /* Add some padding for small devices */
            }
        }
    </style>
     
    <style>
        /* Style to place the eye on the password button */
        .form-group {
            position: relative;
        }

        .field-icon {
            position: absolute;
            right: 10px;
            /* Adjust this value according to your preference */
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }

        .form-control {
            padding-right: 30px;
            /* Adjust this value according to the icon's size */
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

    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class=" row">

                <div class="col-md-2 ">

                    <a href="index.php" class="navbar-brand">Jettah Connect</a>
                </div>
                <div class="col-md-2 ">
                    <li><a href="index.php" class="navbar-brand"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                </div>

            </div>





        </div>

    </div>
    <div style="margin-top: 55px;">

    </div>

    </header>

    <div class="container">
        <div class="card mb-3">
            <div class="pt-4 pb-2">
                <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                <p class="text-center small">Enter your username & password to login</p>
            </div>
            <div class="card-body">
                <div class="row centered-form">

                    <div class="panel-heading">
                        <form onsubmit="return false" id="login" class="row g-3">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" required />
                            </div>
                            <label for="email">Password</label>


                            <div class="form-group">
                                <input id="password" name="password" type="password" class="form-control" placeholder="Password" required>
                                <span toggle="#password" class="fa fa-fw fa-eye field-icon password"></span>
                            </div>

                            <p><br /></p>
                            <p>
                            <div class="" id="e_msg"></div>
                            </p>
                            <input type="submit" class="btn btn-warning" value="Login">

                            <a href="customer_registration.php?register=1" style="color:blue; text-decoration:none;">Create Account Now</a>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <div class="panel-footer">&copy; <?php echo date("Y"); ?> | Developed By <a href="https://rajiypentdataservices.com">Young Programa</a></div>
</body>
<script type="text/javascript" src="./js/sidebar.js"></script>
<script>
    (function($) {
        $(".password").click(function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    })(jQuery);
</script>

</html>