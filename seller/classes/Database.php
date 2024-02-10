<?php

/**
 * 
 */
class Database
{
	
	private $con;
	public function connect(){
		$this->con = new Mysqli("localhost", "root", "", "jettahconnect");
		return $this->con;
	}
}

?>

<?php


$conn = mysqli_connect("localhost", "root", "", "jettahconnect");
if (!$conn) {
    die("Cannot connect to the database. Error: " . mysqli_connect_error());
}
