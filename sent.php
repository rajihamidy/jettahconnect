<?php
require "config/constants.php";
session_start();
if (!isset($_SESSION["uid"])) {
    header("location:index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Jettah Connect</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome6.5.2/css/all.css">
    <script src="js/jquery2.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/img.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="main.js"></script>
    <style>
        html,
        body {
            height: 100%;
        }

        .container {
            min-height: 100%;
            display: flex;
            flex-direction: column;
        }

        .content {
            flex: 1;
        }

        .footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            background-color: #f8f9fa;
            padding: 10px 0;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php require 'head.php'; ?>

    <div class="container">
        <div class="row">
        <div class="col-md-2 col-xs-6">
				<div id="main">
					
				</div>
				<div id="get_category" style="display:none"></div>
				<div id="get_brand" style="display:none"></div>
			</div>
            <div class="col-md-12 col-xs-12">
                <h2>Sent Message(s)</h2>
            </div>


            <div class="col-md-4 offset-md-4 py-3">
                <input type="text" class="form-control" id="searchInput" placeholder="Search...">
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
                   
                    <th>Title</th>
                    <th>Message</th>
                    <th>Date</th>

                </tr>
            </thead>
            <tbody id="buyer_Outbox_list">

            </tbody>
            <tfoot>
                <tr>
                    <th>SN</th>
                   
                    <th>Title</th>
                    <th>Message</th>
                    <th>Date</th>

                </tr>
            </tfoot>
        </table>
    </div>
    
    </div>
    
    
    <br>
    <div class="col-md-12 col-xs-12 ">
        <div class="panel panel-info">
            <div class="panel-footer">&copy; <?php echo date("Y"); ?> | Developed By <a href="https://ypdatahub.com.ng">Young Programa</a></div>
        </div>
    </div>
    <script type="text/javascript" src="./js/sidebar.js"></script>
    <script type="text/javascript" src="js/messages.js"></script>
    <script>
        $(document).ready(function() {
            function filterTable(searchTerm) {
                $('#buyer_Outbox_list tr').each(function() {
                    var rowText = $(this).text().toLowerCase();
                    $(this).toggle(rowText.indexOf(searchTerm) !== -1);
                });
            }

            $('#searchInput').on('keyup', function() {
                var searchTerm = $(this).val().toLowerCase();
                filterTable(searchTerm);
            });

            $('#searchButton').on('click', function() {
                var searchTerm = $('#searchInput').val().toLowerCase();
                filterTable(searchTerm);
            });
        });
    </script>
</body>

</html>