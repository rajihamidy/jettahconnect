
	<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">	
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
                <span class="sr-only"> navigation toggle</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand">Jettah Connect</a>
        </div>
    <div class="collapse navbar-collapse" id="collapse">
        <ul class="nav navbar-nav">
            <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
            <li><a href="index.php"><span class="glyphicon glyphicon-modal-window"></span> Product</a></li>
            <li style="width:300px;left:10px;top:10px;"><input type="text" class="form-control" id="search"></li>
            <li style="top:10px;left:20px;"><button class="btn btn-primary" id="search_btn">Search</button></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#" id="cart_container" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span> Cart <span class="badge">0</span></a>
                <div class="dropdown-menu" style="width:400px;">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-3 col-xs-3">SN</div>
                                <div class="col-md-3 col-xs-3">Product Image</div>
                                <div class="col-md-3 col-xs-3">Product Name</div>
                                <div class="col-md-3 col-xs-3">Price in <?php echo CURRENCY; ?></div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div id="cart_product">
                        
                            </div>
                        </div>
                        <div class="panel-footer"></div>
                    </div>
                    
                </div>
            </li>
            <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> <?php echo "Hi, ".$_SESSION["name"]; ?></a>
                <ul class="dropdown-menu">
                    <li><a href="cart.php" style="text-decoration:none; color:black;"><span class="glyphicon glyphicon-shopping-cart"> Cart</a></li>
                    <li class="divider"></li>
                    <li><a href="customer_order.php" style="text-decoration:none; color:black;">Orders</a></li>
                    <li class="divider"></li>
                    
                    <li><a href="logout.php" style="text-decoration:none; color:black;">Logout</a></li>
                </ul>
            </li>
            
        </ul>
    </div>
</div>
</div>

