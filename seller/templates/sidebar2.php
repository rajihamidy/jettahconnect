<div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>


  
    <div class="sidebar-sticky">
      <ul class="nav flex-column">

        <?php


        $uri = $_SERVER['REQUEST_URI'];
        $uriAr = explode("/", $uri);
        $page = end($uriAr);

        ?>

        <li class="nav-item">
          <a class="nav-link <?php echo ($page == '' || $page == 'index.php') ? 'active' : ''; ?>" href="index.php">
            <span data-feather="home"></span>
            Dashboard <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo ($page == 'customer_orders.php') ? 'active' : ''; ?>" href="customer_orders.php">
            <span data-feather="clipboard"></span>
            Orders
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo ($page == 'products.php') ? 'active' : ''; ?>" href="products.php">
            <span data-feather="shopping-cart"></span>
            Products
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo ($page == 'brands.php') ? 'active' : ''; ?>" href="brands.php">
            <span data-feather="box"></span>
            Brands
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo ($page == 'categories.php') ? 'active' : ''; ?>" href="categories.php">
            <span data-feather="layers"></span>
            Categories
          </a>
        </li>
        <!--  <li class="nav-item">
            <a class="nav-link <?php echo ($page == 'customers.php') ? 'active' : ''; ?>" href="customers.php">
              <span data-feather="users"></span>
              Customers
            </a>
          </li> -->
      </ul>


    </div>
  
</div>

<main role="main" class="col-md-9 ml-sm-auto col-lg-12 px-4">