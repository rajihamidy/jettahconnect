<?php 
include 'checks.php';
?>
<?php include_once("./templates/top.php"); ?>
<?php include "indexhead.php"; ?>
<?php //include_once("./templates/navbar.php"); 
?>
<div class="container-fluid">
    <div class="row">

        <?php //include "./templates/sidebar.php"; 
        ?>

        <div class="row">
            <div class="col">
                <h2>List of Registered Admin</h2>
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
                        <th>#</th>
                        <th>User Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile Number</th>
                        <th>Date Created</th>
                    </tr>
                </thead>
                <tbody id="complaints_list">

                </tbody>
            </table>
        </div>
        </main>
    </div>
</div>




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
            $('#complaints_list tr').each(function() {
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