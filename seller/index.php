<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
  header("location:login.php");
}

include "./templates/top.php";

?>

<?php  include "./templates/navbar.php"; ?>

<div class="container-fluid">
  <div class="row">

    <?php include "./templates/sidebar.php"; 
    include "datetime.php";
    ?>


    </main>
  </div>
  </div>
</div>

<?php include "./templates/footer.php"; ?>

<script type="text/javascript" src="./js/admin.js"></script>
<script type="text/javascript" src="./js/sidebar.js"></script>