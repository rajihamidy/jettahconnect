<?php //session_start(); 
include 'checks.php';
$masteradmin_email = isset($_SESSION['masteradmin_email']) ? $_SESSION['masteradmin_email'] : '';

?>
<?php include_once("./templates/top.php"); ?>
<?php include "indexhead.php";
date_default_timezone_set('Africa/Lagos');
$dateTime = date('d-m-Y H:i');
?>
<?php //include_once("./templates/navbar.php"); 
?>
<div class="container-fluid">
  <div class="row">

    <?php //include "./templates/sidebar.php"; 
    ?>

    <div class="row">
      <div class="col">
        <h2>Customer Complaints</h2>
      </div>
    </div>

    <div class="table-responsive">
      <div class="row mb-3">
        <div class="col-md-3 offset-md-7">
          <input type="text" class="form-control" id="searchInput" placeholder="Search..." />
        </div>
        <div class="col-md-2">
          <button class="btn btn-primary btn-block" id="searchButton">Search</button>
        </div>
      </div>
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>SN</th>
            <th>Customer Id</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Complaints</th>
            <th>Uploaded file</th>
            <th>Submission Date</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="Ccomplaints_list">
          <!-- <tr>
              <td>1</td>
              <td>ABC</td>
              <td>FDGR.JPG</td>
              <td>122</td>
              <td>eLECTRONCS</td>
              <td>aPPLE</td>
              <td><a class="btn btn-sm btn-info"></a><a class="btn btn-sm btn-danger">Delete</a></td>
            </tr> -->
        </tbody>
      </table>
    </div>
    </main>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="add_product_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="add-product-form" enctype="multipart/form-data">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label>Product Name</label>
                <input type="text" name="product_name" class="form-control" placeholder="Enter Product Name">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Brand Name</label>
                <select class="form-control brand_list" name="brand_id">
                  <option value="">Select Brand</option>
                </select>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Category Name</label>
                <select class="form-control category_list" name="category_id">
                  <option value="">Select Category</option>
                </select>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Product Description</label>
                <textarea class="form-control" name="product_desc" placeholder="Enter product desc"></textarea>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Product Price</label>
                <input type="number" name="product_price" class="form-control" placeholder="Enter Product Price">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Product Keywords <small>(eg: apple, iphone, mobile)</small></label>
                <input type="text" name="product_keywords" class="form-control" placeholder="Enter Product Keywords">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Product Image <small>(format: jpg, jpeg, png)</small></label>
                <input type="file" name="product_image" class="form-control">
              </div>
            </div>
            <input type="hidden" name="add_product" value="1">
            <div class="col-12">
              <button type="button" class="btn btn-primary add-product">Add Product</button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<!-- Button trigger modal -->
<!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Reply Email
</button>
-->

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <textarea class="form-control" id="replyTextArea" rows="5" cols="50" required></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="sendReplyButton">Send Reply</button>
      </div>
    </div>
  </div>
</div>
<input type="hidden" id="replierEmail" value="<?php echo $masteradmin_email; ?>">

<p></p>
<?php include 'footer.php' ?>

<?php include_once("./templates/footer.php"); ?>



<script type="text/javascript" src="./js/customers.js"></script>
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
      $('#Ccomplaints_list tr').each(function() {
        var rowText = $(this).text().toLowerCase();
        if (rowText.indexOf(searchTerm) === -1) {
          $(this).hide();
        } else {
          $(this).show();
        }
      });
    }


    $('#sendReplyButton').click(function() {
      var replierEmail = $("#replierEmail").val();
      var reply = $("#replyTextArea").val();
      var complaintID = $(".modal-body").find("p:contains('Complaint ID')").text().split(": ")[1];
      var reply_date = new Date().toISOString().slice(0, 19).replace('T', ' ');

      var dataToSend = {
        check: 'reply_to_customer',
        complaint_id: complaintID,
        replierEmail: replierEmail,
        reply: reply,
        reply_date: reply_date
      };

      // Send data using AJAX
      $.ajax({
        type: 'POST',
        url: 'save_reply.php', // Update this URL to your server endpoint
        data: JSON.stringify(dataToSend),
        contentType: 'application/json',
        success: function(response) {
          alert(response);
          $('[data-dismiss="modal"]').trigger('click');
        },
        error: function(error) {
          console.log('Error saving data:', error);
        }
      });
    });
  });
</script>