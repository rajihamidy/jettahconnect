<div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <a href="index.php" class="navbar-brand">Jettah Connect</a>
                </div>
                <div>
                    <a href="cart.php" class="navbar-brand">
                        <span class="glyphicon glyphicon-shopping-cart"></span> Cart <span class="badge">0</span>
                    </a>
                    
                </div>
                <div>
                     <a href="logout.php" class="navbar-brand">
                        <span class="glyphicon glyphicon-log-out"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div style="margin-top: 60px;"></div>

    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="navbar navbar-grey">
            <div class="dropdown row px-4">
                <div class="col-md-2">
                    <button type="button" class="btn btn-secondary btn-block btn-lg dropdown-toggle" data-toggle="dropdown">
                        <?php echo "Hi, " . $_SESSION["name"]; ?>
                    </button>
                    <ul class="nav navbar-nav">
                        <li class="divider"></li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-primary btn-block btn-lg dropdown-toggle" data-toggle="dropdown">
                        ☰ Menu
                    </button>
                    <div class="dropdown-menu">
                        <ul class="nav navbar-nav">
                            <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                            <li><a href="index.php"><span class="glyphicon glyphicon-modal-window"></span> Product</a></li>
                            <li><a href="customer_order.php"><span class="glyphicon glyphicon-shopping-cart"></span> Orders</a></li>
                            <hr>
                            <li><a href="inbox.php"><span class="glyphicon glyphicon-inbox"></span> Inbox</a></li>
                            <li><a href="sent.php"><span class="glyphicon glyphicon-send"></span> Sent</a></li>
                            <li><a href="chat/index.php?start_chat=true"><span class="glyphicon glyphicon-comment"></span> Chat</a></li>
                            <li><a href="customer_complaints.php"><span class="glyphicon glyphicon-exclamation-sign"></span> Submit Complaints</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <form class="navbar-form " >
                        <div class="form-group" >
                            <input type="text" class="form-control" placeholder="Search Product" id="search">
                        </div>
                   <!--     <button type="submit" class="btn btn-primary" id="search_btn" style="width: 20%;">
                            <span class="glyphicon glyphicon-search"></span>
                        </button> -->

                    </form>
                </div>
                <div class="col-md-2">
                    <button type="button" onclick="openNav()" class="btn btn-primary btn-block btn-lg dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-shopping-cart"></span> Products & Brands
                    </button>
                    <div class="dropdown-menu">
                        <div id="get_category" style="display:none"></div>
                        <div id="get_brand" style="display:none"></div>
                    </div>
                </div>
                <br>
                <div class="col-md-3">
                    <button type="button" class="btn btn-primary btn-block btn-lg dropdown-toggle" data-toggle="dropdown">
                        <span class="fas fa-store"></span> Shops
                    </button>
                    <div class="dropdown-menu">
                        <div class="panel-body">
                            <div id="avail_seller"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
<style>
        .navbar-grey {
            background-color: grey;
        }
        /* Ensure input fields are not blocked by other elements */
        input {
            z-index: 1;
            position: relative;
            font-size: 16px; /* Set the font size to prevent zoom on mobile devices */
        }
        /* Custom styles for better responsiveness */
        .navbar-brand {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .search-container {
            display: flex;
            align-items: center;
        }
        @media (max-width: 767px) {
            .search-container {
                flex-direction: column;
            }
            
        }
    </style>
<script>
    document.addEventListener("DOMContentLoaded", (event) => {
        document.addEventListener("contextmenu", (event) => {
            event.preventDefault();
        });
    });
</script>