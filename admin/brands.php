<?php session_start(); ?>
<?php include "indexhead.php"; ?>
<?php include_once("./templates/top.php"); ?>
<?php // include_once("./templates/navbar.php"); 
?>
<div class="container-fluid">
  <div class="row">

    <?php // include "./templates/sidebar.php"; 
    ?>



    <div class="row">
      <div class="col-12">
        <h2>Brands</h2>
      </div>
    </div>
    <?php // include "./templates/sidebar.php"; 
    ?>
    <div class="table-responsive">
      <div class="row mb-3">
        <div class="col-md-3 offset-md-7">
          <input type="text" class="form-control" id="searchInput" placeholder="Search..." />
        </div>
        <div class="col-md-2">
          <button class="btn btn-primary btn-block" id="searchButton">Search</button>
        </div>
      </div>
     <!-- <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
             <th>Action</th> 
            </tr>
          </thead>
          <tbody id="brand_list">

        </tbody>
        </table>
        <div class="table-responsive d-flex justify-content-center">
        <table class="table table-striped table-sm mx-auto w-auto">
-->
      <div class="table-responsive d-flex justify-content-center">
        <table class="table table-striped table-sm ">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <!--  <th>Action</th> -->
            </tr>
          </thead>
          <tbody id="brand_list">
          </tbody>
        </table>
      </div>

    </div>
    </main>
  </div>
</div>




<?php include_once("./templates/footer.php"); ?>



<script type="text/javascript" src="./js/brands.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  $(document).ready(function() {
    $('#searchInput').on('keyup', function() {
      var searchTerm = $(this).val().toLowerCase();
      filterTable(searchTerm);
    });

    $('#searchButton').on('click', function() {
      var searchTerm = $('#searchInput').val().toLowerCase();
      filterTable(searchTerm);
    });

    // Function to filter table rows
    function filterTable(searchTerm) {
      $('#brand_list tr').each(function() {
        var rowText = $(this).text().toLowerCase();
        if (rowText.indexOf(searchTerm) === -1) {
          $(this).hide();
        } else {
          $(this).show();
        }
      });
    }
  });
</script>