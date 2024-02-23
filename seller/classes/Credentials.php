<?php 
session_start();
include "../datetime.php";

/**
 * 
 */
class Credentials
{
	
	private $con;

	function __construct()
	{
		include_once("Database.php");
		$db = new Database();
		$this->con = $db->connect();
	}


	public function createAdminAccount($shopname, $name, $email, $shopaddress,$mobile, $password){
		$q0 = $this->con->query("SELECT mobile FROM admin WHERE mobile = '$mobile'");
		$q = $this->con->query("SELECT email FROM admin WHERE email = '$email'");
		if ($q->num_rows > 0) {
			return ['status'=> 303, 'message'=> 'Email already exists'];
		} else if ($q0->num_rows > 0) {
			return ['status'=> 303, 'message'=> 'Contact Number already Exist.'];
		}
		else{
			$password = password_hash($password, PASSWORD_BCRYPT, ["COST"=> 8]);
			$regdate =date("d.m.Y H:i:s");
			$expdate= date('d.m.Y H:i:s', strtotime('+180 days', time()));
			$q = $this->con->query("INSERT INTO `admin`(`shopname`,`name`, `email`, `shopaddress`, 
			`mobile`, `password`, `is_active`,`regdate`,`expdate`,`acctstatus`) 
			VALUES ('$shopname','$name','$email','$shopaddress','$mobile','$password','0','$regdate','$expdate','Not Activated')");
			if ($q) {
				return ['status'=> 202, 'message'=> 'Admin Created Successfully'];
			}

		}
	}



	

	public function loginAdmin($email, $password){


		$q = $this->con->query("SELECT * FROM admin WHERE email = '$email' LIMIT 1");
		if ($q->num_rows > 0) {
			$row = $q->fetch_assoc();
					// Set the timezone to your preferred timezone
date_default_timezone_set("Africa/Lagos");


// Get today's date
$today = new DateTime();

// Example registration date (replace this with your actual registration date)

$expdate = new DateTime($row['expdate']);

// Calculate the difference in days
$interval = $today->diff($expdate);
$daysRemaining = $interval->format('%r%a');
			if ($daysRemaining<=0){
				return ['status'=> 305, 'message'=> 'Trial Expired'];
			}
			elseif (password_verify($password, $row['password'])) {
				$_SESSION['shopname'] = $row['shopname'];
				$_SESSION['admin_name'] = $row['name'];
				$_SESSION['admin_id'] = $row['id'];
				$_SESSION['regdate'] = $row['regdate'];
				$_SESSION['expdate'] = $row['expdate'];
				$_SESSION['acctstatus'] = $row['acctstatus'];
				return ['status'=> 202, 'message'=> 'Login Successful'];
			}else{
				return ['status'=> 303, 'message'=> 'Login Fail'];
			}
		}else{
			return ['status'=> 303, 'message'=> 'Account not created yet with this email.'];
		}
	}

}

//$c = new Credentials();
//$c->createAdminAccount("Rizwan", "rizwan@gmail.com", "12345");

//PRINT_R($c->loginAdmin("rizwan@gmail.com", "12345"));

if (isset($_POST['admin_register'])) {
	extract($_POST);
	$namex = "/^[a-zA-Z ]+$/";
	$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
	$number = "/^[0-9]+$/";
	if (!empty($shopname)&& !empty($name) && !empty($email) && !empty($shopaddress) && !empty($mobile) && !empty($password) && !empty($cpassword)) {
		if (strlen($mobile)<> 11){
			echo json_encode(['status'=> 303, 'message'=> 'Invalid Mobile Number, Mobile number must be 11 digits.']);
			exit();
		}
		else if ($password != $cpassword) {
			echo json_encode(['status'=> 303, 'message'=> 'Password mismatch']);
			exit();
			
		} else if (!preg_match($namex,$name)){
			echo json_encode(['status'=> 303, 'message'=> 'Invalid name format']);
			exit();
		}
		else if (!preg_match($number,$mobile)){
			echo json_encode(['status'=> 303, 'message'=> 'Invalid mobile number format']);
			exit();
		}
		else if (!preg_match($emailValidation,$email)){
			echo json_encode(['status'=> 303, 'message'=> 'Invalid email format']);
			exit();
		} else if ((strlen($password)<7)){
			echo json_encode(['status'=> 303, 'message'=> 'Password length is minimum of 7 characters.']);
			exit();
		}
		else{
			$c = new Credentials();
			$result = $c->createAdminAccount($shopname,$name, $email, $shopaddress, $mobile, $password);
			echo json_encode($result);
			exit();
		}
	}else{
		echo json_encode(['status'=> 303, 'message'=> 'Fill Empty fields']);
		exit();
	}
}

if (isset($_POST['admin_login'])) {
	extract($_POST);
	if (!empty($email) && !empty($password)) {
		$c = new Credentials();
		$result = $c->loginAdmin($email, $password);
		echo json_encode($result);
		exit();
	}else{
		echo json_encode(['status'=> 303, 'message'=> 'Fill Empty fields']);
		exit();
	}
}


?>