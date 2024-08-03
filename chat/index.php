<?php
include('database_connection.php');

session_start();

if (!isset($_SESSION['uid']) && !isset($_SESSION['admin_id'])) {
    echo "<script>
    customAlert('Kindly Login to Chat with the Seller');
    window.location.href = '../index.php';
    </script>";
    exit();
}
   
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve posted data
    $userid = isset($_POST['userid']) ? $_POST['userid'] : '';
    $buyerid = isset($_POST['buyerid']) ? $_POST['buyerid'] : '';
    // Optionally, you can do something with the posted data here
}

$userid = isset($_GET['userid']) ? $_GET['userid'] : '';
$buyerid = isset($_GET['buyerid']) ? $_GET['buyerid'] : '';
$_SESSION['admin_userid'] = $userid;
$_SESSION['buyerid'] = $buyerid;

// Initialize name variable
$name = '';

if (isset($_SESSION['admin_name'])) {
    $name = $_SESSION['admin_name'];
} elseif (isset($_SESSION['buyer_name'])) {
    $name = $_SESSION['buyer_name'];
}
?>

<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Jettah| Chat Interface</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
</head>

<body>
    <div class="container">
        <br />
        <h3 align="center">Chatting between Sellers and Buyers</h3><br />
        <br />
        <div class="row">
            <div class="col-md-8 col-sm-6">
                <h4>Available User(s)</h4>
            </div>
            <div class="col-md-2 col-sm-3">
                <input type="hidden" id="is_active_group_chat_window" value="no" />
                <!-- <button type="button" name="group_chat" id="group_chat" class="btn btn-warning btn-xs">Group Chat</button> -->
            </div>
            <div class="col-md-2 col-sm-3">
                <p align="right">Hi - <?php echo $name; ?> <!-- - <a href="logout.php">Logout</a> --></p>
            </div>
        </div>
        <div class="table-responsive">
            <div id="user_details"></div>
            <div id="user_model_details"></div>
        </div>
        <br />
        <br />
    </div>
    <div id="customAlert" class="custom-alert">
        <div class="custom-alert-content">
            <span class="close-btn" onclick="closeCustomAlert()">&times;</span>
            <p id="customAlertMessage"></p>
            <button onclick="closeCustomAlert()">OK</button>
        </div>
    </div>
</body>

</html>

<style>
    .chat_message_area {
        position: relative;
        width: 100%;
        height: auto;
        background-color: #FFF;
        border: 1px solid #CCC;
        border-radius: 3px;
    }

    #group_chat_message {
        width: 100%;
        height: auto;
        min-height: 80px;
        overflow: auto;
        padding: 6px 24px 6px 12px;
    }

    .image_upload {
        position: absolute;
        top: 3px;
        right: 3px;
    }

    .image_upload>form>input {
        display: none;
    }

    .image_upload img {
        width: 24px;
        cursor: pointer;
    }

    .custom-alert {
        display: none;
        position: fixed;
        z-index: 9999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .custom-alert-content {
        background-color: white;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 300px;
        text-align: center;
        border-radius: 5px;
        position: relative;
    }

    .close-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        color: #aaa;
        font-size: 20px;
        font-weight: bold;
        cursor: pointer;
    }

    .close-btn:hover,
    .close-btn:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
</style>

<div id="group_chat_dialog" title="Group Chat Window">
    <div id="group_chat_history" style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;"></div>
    <div class="form-group">
        <div class="chat_message_area">
            <div id="group_chat_message" contenteditable class="form-control"></div>
            <div class="image_upload">
                <form id="uploadImage" method="post" action="upload.php">
                    <label for="uploadFile"><img src="upload.png" /></label>
                    <input type="file" name="uploadFile" id="uploadFile" accept=".jpg, .png" />
                </form>
            </div>
        </div>
    </div>
    <div class="form-group" align="right">
        <button type="button" name="send_group_chat" id="send_group_chat" class="btn btn-info">Send</button>
    </div>
</div>

<script>
    $(document).ready(function() {
        function customAlert(message) {
            $("#customAlertMessage").text(message);
            $("#customAlert").css("display", "block");
        }

        function closeCustomAlert() {
            $("#customAlert").css("display", "none");
        }

        // Example usage: Uncomment below to test customAlert on page load
        // customAlert('Test message on page load');

        // Your existing chat code
        fetch_user();

        setInterval(function() {
            update_last_activity();
            fetch_user();
            update_chat_history_data();
            fetch_group_chat_history();
        }, 5000);

        function fetch_user() {
            $.ajax({
                url: "fetch_user.php",
                method: "POST",
                success: function(data) {
                    $('#user_details').html(data);

                    // Check if the user_details div is empty and hide/show the group_chat button accordingly
                    if ($('#user_details').is(':empty')) {
                        $('#group_chat').hide();
                    } else {
                        $('#group_chat').show();
                    }
                }
            })
        }

        function update_last_activity() {
            $.ajax({
                url: "update_last_activity.php",
                success: function() {}
            })
        }

        function make_chat_dialog_box(to_user_id, to_user_name) {
            var modal_content = '<div id="user_dialog_' + to_user_id + '" class="user_dialog" title="You have chat with ' + to_user_name + '">';
            modal_content += '<div style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;" class="chat_history" data-touserid="' + to_user_id + '" id="chat_history_' + to_user_id + '">';
            modal_content += fetch_user_chat_history(to_user_id);
            modal_content += '</div>';
            modal_content += '<div class="form-group">';
            modal_content += '<textarea name="chat_message_' + to_user_id + '" id="chat_message_' + to_user_id + '" class="form-control chat_message"></textarea>';
            modal_content += '</div><div class="form-group" align="right">';
            modal_content += '<button type="button" name="send_chat" id="' + to_user_id + '" class="btn btn-info send_chat">Send</button></div></div>';
            $('#user_model_details').html(modal_content);
        }

        $(document).on('click', '.start_chat', function() {
            var to_user_id = $(this).data('touserid');
            var to_user_name = $(this).data('tousername');
            make_chat_dialog_box(to_user_id, to_user_name);
            $("#user_dialog_" + to_user_id).dialog({
                autoOpen: false,
                width: 400
            });
            $('#user_dialog_' + to_user_id).dialog('open');
            $('#chat_message_' + to_user_id).emojioneArea({
                pickerPosition: "top",
                toneStyle: "bullet"
            });
        });

        $(document).on('click', '.send_chat', function() {
            var to_user_id = $(this).attr('id');
            var chat_message = $('#chat_message_' + to_user_id).val();
            $.ajax({
                url: "insert_chat.php",
                method: "POST",
                data: {
                    to_user_id: to_user_id,
                    chat_message: chat_message
                },
                success: function(data) {
                    $('#chat_message_' + to_user_id).val('');
                    $('#chat_history_' + to_user_id).html(data);
                }
            })
        });

        function fetch_user_chat_history(to_user_id) {
            $.ajax({
                url: "fetch_user_chat_history.php",
                method: "POST",
                data: {
                    to_user_id: to_user_id
                },
                success: function(data) {
                    $('#chat_history_' + to_user_id).html(data);
                }
            })
        }

        function update_chat_history_data() {
            $('.chat_history').each(function() {
                var to_user_id = $(this).data('touserid');
                fetch_user_chat_history(to_user_id);
            });
        }

        $(document).on('click', '.ui-button-icon', function() {
            $('.user_dialog').dialog('destroy').remove();
        });

        $(document).on('focus', '.chat_message', function() {
            var is_type = 'yes';
            $.ajax({
                url: "update_is_type_status.php",
                method: "POST",
                data: {
                    is_type: is_type
                },
                success: function() {}
            })
        });

        $(document).on('blur', '.chat_message', function() {
            var is_type = 'no';
            $.ajax({
                url: "update_is_type_status.php",
                method: "POST",
                data: {
                    is_type: is_type
                },
                success: function() {}
            })
        });

        $('#group_chat_dialog').dialog({
            autoOpen: false,
            width: 400
        });

        $('#group_chat').click(function() {
            $('#group_chat_dialog').dialog('open');
            $('#is_active_group_chat_window').val('yes');
            fetch_group_chat_history();
        });

        $('#send_group_chat').click(function() {
            var chat_message = $('#group_chat_message').html();
            var action = 'insert_data';
            if (chat_message != '') {
                $.ajax({
                    url: "group_chat.php",
                    method: "POST",
                    data: {
                        chat_message: chat_message,
                        action: action
                    },
                    success: function(data) {
                        $('#group_chat_message').html('');
                        $('#group_chat_history').html(data);
                    }
                })
            }
        });

        function fetch_group_chat_history() {
            var group_chat_dialog_active = $('#is_active_group_chat_window').val();
            var action = "fetch_data";
            if (group_chat_dialog_active == 'yes') {
                $.ajax({
                    url: "group_chat.php",
                    method: "POST",
                    data: {
                        action: action
                    },
                    success: function(data) {
                        $('#group_chat_history').html(data);
                    }
                })
            }
        }

        $('#uploadFile').on('change', function() {
            $('#uploadImage').ajaxSubmit({
                target: "#group_chat_message",
                resetForm: true
            });
        });
    });
</script>
