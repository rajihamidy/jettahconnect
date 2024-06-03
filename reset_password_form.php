<?php
require "config/constants.php";
session_start();
if (isset($_SESSION["uid"])) {
    header("location:profile.php");
}

$email = isset($_GET["email"]) ? $_GET["email"] : "";
$recovery_code = isset($_GET["recovery_code"]) ? $_GET["recovery_code"] : "";
$new_password = isset($_GET["new_password"]) ? $_GET["new_password"] : "";
$cnew_password = isset($_GET["cnew_password"]) ? $_GET["cnew_password"] : "";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Jettah Connect|Reset Password</title>
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
            width: 100vw;
        }

        /* Adjust styles for small devices */
        @media screen and (max-width: 768px) {

            .col-md-2,
            .col-md-8,
            .col-md-1 {
                width: 100%;
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
            }
        }

        /* Style to place the eye on the password button */
        .form-group {
            position: relative;
        }

        .field-icon {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }

        .form-control {
            padding-right: 30px;
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
                <div class="col-md-2">
                    <a href="index.php" class="navbar-brand">Jettah Connect</a>
                </div>
                <div class="col-md-2">
                    <li><a href="index.php" class="navbar-brand"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                </div>
            </div>
        </div>
    </div>

    <div style="margin-top: 55px;"></div>

    <div class="container">
        <div class="card mb-3">
            <div class="pt-4 pb-2">
                <h5 class="card-title text-center pb-0 fs-4">Reset Password Form</h5>
            </div>
            <div class="card-body">
                <div class="row centered-form">
                    <div class="panel-heading">
                        <form id="reset-password-form" onsubmit="return false">
                            <div>
                                <label for="email">Email:</label>
                                <input class="form-control" type="email" name="email" required>
                            </div>
                            <div>
                                <label for="recovery_code">Recovery Code:</label>
                                <input class="form-control" type="text" name="recovery_code" required>
                            </div>
                            <div>
                                <label for="new_password">New Password:</label>
                                <input class="form-control" type="password" name="new_password" required>
                            </div>
                            <div>
                                <label for="cnew_password">Re-type Password:</label>
                                <input class="form-control" type="password" name="cnew_password" required>
                            </div>
                            <div id="e_msg" class=""></div>
                            <div>
                                <p></p>
                                <button type="submit" class="btn btn-primary p-1">Reset Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="panel-footer">&copy; <?php echo date("Y"); ?> | Developed By <a href="https://ypdatahub.com.ng">Young Programa</a></div>
</body>

<script type="text/javascript" src="./js/sidebar.js"></script>

<script>
    $('#reset-password-form').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            method: 'POST',
            url: 'reset_password.php',
            data: $(this).serialize(),
            success: function(response) {
                var tempDiv = document.createElement('div');
                tempDiv.innerHTML = response;

                // Check if the temporary div contains the expected message
                var message = tempDiv.querySelector('.text-primary').innerText;
                if (message === "Your password has been successfully reset.") {
                    $('#e_msg').html(response);

                    setTimeout(function() {
                        window.location.href = "loginuser.php";
                    }, 10000);
                } else {
                    $('#e_msg').html(response);
                }

            },
            error: function(xhr, status, error) {
                $('#e_msg').html('An error occurred: ' + xhr.responseText);
            }
        });
    });
</script>

</html>