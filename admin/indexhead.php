<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/dashboard/">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="./css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="indexhead.css">
   
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Jettah Connect</a>
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Menu Options
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item <?php echo ($page == '' || $page == 'index.php') ? 'active' : ''; ?>" href="index.php">
                <span data-feather="home"></span>
                All Sellers <span class="sr-only">(current)</span>
            </a>
            <a class="dropdown-item <?php echo ($page == 'customer_orders.php') ? 'active' : ''; ?>" href="customer_orders.php">
                <span data-feather="clipboard"></span>
                Orders
            </a>
            <a class="dropdown-item <?php echo ($page == 'products.php') ? 'active' : ''; ?>" href="products.php">
                <span data-feather="shopping-cart"></span>
                Products
            </a>
            <a class="dropdown-item <?php echo ($page == 'brands.php') ? 'active' : ''; ?>" href="brands.php">
                <span data-feather="box"></span>
                Brands
            </a>
            <a class="dropdown-item <?php echo ($page == 'categories.php') ? 'active' : ''; ?>" href="categories.php">
                <span data-feather="layers"></span>
                Categories
            </a>
            <a class="dropdown-item <?php echo ($page == 'customers.php') ? 'active' : ''; ?>" href="customers.php">
                <span data-feather="users"></span>
                Customers
            </a>
            <hr>
            <a class="dropdown-item <?php echo ($page == 'customers_complaints.php') ? 'active' : ''; ?>" href="customers_complaints.php">
                <span data-feather="alert-circle"></span>
                Customer's Complaints
            </a>
            <a class="dropdown-item <?php echo ($page == 'seller_complaints.php') ? 'active' : ''; ?>" href="seller_complaints.php">
                <span data-feather="alert-circle"></span>
                Seller's Complaints
            </a>
            <hr>
            <a class="dropdown-item <?php echo ($page == 'register.php') ? 'active' : ''; ?>" href="register.php">
                <span data-feather="users"></span>
                Add Admin
            </a>
            <a class="dropdown-item <?php echo ($page == 'adminlist.php') ? 'active' : ''; ?>" href="adminlist.php">
                <span data-feather="clipboard"></span>
                View Admin Accounts
            </a>
        </div>
    </div>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <?php
                if (isset($_SESSION['masteradmin_id'])) {
            ?>
                <a class="nav-link" href="../admin/admin-logout.php">Sign out</a>
            <?php
                } else {
                    $uriAr = explode("/", $_SERVER['REQUEST_URI']);
                    $page = end($uriAr);
                    if ($page === "login.php") {
            ?>
                        <!--  <a class="nav-link" href="../admin/register.php">Register</a> -->
            <?php
                    } else {
            ?>
                        <a class="nav-link" href="../admin/login.php">Login</a>
            <?php
                    }
                }
            ?>
        </li>
    </ul>
</nav>
<main role="main" class=""> <!-- col-md-9 ml-sm-auto col-lg-10 px-4 -->
      <div class=""> <!-- d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom -->
        <h1 class="h2 ">Hello, <?php echo ucwords($_SESSION["masteradmin_name"]); ?></h1>
        <hr>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
      </div>

<script>
    $(document).ready(function() {
        feather.replace();
    });
</script>

