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
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
  }

  .form-control {
    padding-right: 30px;
    /* Adjust this value according to the icon's size */
  }
</style>
<style>
  .fa-trash-alt,
  .fa-pencil-alt {
    color: #fff;
  }

  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }
</style>
<!-- Custom styles for this template -->

<div class="container">
  <div class="row justify-content-center" style="margin:100px 0;">
    <div class="col-md-4">
      <h4 class="text-center">Admin Login</h4>
      <p class="message"></p>
      <form id="admin-login-form">
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">

        </div>
        <div class="form-group">
          <input id="password" name="password" type="password" class="form-control" placeholder="Password" required>
          <span toggle="#password" class="fa fa-fw fa-eye field-icon password"></span>
        </div>
        <input type="hidden" name="admin_login" value="1">
        <button type="button" class="btn btn-success login-btn">Login</button>
      </form>
    </div>
  </div>
</div>





<?php include "./templates/footer.php"; ?>

<script type="text/javascript" src="./js/main.js"></script>
<script>
  $(document).ready(function() {
    // Call the openNav() function when the document is ready
    $('#open1').hide();
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