<?php 
session_start();
/**
 * 
 */
class Customers
{
	
	private $con;

	function __construct()
	{
		include_once("Database.php");
		$db = new Database();
		$this->con = $db->connect();
	}

	public function getCustomers(){
		$query = $this->con->query("SELECT * FROM `user_info`");
		$ar = [];
		if (@$query->num_rows > 0) {
			while ($row = $query->fetch_assoc()) {
				$ar[] = $row;
			}
			return ['status'=> 202, 'message'=> $ar];
		}
		return ['status'=> 303, 'message'=> 'no customer data'];
	}


	public function getCustomersOrder(){
		$query = $this->con->query("SELECT o.order_id, o.product_id, o.qty, o.trx_id, o.p_status,o.orderdate,o.seller_id, p.product_title, p.product_image,a.name FROM orders o JOIN products p ON o.product_id = p.product_id JOIN 
		admin a ON o.seller_id = a.id");
		$ar = [];
		if (@$query->num_rows > 0) {
			while ($row = $query->fetch_assoc()) {
				$ar[] = $row;
			}
			return ['status'=> 202, 'message'=> $ar];
		}
		return ['status'=> 303, 'message'=> 'no orders yet'];
	}
	
	public function getSellerComplaints(){
		$query = $this->con->query("SELECT * from seller_complaints order by submDate desc");
		$ar = [];
		if (@$query->num_rows > 0) {
			while ($row = $query->fetch_assoc()) {
				$ar[] = $row;
			}
			return ['status'=> 202, 'message'=> $ar];
		}
		return ['status'=> 303, 'message'=> 'no complaints submitted yet'];
	}
	public function getCustomerComplaints(){
		$query = $this->con->query("SELECT * from customer_complaints order by submDate desc");
		$ar = [];
		if (@$query->num_rows > 0) {
			while ($row = $query->fetch_assoc()) {
				$ar[] = $row;
			}
			return ['status'=> 202, 'message'=> $ar];
		}
		return ['status'=> 303, 'message'=> 'no complaints submitted yet'];
	}

}


/*$c = new Customers();
echo "<pre>";
print_r($c->getCustomers());
exit();*/

if (isset($_POST["GET_CUSTOMERS"])) {
	if (isset($_SESSION['masteradmin_id'])) {
		$c = new Customers();
		echo json_encode($c->getCustomers());
		exit();
	}
}

if (isset($_POST["GET_CUSTOMER_ORDERS"])) {
	if (isset($_SESSION['masteradmin_id'])) {
		$c = new Customers();
		echo json_encode($c->getCustomersOrder());
		exit();
	}
}
if (isset($_POST["GET_CUSTOMER_COMPLAINTS"])) {
	if (isset($_SESSION['masteradmin_id'])) {
		$c = new Customers();
		echo json_encode($c->getCustomerComplaints());
		exit();
	}
}

if (isset($_POST["GET_SELLER_COMPLAINTS"])) {
	if (isset($_SESSION['masteradmin_id'])) {
		$c = new Customers();
		echo json_encode($c->getSellerComplaints());
		exit();
	}
}
?>