<?php session_start();
if (!isset($_SESSION['admin_id'])) {
  header("location:login.php");
} else {
  $userid = $_SESSION['admin_id'];
}
?>
<?php include_once("./templates/top.php"); ?>
<?php include_once("./templates/navbar.php"); ?>

<div class="container-fluid">
  <div class="row">
    <?php include "./templates/sidebar2.php"; ?>

    <div class="col-md-10">
      <div class="row">
        <div class="col-10">
          <h2>Manage Brand</h2>
        </div>
        <div class="col-2">
          <a href="#" data-toggle="modal" data-target="#add_brand_modal" class="btn btn-warning btn-sm">Add Brand</a>
        </div>
      </div>
      <br>
      <div class="row mb-3">
        <div class="col-md-4 offset-md-4">
          <input type="text" class="form-control" id="searchInput" placeholder="Search..." />
        </div>
        <div class="col-md-2 py-3">
          <button class="btn btn-primary btn-block" id="searchButton">Search</button>
        </div>
      </div>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="brand_list">
            <!-- Example row -->
            <!--
            <tr>
              <td>1</td>
              <td>ABC</td>
              <td>
                <a class="btn btn-sm btn-info edit-brand" data-id="1" data-name="ABC">Edit</a>
                <a class="btn btn-sm btn-danger delete-brand" bid="1">Delete</a>
              </td>
            </tr>
            -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Add Brand Modal -->
<div class="modal fade" id="add_brand_modal" tabindex="-1" role="dialog" aria-labelledby="addBrandModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addBrandModalLabel">Add Brand</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="add-brand-form" enctype="multipart/form-data">
          <div class="form-group">
            <label for="brandTitle">Brand Name</label>
            <input type="text" name="brand_title" class="form-control" id="brandTitle" placeholder="Enter Brand Name">
          </div>
          <input type="hidden" name="user_id" value="<?php echo $userid; ?>">
          <input type="hidden" name="add_brand" value="1">
          <button type="button" class="btn btn-primary add-brand">Add Brand Name</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Edit Brand Modal -->
<div class="modal fade" id="edit_brand_modal" tabindex="-1" role="dialog" aria-labelledby="editBrandModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editBrandModalLabel">Edit Brand</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="edit-brand-form" enctype="multipart/form-data">
          <input type="hidden" name="brand_id">
          <div class="form-group">
            <label for="editBrandTitle">Brand Name</label>
            <input type="text" name="e_brand_title" class="form-control" id="editBrandTitle" placeholder="Enter Brand Name">
          </div>
          <input type="hidden" name="edit_brand" value="1">
          <button type="button" class="btn btn-primary edit-brand-btn">Update Brand</button>
        </form>
      </div>
    </div>
  </div>
</div>


<?php include_once("./templates/footer.php"); ?>
<?php require 'customAlert.php'; ?>

<?php require 'confirmation.php'; ?>
<script type="text/javascript" src="./js/customalert.js"></script>
<script type="text/javascript" src="./js/sidebar.js"></script>
<script type="text/javascript" src="./js/brands.js"></script>
</body>
</html>
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

    $('#brand_list').on('click', '.edit-brand', function() {
      var brandId = $(this).data('id');
      var brandName = $(this).data('name');

      $('#edit_brand_modal [name="brand_id"]').val(brandId);
      $('#edit_brand_modal [name="e_brand_title"]').val(brandName);

      $('#edit_brand_modal').modal('show');
    });
  });
</script>
