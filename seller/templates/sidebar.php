<nav class="col-md-2 d-none d-md-block bg-light sidebar">
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
    </nav>


    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 ">Hello, <?php echo ucwords($_SESSION["admin_name"]); ?> of <?php echo ucwords($_SESSION["shopname"]); ?> </h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>


      </div>
      <?php
// Set the timezone to your preferred timezone
date_default_timezone_set("Africa/Lagos");
include "classes/Database.php";

// Get today's date
$today = new DateTime();

// Example registration date (replace this with your actual registration date)
$Regdate = new DateTime($_SESSION['regdate']);
$expdate = new DateTime($_SESSION['expdate']);

// Calculate the difference in days
$interval = $today->diff($expdate);
$daysRemaining = $interval->format('%r%a');

// Display the result
//echo "Today's date: " . $today->format('Y-m-d') . "<br>";
echo "Registration date: " . $Regdate->format('Y-m-d') . "<br>";
echo "Number of days remaining: " . $daysRemaining. "<br>";
if($_SESSION['acctstatus']=="Not Activated"){
  $adminid = $_SESSION['admin_id'];
  echo "
  <button type='button' class='btn btn-danger' adminid='$adminid'  onclick=alert($adminid) style='float:right;'  id='activate'>Activate Account</button>
  ";
}
?>