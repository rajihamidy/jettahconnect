<?php
session_start();

/**
 * 
 */
class Withdrawal
{

    private $con;

    function __construct()
    {
        include_once("Database.php");
        $db = new Database();
        $this->con = $db->connect();
    }


    public function getWithdrawals()
    {
        $admin_id = $_SESSION['admin_id'];
        $admin_email= $_SESSION['admin_email'];
        $query = $this->con->query("SELECT * from withdrawal  where seller_email='$admin_email' order by date_time desc");
        $ar = [];
        if (@$query->num_rows > 0) {

            while ($row = $query->fetch_assoc()) {

                $ar[] = $row;
            }
            return ['status' => 202, 'message' => $ar];
        }
        return ['status' => 303, 'message' => 'No Withdrawal Record yet'];
    }
}
if (isset($_POST["GET_SELLER_WITHDRAWAL"])) {
    if (isset($_SESSION['admin_id'])) {
        $c = new Withdrawal();
        echo json_encode($c->getWithdrawals());
        exit();
    }
}
