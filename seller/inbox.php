<?php session_start(); if (!isset($_SESSION['admin_id'])) { header("location:login.php"); } ?>
    <script src="../js/bootstrap.min.js"></script>
    <?php include_once("./templates/top.php"); ?>
    <?php include_once("./templates/navbar.php"); ?>
    <style>
        /* Custom CSS to ensure text wrapping */
        .table-wrap {
            table-layout: fixed;
            word-wrap: break-word;
        }
    </style>
    <div class="container-fluid">
        <div class="row">

            <?php include "./templates/sidebar2.php"; ?>

            <div class="row">
                <div class="col">
                    <h2>Inbox Message(s)</h2>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 offset-md-4">
                    <input type="text" class="form-control" id="searchInput" placeholder="Search..." />
                </div>
                <div class="col-md-2 py-3">
                    <button class="btn btn-primary btn-block" id="searchButton">Search</button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-sm  style='width: 70%;'">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>From</th>
                            <th>Title</th>
                            <th>Message</th>
                            <th>Date</th>

                        </tr>
                    </thead>
                    <tbody id="seller_inbox_list">

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>SN</th>
                            <th>From</th>
                            <th>Title</th>
                            <th>Message</th>
                            <th>Date</th>

                        </tr>
                    </tfoot>
                </table>
            </div>
            </main>
        </div>
    </div>

    </body>


    <?php include_once("./templates/footer.php"); ?>



    <script type="text/javascript" src="./js/messages.js"></script>
    <script type="text/javascript" src="./js/update_pay.js"></script>
    <script type="text/javascript" src="./js/sidebar.js"></script>
    <script type="text/javascript" src="./js/delivery_status.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
                $('#seller_inbox_list tr').each(function() {
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