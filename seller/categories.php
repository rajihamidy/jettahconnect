<?php session_start(); ?>
<?php include_once("./templates/top.php"); ?>
<?php include_once("./templates/navbar.php"); ?>
<div class="container-fluid">
  <div class="row">
    <?php include "./templates/sidebar2.php"; ?>

    <div class="col-12">
      <h2>Manage Category</h2>
      <a href="#" data-toggle="modal" data-target="#add_category_modal" class="btn btn-warning btn-sm">Add Category</a>
      
      <div class="row mb-3">
        <div class="col-md-4 offset-md-4 py-3">
          <input type="text" class="form-control" id="searchInput" placeholder="Search..." />
        </div>
        <div class="col-md-2">
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
          <tbody id="category_list">
            <!-- Categories will be dynamically loaded here -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Add Category Modal -->
<div class="modal fade" id="add_category_modal" tabindex="-1" role="dialog" aria-labelledby="addCategoryLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addCategoryLabel">Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="add-category-form">
          <div class="form-group">
            <label for="cat_title">Category Name</label>
            <input type="text" name="cat_title" id="cat_title" class="form-control" placeholder="Enter Category Name" required>
          </div>
          <input type="hidden" name="add_category" value="1">
          <button type="button" class="btn btn-primary add-category">Add Category</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Edit Category Modal -->
<div class="modal fade" id="edit_category_modal" tabindex="-1" role="dialog" aria-labelledby="editCategoryLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editCategoryLabel">Update Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="edit-category-form">
          <input type="hidden" name="cat_id" id="edit_cat_id">
          <div class="form-group">
            <label for="e_cat_title">Category Name</label>
            <input type="text" name="e_cat_title" id="e_cat_title" class="form-control" placeholder="Enter Category Name" required>
          </div>
          <input type="hidden" name="edit_category" value="1">
          <button type="button" class="btn btn-primary edit-category-btn">Update Category</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include_once("./templates/footer.php"); ?>
<?php require 'customAlert.php'; ?>
<?php require 'confirmation.php'; ?>
<script type="text/javascript" src="./js/categories.js"></script>
<script type="text/javascript" src="./js/customalert.js"></script>
<script type="text/javascript" src="./js/sidebar.js"></script>

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
      $('#category_list tr').each(function() {
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