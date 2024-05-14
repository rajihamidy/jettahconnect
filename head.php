<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class=" row">
            <div class="col-md-8 ">

                <a href="index.php" class="navbar-brand">Jettah Connect</a>
            </div>
            <div class="col-md-2 ">
                <a href="cart.php" class="navbar-brand"><span class="glyphicon glyphicon-shopping-cart"></span> Cart <span class="badge">0</span></a>
            </div>
            <div class="col-md-2">

                <a href="logout.php" class="navbar-brand"><span class="glyphicon glyphicon-log-out "></span>Logout </a>


            </div>
        </div>





    </div>

</div>
<div style="margin-top: 55px;">

</div>

<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="navbar navbar-grey">

        <div class="dropdown row px-4">
            <div class="col-md-2  ">
                <button type="button" class="btn btn-secondary btn-block btn-lg dropdown-toggle " data-toggle="dropdown">
                    <?php echo "Hi, " . $_SESSION["name"]; ?>
                </button>
                <ul class="nav navbar-nav ">
                    <li class="divider"></li>
                </ul>
            </div>

            <div class="col-md-2 "> <!-- Adjust the column width based on your layout -->
                <button type="button" class="btn btn-primary btn-block btn-lg dropdown-toggle " data-toggle="dropdown">
                    ☰ Menu
                </button>
                <div class="dropdown-menu">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                        <li><a href="index.php"><span class="glyphicon glyphicon-modal-window"></span> Product</a></li>
                        <li><a href="customer_order.php"><span class="glyphicon glyphicon-shopping-cart"></span>Orders</a></li>
                        <li><a href="customer_complaints.php"><span class="glyphicon glyphicon-exclamation-sign"></span>Submit Complaints</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3"> <!-- Adjust the column width based on your layout -->
                <form class="navbar-form navbar-left">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search Product" id="search">
                    </div>
                    <button type="submit" class="btn btn-primary" id="search_btn"><span class="glyphicon glyphicon-search"></span></button>
                </form>
            </div>
            <div class="col-md-2"> <!-- Adjust the column width based on your layout -->

                <button type="button" onclick="openNav()" class="btn btn-primary btn-block btn-lg dropdown-toggle" data-toggle="dropdown">
                    <span class="glyphicon glyphicon-shopping-cart"></span>Products & Brands
                </button>

                <div class="dropdown-menu ">
                    <div id="get_category" style="display:none"></div>
                    <div id="get_brand" style="display:none"></div>
                </div>

            </div>
            <ul class="nav navbar-nav ">
                    <li class="divider"></li>
                </ul>
            <div class="col-md-3">
               
                    <button type="button" class="btn btn-primary btn-block  btn-lg dropdown-toggle" data-toggle="dropdown"><span class="fas fa-store "></span> Shops</button>

                    <div class="dropdown-menu">

                        <div class="panel-body">
                            <div id="avail_seller" class="">

                            </div>
                        </div>

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
</style>