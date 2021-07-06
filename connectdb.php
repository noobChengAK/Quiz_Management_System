<?php
$dbhost = "localhost";
$dbuser= "root";
$dbpass = "123456";
$dbname = "staff";
$connection = mysqli_connect($dbhost, $dbuser,$dbpass,$dbname);
if (mysqli_connect_errno()) {
     die("database connection failed :" .
     mysqli_connect_error() .
     "(" . mysqli_connect_errno() . ")"
         );
}
session_start();
$user = [];
if (isset($_SESSION['uid'])) {
        $query = "SELECT * FROM user WHERE id = ".$_SESSION['uid'].";";
        // var_dump($query);die;
        $result=$connection->query($query);
        if ($result->num_rows > 0) {
            while($row =$result->fetch_array() ){ 
                $user = $row;
                break;
            }
        }
        // var_dump($user);die;
    }
?>

