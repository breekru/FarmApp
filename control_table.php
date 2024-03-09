<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}


/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "blkfarms_connect", "gNGA{-xKX#v3", "blkfarms_farmapp");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$type = mysqli_real_escape_string($link, $_REQUEST['type']);
$breed = mysqli_real_escape_string($link, $_REQUEST['breed']);
$number = mysqli_real_escape_string($link, $_REQUEST['number']);
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$gender = mysqli_real_escape_string($link, $_REQUEST['gender']);
$offspring = mysqli_real_escape_string($link, $_REQUEST['offspring']);
$parents = mysqli_real_escape_string($link, $_REQUEST['parents']);
$status = mysqli_real_escape_string($link, $_REQUEST['status']);
$dob = mysqli_real_escape_string($link, $_REQUEST['dob']);
$dod = mysqli_real_escape_string($link, $_REQUEST['dod']);
$purch_cost = mysqli_real_escape_string($link, $_REQUEST['purch_cost']);
$purch_info = mysqli_real_escape_string($link, $_REQUEST['purch_info']);
$sell_price = mysqli_real_escape_string($link, $_REQUEST['sell_price']);
$sell_info = mysqli_real_escape_string($link, $_REQUEST['sell_info']);
$color = mysqli_real_escape_string($link, $_REQUEST['color']);
$reg_num = mysqli_real_escape_string($link, $_REQUEST['reg_num']);
$reg_name = mysqli_real_escape_string($link, $_REQUEST['reg_name']);
$date_purchased = mysqli_real_escape_string($link, $_REQUEST['purchased']);
$date_sold = mysqli_real_escape_string($link, $_REQUEST['sold']);
$notes = mysqli_real_escape_string($link, $_REQUEST['notes']);
$meds = mysqli_real_escape_string($link, $_REQUEST['meds']);
$for_sale = mysqli_real_escape_string($link, $_REQUEST['for_sale']);
$image = mysqli_real_escape_string($link, $_REQUEST['image']);
$user_id = $_SESSION["username"];

if (isset($_POST['upload'])) {
    $image = $_FILES['image']['name'];
    // image file directory
    $target = "images/".basename($image);
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
    }else{
        $msg = "Failed to upload image";
    }
 }
// Attempt insert query execution

//if($dod == ''){
//    $dod1 = 'NULL';
//} else {
//    $dod1 = $_REQUEST['dod'];
//}
if($date_sold == ''){
$sql = "INSERT INTO animals (id, type, breed, number, name, gender, offspring, parents, status, dob, dod, purch_cost, purch_info, sell_price, sell_info, color, reg_num, reg_name, date_purchased, notes, meds, for_sale, image, created_at, user_id) VALUES (NULL, '$type', '$breed', '$number', '$name', '$gender', '$offspring', '$parents', '$status', '$dob', '$dod', '$purch_cost', '$purch_info', '$sell_price', '$sell_info', '$color', '$reg_num', '$reg_name', '$date_purchased', '$notes', '$meds', '$for_sale', '$image', CURRENT_TIMESTAMP, '$user_id')";
} else {

$sql = "INSERT INTO animals (id, type, breed, number, name, gender, offspring, parents, status, dob, dod, purch_cost, purch_info, sell_price, sell_info, color, reg_num, reg_name, date_purchased, date_sold, notes, meds, for_sale, image, created_at, user_id) VALUES (NULL, '$type', '$breed', '$number', '$name', '$gender', '$offspring', '$parents', '$status', '$dob', '$dod', '$purch_cost', '$purch_info', '$sell_price', '$sell_info', '$color', '$reg_num', '$reg_name', '$date_purchased', '$date_sold', '$notes', '$meds', '$for_sale',  '$image', CURRENT_TIMESTAMP, '$user_id')";
}
if(mysqli_query($link, $sql)){
    header("refresh:5;url=welcome.php");
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);



 // $msg = "";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Saving!!!</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
    <link rel="icon" type="image/ico" href="img/favicon.ico" />
</head>
<body>
    <div class="container">
        <div class="jumbotron">
            <h1>Saving your data you will be redirected shortly</h1>

        </div>
    </div>
</body>
</html>