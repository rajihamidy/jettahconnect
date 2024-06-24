<?php 
include 'checks.php';
?>

<?php include "indexhead.php"; ?>

<div class="container-fluid">
  <div class="row">
    <h2><center>Shop Owner's Details</center></h2>
    <div class="table-responsive">
      <div class="row mb-3">
        <div class="col-md-3 offset-md-7">
          <input type="text" class="form-control" id="searchInput" placeholder="Search..." />
        </div>
        <div class="col-md-2 py-3">
          <button class="btn btn-primary btn-block" id="searchButton">Search</button>
        </div>
      </div>
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>SN</th>
            <th>Name</th>
            <th>Shop Name</th>
            <th>Shop Address</th>
            <th>Mobile</th>
            <th>Email</th>
            <th>Seller Id</th>
            
          </tr>
        </thead>
        <tbody id="admin_list">
          <!-- Dynamic content will be loaded here -->
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php include "./templates/footer.php"; ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="./js/admin.js"></script>

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
      $('#admin_list tr').each(function() {
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
