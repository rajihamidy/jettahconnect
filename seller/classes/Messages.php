<?php 
session_start();

/**
 * 
 */
class Messages
{
	
	private $con;

	function __construct()
	{
		include_once("Database.php");
		$db = new Database();
		$this->con = $db->connect();
	}

	public function getSellerInbox(){
		$admin_email =$_SESSION['admin_email'];
		

		$query = $this->con->query("SELECT sc.sn, sc.user_id, sc.email, sc.phone, sc.complaints, sc.file_name,
		 sc.submDate, cr.sn, cr.reply_text,cr.replier_email, cr.reply_date 
		 FROM seller_complaints sc LEFT JOIN seller_complaints_replies cr ON sc.sn = cr.complaint_id 
		 WHERE sc.email = '$admin_email' ORDER BY sc.sn, cr.reply_date DESC");
		$ar = []; 
		if (@$query->num_rows > 0) {
			
			while ($row = $query->fetch_assoc()) {
				
				$ar[] = $row;
			}
			return ['status'=> 202, 'message'=> $ar];
		}
		return ['status'=> 303, 'message'=> 'no Message yet'];
	}
	
	public function getSellerOutBox(){
		$admin_email =$_SESSION['admin_email'];
		

		$query = $this->con->query("SELECT * FROM seller_complaints  
		 WHERE email = '$admin_email' ORDER BY submDate DESC");
		$ar = []; 
		if (@$query->num_rows > 0) {
			
			while ($row = $query->fetch_assoc()) {
				
				$ar[] = $row;
			}
			return ['status'=> 202, 'message'=> $ar];
		}
		return ['status'=> 303, 'message'=> 'no Message yet'];
	}
}


/*$c = new Customers();
echo "<pre>";
print_r($c->getCustomers());
exit();*/



if (isset($_POST["GET_SELLER_INBOX"])) {
	if (isset($_SESSION['admin_email'])) {
		$c = new Messages();
		echo json_encode($c->getSellerInbox());
		exit();
	}
}
if (isset($_POST["GET_SELLER_OUTBOX"])) {
	if (isset($_SESSION['admin_email'])) {
		$c = new Messages();
		echo json_encode($c->getSellerOutBox());
		exit();
	}
}

?>