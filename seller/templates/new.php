<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Jettah Connect</a>
    <button class="navbar-toggler d-md-none" type="button" data-toggle="collapse" data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100 d-none d-md-block" type="hidden" placeholder="Search" aria-label="Search">
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="../seller/admin-logout.php">Sign out</a>
        </li>
    </ul>
</nav>
<div class="container-fluid">
    <div class="row">
        <nav id="sidebar" class="col-md-2 d-md-block bg-light sidebar collapse">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">
                            <span data-feather="home"></span>
                            Dashboard <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="customer_orders.php">
                            <span data-feather="clipboard"></span>
                            Orders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="products.php">
                            <span data-feather="shopping-cart"></span>
                            Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="brands.php">
                            <span data-feather="box"></span>
                            Brands
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="categories.php">
                            <span data-feather="layers"></span>
                            Categories
                        </a>
                    </li>
                    <!--  <li class="nav-item">
              <a class="nav-link " href="customers.php">
                <span data-feather="users"></span>
                Customers
              </a>
            </li> -->
                </ul>
            </div>
        </nav>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2 ">Hello, Raji Ammaar of Raji Shop </h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                </div>
            </div>
            Registration date: 2024-01-10<br>Number of days remaining: 279<br>
            <button type='button' class='btn btn-danger' adminid='16' onclick=alert(16) style='float:right;' id='activate'>Activate Account</button>
            <br /> <br>
            <div class='col-lg-12'>
                <div class='row'>
                    <div class='col-xl-6 col-md-6'>
                        <div class='card info-card sales-card'>
                            <div class='card-body'>
                                <p class='card-title'>Available <span>| Balance</span>
                                    <span style='float: right;'>
                                        <a href=''><span class='badge badge-success' style='color:#fff;'>Withdraw Funds</span></a>
                                    </span>
                                </p>
                                <div class='d-flex align-items-center'>
                                    <div class='card-icon rounded-circle d-flex align-items-center justify-content-center'>
                                        <i class='fas fa-wallet'></i>
                                    </div>
                                    <div class='ps-3'>
                                        <h6>₦ 0.00</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Sales Card -->
                </div>
            </div>
        </main>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs