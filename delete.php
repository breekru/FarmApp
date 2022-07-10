<?php
require('config.php');

// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

$id=$_REQUEST['id'];
$query = "DELETE FROM animals WHERE id=$id"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: choose.php"); 
?>