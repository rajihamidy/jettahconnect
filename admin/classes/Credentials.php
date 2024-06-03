<?php
session_start();
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


	public function createAdminAccount($name, $email, $mobile, $password)
	{
		// Validate mobile number
		if (!preg_match('/^0[789][01]\d{8}$/', $mobile)) {
			return ['status' => 303, 'message' => 'Invalid mobile number [e.g. 08088888367]'];
		}
	
		$q = $this->con->query("SELECT email FROM masteradmin WHERE email = '$email'");
		$qN = $this->con->query("SELECT mobile FROM masteradmin WHERE mobile = '$mobile'");
		if ($q->num_rows > 0) {
			return ['status' => 303, 'message' => 'Email already exists'];
		} else if ($qN->num_rows > 0) {
			return ['status' => 303, 'message' => 'Number already exists'];
		} else {
			//$password = password_hash($password, PASSWORD_BCRYPT, ["COST"=> 8]);
			$password = md5($password);
	
			// Get the current date and time in Lagos/Africa timezone
			date_default_timezone_set('Africa/Lagos');
			$dateTime = date('d-m-Y H:i');
	
			$q = $this->con->query("INSERT INTO `masteradmin`(`name`, `email`, `mobile`, `password`, `regdate`) VALUES ('$name','$email','$mobile','$password','$dateTime')");
			if ($q) {
				return ['status' => 202, 'message' => 'Admin Created Successfully'];
			}else{
				return ['status' => 303, 'message' => 'Account Not Created due to unknown Error.'];
			}
		}
	}
	


	public function loginAdmin($email, $password)
	{
		$q = $this->con->query("SELECT * FROM masteradmin WHERE email = '$email' LIMIT 1");
		if ($q->num_rows > 0) {
			$row = $q->fetch_assoc();
			if (password_verify($password, $row['password'])) {
				$_SESSION['masteradmin_name'] = $row['name'];
				$_SESSION['masteradmin_id'] = $row['id'];
				return ['status' => 202, 'message' => 'Login Successful'];
			} else {
				return ['status' => 303, 'message' => 'Login Fail'];
			}
		} else {
			return ['status' => 303, 'message' => 'Account not created yet with this email'];
		}
	}
}

//$c = new Credentials();
//$c->createAdminAccount("Rizwan", "rizwan@gmail.com", "12345");

//PRINT_R($c->loginAdmin("rizwan@gmail.com", "12345"));

if (isset($_POST['admin_register'])) {
	extract($_POST);
	if (!empty($name) && !empty($email) && !empty($password) && !empty($cpassword)) {
		if ($password == $cpassword) {
			$c = new Credentials();
			$result = $c->createAdminAccount($name, $email, $mobile, $password);
			echo json_encode($result);
			exit();
		} else {
			echo json_encode(['status' => 303, 'message' => 'Password mismatch']);
			exit();
		}
	} else {
		echo json_encode(['status' => 303, 'message' => 'Fill Empty Fields.']);
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
	} else {
		echo json_encode(['status' => 303, 'message' => 'Fill Empty fields.']);
		exit();
	}
}
