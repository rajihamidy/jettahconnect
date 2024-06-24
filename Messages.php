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
		include_once("db.php");
		$db = new Database();
	$this->con = $db->connect();
	}

	public function getBuyerInbox(){
		$buyer_email =$_SESSION["buyer_email"];
		

		$query = $this->con->query("SELECT sc.sn, sc.user_id, sc.email, sc.phone, sc.complaints, sc.file_name,
		 sc.submDate, cr.sn, cr.reply_text,cr.replier_email, cr.reply_date 
		 FROM customer_complaints sc LEFT JOIN customer_complaints_replies cr ON sc.sn = cr.complaint_id 
		 WHERE sc.email = '$buyer_email' ORDER BY sc.sn, cr.reply_date DESC");
		$ar = []; 
		if (@$query->num_rows > 0) {
			
			while ($row = $query->fetch_assoc()) {
				
				$ar[] = $row;
			}
			return ['status'=> 202, 'message'=> $ar];
		}
		return ['status'=> 303, 'message'=> 'no Message yet'];
	}
	
	public function getBuyerOutBox(){
		$buyer_email =$_SESSION["buyer_email"];
		

		$query = $this->con->query("SELECT * FROM customer_complaints  
		 WHERE email = '$buyer_email' ORDER BY submDate DESC");
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



if (isset($_POST["GET_BUYER_INBOX"])) {
	if (isset($_SESSION['buyer_email'])) {
		$c = new Messages();
		echo json_encode($c->getBuyerInbox());
		exit();
	}
}
if (isset($_POST["GET_BUYER_OUTBOX"])) {
	if (isset($_SESSION['buyer_email'])) {
		$c = new Messages();
		echo json_encode($c->getBuyerOutBox());
		exit();
	}
}

?>