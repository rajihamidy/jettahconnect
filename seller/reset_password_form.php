<?php include "./templates/top.php"; ?>

<?php include "./templates/navbar.php"; ?>
<style>
    .form-group {
        position: relative;
    }

    .field-icon {
        position: absolute;
        right: 10px;
        /* Adjust this value according to your preference */
        top: 70%;
        transform: translateY(-50%);
        cursor: pointer;
    }

    .form-control {
        padding-right: 30px;
        /* Adjust this value according to the icon's size */
    }
</style>

<div class="container">
    <div class="row justify-content-center" style="margin:100px 0;">
        <div class="col-md-4">
            <h4 class="text-center">Reset Password Form</h4>
            <hr>
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





<?php include "./templates/footer.php"; ?>

<script type="text/javascript" src="./js/main.js"></script>
<script>
    $('#reset-password-form').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            method: 'POST',
            url: 'classes/reset_password.php',
            data: $(this).serialize(),
            success: function(response) {
                console.log(response); // Log the response for debugging
                var tempDiv = document.createElement('div');
                tempDiv.innerHTML = response;

                var message = tempDiv.querySelector('.text-primary');
                if (message && message.innerText === "Your password has been successfully reset.") {
                    $('#e_msg').html(response);

                    setTimeout(function() {
                        window.location.href = "login.php";
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