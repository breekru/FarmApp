<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'blkfarms_connect');
define('DB_PASSWORD', 'gNGA{-xKX#v3');
define('DB_NAME', 'blkfarms_farmapp');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

$con = mysqli_connect("localhost","blkfarms_connect","gNGA{-xKX#v3","blkfarms_farmapp");
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
