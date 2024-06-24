<?php

require "config/constants.php";

$servername = HOST;
$username = USER;
$password = PASSWORD;
$db = DATABASE_NAME;

// Create connection
$con = mysqli_connect($servername, $username, $password,$db);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}



/**
 * 
 */
class Database
{
    private $servername = HOST;
    private $username = USER;
    private $password = PASSWORD;
    private $db = DATABASE_NAME;
    private $con;

    public function connect()
    {
        // Use $this-> to access class properties
        $this->con = new mysqli($this->servername, $this->username, $this->password, $this->db);

        // Check for connection errors
        if ($this->con->connect_error) {
            die("Connection failed: " . $this->con->connect_error);
        }

        return $this->con;
    }
}




$conn = mysqli_connect($servername, $username, $password,$db);
if (!$conn) {
    die("Cannot connect to the database. Error: " . mysqli_connect_error());
}

