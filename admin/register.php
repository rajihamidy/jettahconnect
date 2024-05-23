<?php session_start(); ?>
<?php include_once("./templates/top.php"); ?>
<?php include_once("./templates/navbar.php"); ?>

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

<div class="container-fluid">
  <div class="row">
    
    <?php include "./templates/sidebar.php"; ?>

    <div class="container">
  <div class="row justify-content-center" style="margin:100px 0;">
    <div class="col-md-4">
      <h4 class="text-center">Admin Registration</h4>
      <p class="message"></p>
      <form id="admin-register-form">
        <div class="form-group">
          <label for="name">Full Name</label>
          <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
        </div>
        <div class="form-group">
          <label for="email">Email Address</label>
          <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">

        </div>
        <div class="form-group">
          <input id="password" name="password" type="password" class="form-control" placeholder="Password" required>
          <span toggle="#password" class="fa fa-fw fa-eye field-icon password"></span>
        </div>
        <div class="form-group">
          <input id="cpassword" name="cpassword" type="cpassword" class="form-control" placeholder="Re type Password" required>
          <span toggle="#cpassword" class="fa fa-fw fa-eye field-icon cpassword"></span>
        </div>
        <input type="hidden" name="admin_register" value="1">
        <button type="button" class="btn btn-primary register-btn">Register</button>
      </form>
    </div>
  </div>
</div>



      
     
    </main>
  </div>
</div>



<?php include_once("./templates/footer.php"); ?>





<script type="text/javascript" src="./js/main.js"></script>
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
    $(".cpassword").click(function() {
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
