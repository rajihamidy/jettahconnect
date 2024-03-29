<?php
session_start();
include 'uniqueref.php';
$ip_add = getenv("REMOTE_ADDR");
include "db.php";
if (isset($_POST["category"]) || isset($_POST["brand"])) {
	
	echo '
    <div id="mySidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <div class="nav nav-pills nav-stacked">
    ';

    if (isset($_POST["category"])) {
        $category_query = "SELECT * FROM categories";
        $category_result = mysqli_query($con, $category_query) or die(mysqli_error($con));

        echo '<li class=" list-group-item-action active">
		<a href=""><h4>Product Categories</h4></a>
	</li>
	';
        if (mysqli_num_rows($category_result) > 0) {
            while ($row = mysqli_fetch_array($category_result)) {
                $cid = $row["cat_id"];
                $cat_name = $row["cat_title"];
                echo "<li><a href='#' class='category text-wrap' cid='$cid'>$cat_name</a></li>";
            }
        }
    }

    if (isset($_POST["brand"])) {
        $brand_query = "SELECT * FROM brands";
        $brand_result = mysqli_query($con, $brand_query) or die(mysqli_error($con));

        echo '<li class="active"><a href="#"><h4>Brands</h4></a></li>';
        if (mysqli_num_rows($brand_result) > 0) {
            while ($row = mysqli_fetch_array($brand_result)) {
                $bid = $row["brand_id"];
                $brand_name = $row["brand_title"];
                echo "<li><a href='#' class='selectBrand text-wrap' bid='$bid'>$brand_name</a></li>";
            }
        }
   }

    echo '
        </div>
    </div>';
}



if (isset($_POST["page"])) {
	$sql = "SELECT * FROM products";
	$run_query = mysqli_query($con, $sql);
	$count = mysqli_num_rows($run_query);
	$pageno = ceil($count / 9);
	for ($i = 1; $i <= $pageno; $i++) {
		echo "
			<li><a href='#' page='$i' id='page'>$i</a></li>
		";
	}
}
if (isset($_POST["getProduct"])) {
	$limit = 9;
	if (isset($_POST["setPage"])) {
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	} else {
		$start = 0;
	}
	$product_query = "SELECT * FROM products "; //LIMIT $start,$limit
	$run_query = mysqli_query($con, $product_query);
	if (mysqli_num_rows($run_query) > 0) {
		while ($row = mysqli_fetch_array($run_query)) {
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			$pro_brand = $row['product_brand'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$sellerid = $row['user_id'];
			$pro_image = $row['product_image'];
			echo '
			
					<div class="col-sm-6 col-md-4 col-lg-3 column">
						<div class="panel panel-info">
							<div class="panel-heading text-nowrap">' . $pro_title . '</div>
							<div class="panel-body">
								<div class="img-container">
									<img src="product_images/' . $pro_image . '" class="img-fluid" alt="' . $pro_title . '" style="object-fit: cover; display: block;">
								</div>
							</div>
							<div class="panel-footer" style="text-align: center;">' . CURRENCY . ' ' . $pro_price . '.00</div>
							<div class="panel-footer">
								<button pid="' . $pro_id . '" style="float:left;" id="product" class="btn btn-danger btn-xs">Add To Cart</button>
								<button userid="' . $sellerid . '" style="float:right;" id="contacts" class="btn btn-danger btn-xs">Contact</button>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
				
			';
			

		}
	}
}
if (isset($_POST["get_seleted_Category"]) || isset($_POST["selectBrand"]) || isset($_POST["search"])) {
	if (isset($_POST["get_seleted_Category"])) {
		$id = $_POST["cat_id"];
		$sql = "SELECT * FROM products WHERE product_cat = '$id'";
	} else if (isset($_POST["selectBrand"])) {
		$id = $_POST["brand_id"];
		$sql = "SELECT * FROM products WHERE product_brand = '$id'";
	} else {
		$keyword = $_POST["keyword"];
		$sql = "SELECT * FROM products WHERE product_keywords LIKE '%$keyword%'";
	}

	$run_query = mysqli_query($con, $sql);
	while ($row = mysqli_fetch_array($run_query)) {
		$pro_id    = $row['product_id'];
		$pro_cat   = $row['product_cat'];
		$pro_brand = $row['product_brand'];
		$userid = $row['user_id'];
		$pro_title = $row['product_title'];
		$pro_price = $row['product_price'];
		$pro_image = $row['product_image'];
		echo "
				<div class='col-md-4'>
							<div class='panel panel-info'>
								<div class='panel-heading'>$pro_title</div>
								<div class='panel-body'>
									<img src='product_images/$pro_image' style='width:220px; height:250px;'/>
								</div>
								<div class='panel-heading'>N $pro_price.00
								<input type='hidden' value='$userid'>
								
								<button userid='$userid' style='float:right;'  id='contacts' class='btn btn-danger btn-xs'>Contact</button>
								
								<button pid='$pro_id' style='float:right;' id='product' class='btn btn-danger btn-xs'>Add To Cart</button> 
								</div>
								</div>
							</div>
						</div>	
			";
	}
}


if (isset($_POST["contats"])) {


	$userid = $_POST["userId"];


	//if (isset($_SESSION["uid"])) {

	//	$user_id = $_SESSION["uid"];

	$sql = "SELECT * FROM admin WHERE id = '$userid'";
	$run_query = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($run_query);

	$count = mysqli_num_rows($run_query);
	if ($count > 0) {
		$name = $row['name'];
		$shopname = $row['shopname'];
		$email = $row['email'];
		$mobile = $row['mobile'];
		$address = $row['shopaddress'];
		echo "
			
				<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b class=''>Seller's Contact </b><br>
						<hr>
						<b>Name: $name</b><br>
						<b>Shop Name: $shopname</b><br>
						<b>Email: $email</b><br>
						<b>Mobile: $mobile</b><br>
						<b>Contact Address: $address</b>
				</div>
				";
	} else {
	}
}
//}


if (isset($_POST["addToCart"])) {


	$p_id = $_POST["proId"];
	//$seller_id = $_POST["sellerId"];

	//i need to get user id from product table
	if (isset($_SESSION["uid"])) {

		$user_id = $_SESSION["uid"];

		$sql = "SELECT * FROM cart WHERE p_id = '$p_id' AND user_id = '$user_id' and order_status!='Ordered'";
		$sql2 = "SELECT * FROM products WHERE product_id = '$p_id' ";
		$run_query = mysqli_query($con, $sql);
		$run_query2 = mysqli_query($con, $sql2);
		$row = mysqli_fetch_assoc($run_query2);
		$sellerid = $row['user_id']; // from product table
		$count = mysqli_num_rows($run_query);
		if ($count > 0) {
			echo "
				<div class='alert alert-warning'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is already added into the cart Continue Shopping..!</b>
				</div>
			"; //not in video
		} else {
			$sql = "INSERT INTO `cart`
			(`p_id`, `ip_add`, `user_id`, `seller_id`, `qty`) 
			VALUES ('$p_id','$ip_add','$user_id','$sellerid','1')";
			if (mysqli_query($con, $sql)) {
				echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is Added..!</b>
					</div>
				";
			}
		}
	} else {
		$sql = "SELECT id FROM cart WHERE ip_add = '$ip_add' AND p_id = '$p_id' AND user_id = -1 and order_status!='Ordered'";
		$query = mysqli_query($con, $sql);
		if (mysqli_num_rows($query) > 0) {
			echo "
					<div class='alert alert-warning'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<b>Product is already added into the cart Continue Shopping..!</b>
					</div>";
			exit();
		}
		$sql = "INSERT INTO `cart`
			(`p_id`, `ip_add`, `user_id`, `qty`) 
			VALUES ('$p_id','$ip_add','-1','1')";
		if (mysqli_query($con, $sql)) {
			echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Your product has been added to cart!</b>
					</div>
				";
			exit();
		}
	}
}

//Count User cart item
if (isset($_POST["count_item"])) {
	//When user is logged in then we will count number of item in cart by using user session id
	if (isset($_SESSION["uid"])) {
		$sql = "SELECT COUNT(*) AS count_item FROM cart WHERE user_id = $_SESSION[uid] and order_status!='Ordered'";
	} else {
		//When user is not logged in then we will count number of item in cart by using users unique ip address
		$sql = "SELECT COUNT(*) AS count_item FROM cart WHERE ip_add = '$ip_add' AND user_id < 0 and order_status!='Ordered'";
	}

	$query = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($query);
	echo $row["count_item"];
	exit();
}
//Count User cart item

//Get Cart Item From Database to Dropdown menu
//Get Cart Item From Database to Dropdown menu
if (isset($_POST["Common"])) {

	if (isset($_SESSION["uid"])) {
		//When user is logged in this query will execute
		$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty, b.seller_id FROM products a,cart b WHERE a.product_id=b.p_id AND b.user_id='$_SESSION[uid]'AND b.order_status!='Ordered'";
	} else {
		//When user is not logged in this query will execute
		$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty, b.seller_id FROM products a,cart b WHERE a.product_id=b.p_id AND b.ip_add='$ip_add' AND b.user_id < 0 AND b.order_status!='Ordered'";
	}
	$query = mysqli_query($con, $sql);
	if (isset($_POST["getCartItem"])) {
		//display cart item in dropdown menu
		if (mysqli_num_rows($query) > 0) {
			$n = 0;
			while ($row = mysqli_fetch_array($query)) {
				$n++;
				$product_id = $row["product_id"];
				$product_title = $row["product_title"];
				$product_price = $row["product_price"];
				$product_image = $row["product_image"];
				$cart_item_id = $row["id"];
				$qty = $row["qty"];
				echo '
					<div class="row">
						<div class="col-md-3">' . $n . '</div>
						<div class="col-md-3"><img class="img-responsive" src="product_images/' . $product_image . '" /></div>
						<div class="col-md-3">' . $product_title . '</div>
						<div class="col-md-3">' . CURRENCY . '' . $product_price . '</div>
					</div>';
			}
?>
			<a style="float:right;" href="cart.php" class="btn btn-warning">Edit&nbsp;&nbsp;<span class="glyphicon glyphicon-edit"></span></a>
<?php
			exit();
		}
	}
	if (isset($_POST["checkOutDetails"])) {
		if (mysqli_num_rows($query) > 0) {
			//display user cart item with "Ready to checkout" button if user is not login
			echo "<form method='post' action='login_form.php'>";
			$n = 0;
			while ($row = mysqli_fetch_array($query)) {
				$n++;
				if (isset($_SESSION['uid'])) {
					$user_id = $_SESSION["uid"]; //user id of the customer
				} else {
					$user_id = '';
				}
				$buyer_Email = $_SESSION["buyer_email"];
				$buyer_name = $_SESSION["buyer_name"];
				$buyer_mobile = $_SESSION["buyer_mobile"];
				$product_id = $row["product_id"];
				$product_title = $row["product_title"];
				$product_price = $row["product_price"];
				$product_image = $row["product_image"];
				$cart_item_id = $row["id"];
				$qty = $row["qty"];
				$sellerid = $row["seller_id"]; // seller_id from cart
				$qr_seller_email = "select * from admin where id='$sellerid'";
				$query_SellerEmail = mysqli_query($con, $qr_seller_email);
				if (mysqli_num_rows($query_SellerEmail) > 0) {
					//while ($row = mysqli_fetch_array($query)) {
					//}
					$row = mysqli_fetch_array($query_SellerEmail);
					$Seller_email = $row["email"];
				}
				// Generate a unique reference number
				$trx_id = generateUniqueReference();
				$p_status = "Not Completed";

				echo
				'<div class="row" id="rollings">

								<div class="col-md-2">
								
									<div class="btn-group">
										<a href="#" remove_id="' . $product_id . '" class="btn btn-danger remove"><span class="glyphicon glyphicon-trash"></span></a>
										<a href="#" update_id="' . $product_id . '" class="btn btn-primary update"><span class="glyphicon glyphicon-ok-sign"></span></a>
									</div>
								</div>
						
								<input type="hidden" name="user_id[]" id="user_id" value="' . $user_id . '"/>
								<input type="hidden" name="product_id[]" id="product_id" value="' . $product_id . '"/>
								<input type="hidden" name="" value="' . $cart_item_id . '"/>
								<div class="col-md-2"><img class="img-responsive" src="product_images/' . $product_image . '"></div>
								<div class="col-md-2">' . $product_title . '</div>
								<div class="col-md-2"><input type="text" class="form-control qty" name="qty[]" id="qty" value="' . $qty . '" ></div>
								<input type="hidden" name="trx_id[]" id="trx_id" value="' . $trx_id . '"/>
								<input type="hidden" name="p_status[]" id="p_status" value="' . $p_status . '"/>
								<input type="hidden" name="seller_id[]" id="seller_id" value="' . $sellerid . '"/>
								<input type="hidden" name="seller_Email[]" id="seller_Email" value="' . $Seller_email . '"/>
								<div class="col-md-2"><input type="text" class="form-control price" value="' . $product_price . '" readonly="readonly"></div>
								<div class="col-md-2"><input type="text" class="form-control total" value="' . $product_price . '" readonly="readonly"></div>
								
							</div>';
			}

			echo '<div class="row">
							<div class="col-md-8"></div>
							<div class="col-md-4">
							<input type="hidden" class="form-control" id="buyer_email" value="' . $buyer_Email . '" readonly="readonly">
							<input type="hidden" class="form-control" id="buyer_name" value="' . $buyer_name . '" readonly="readonly">
							<input type="hidden" class="form-control" id="buyer_mobile" value="' . $buyer_mobile . '" readonly="readonly">
							
							<input type="hidden" id="net_totals" readonly>
								<b class="net_total" style="font-size:20px;"> </b>
					</div>';

			if (!isset($_SESSION["uid"])) {
				echo '<input type="submit" style="float:right;" name="login_user_with_product" class="btn btn-info btn-lg" value="Ready to Checkout" >
							</form>';
			} else if (isset($_SESSION["uid"])) {
				//Paypal checkout form
				echo '
						</form>
						';

				$x = 0;
				$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.user_id='$_SESSION[uid]'";
				$query = mysqli_query($con, $sql);
				while ($row = mysqli_fetch_array($query)) {
					$x++;
					echo
					'<input type="hidden" name="item_name_' . $x . '" value="' . $row["product_title"] . '">
								  	 <input type="hidden" name="item_number_' . $x . '" value="' . $x . '">
								     <input type="hidden" name="amount_' . $x . '" value="' . $row["product_price"] . '">
								     <input type="hidden" name="quantity_' . $x . '" value="' . $row["qty"] . '">';
				}

				echo
				'
<input style="float:right;margin-right:80px;" type="button" id="payonline2"  class=" btn btn-primary btn-lg" name="submit"  value="Make Payment online"> 
<input style="float:right;margin-right:80px;" type="button" id="delivarypay" class=" btn btn-primary btn-lg" name="submit2" value="Payment at Delivery"> 
								</form>';
				//echo   
				'
										
								</form>';
			}
		}
	}
}

//Remove Item From cart
if (isset($_POST["removeItemFromCart"])) {
	$remove_id = $_POST["rid"];
	if (isset($_SESSION["uid"])) {
		$sql = "DELETE FROM cart WHERE p_id = '$remove_id' AND user_id = '$_SESSION[uid]'";
	} else {
		$sql = "DELETE FROM cart WHERE p_id = '$remove_id' AND ip_add = '$ip_add'";
	}
	if (mysqli_query($con, $sql)) {
		echo "<div class='alert alert-danger'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is removed from cart</b>
				</div>";
		exit();
	}
}


//Update Item From cart
if (isset($_POST["updateCartItem"])) {
	$update_id = $_POST["update_id"];
	$qty = $_POST["qty"];
	if (isset($_SESSION["uid"])) {
		$sql = "UPDATE cart SET qty='$qty' WHERE p_id = '$update_id' AND user_id = '$_SESSION[uid]'";
	} else {
		$sql = "UPDATE cart SET qty='$qty' WHERE p_id = '$update_id' AND ip_add = '$ip_add'";
	}
	if (mysqli_query($con, $sql)) {
		echo "<div class='alert alert-info'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is updated</b>
				</div>";
		exit();
	}
}


?>