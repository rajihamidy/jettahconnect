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
			 <th>Seller's Email</th> 
			
			  <th>Reference</th>
			 
              <th>Date/Time</th>
              <th>Amount</th>
              <th>Previous Balance</th>
			  <th>New Balance</th>
              
			  
            </tr>
        </thead>
        <tbody id="withdrawal_list">
          <!-- Dynamic content will be loaded here -->
        </tbody>
        <tfoot>
          <tr>
              <th>SN</th>
		  <th>Seller's Email</th> 
			
			  <th>Reference</th>
			 
              <th>Date/Time</th>
              <th>Amount</th>
              <th>Previous Balance</th>
			  <th>New Balance</th>
              
			  
            </tr>
          </tfoot>
      </table>
    </div>
  </div>
</div>
<p></p>
<?php include 'footer.php' ?>
<?php include "./templates/footer.php"; 

 ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="./js/withdrawals.js"></script>

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
      $('#withdrawal_list tr').each(function() {
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
