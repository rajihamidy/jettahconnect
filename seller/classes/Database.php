<?php

/**
 * 
 */
class Database
{
    private $con;

    public function connect()
    {
        $this->con = new mysqli("localhost", "root", "", "jettahconnect");

        if ($this->con->connect_error) {
            die("Connection failed: " . $this->con->connect_error);
        }

        return $this->con;
    }
}




$conn = mysqli_connect("localhost", "root", "", "jettahconnect");
if (!$conn) {
    die("Cannot connect to the database. Error: " . mysqli_connect_error());
}

