<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="headerstyle.css" />
    <link rel="icon" type="image/ico" href="img/favicon.ico" />
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="welcome.php">FarmApp</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="welcome.php">Home</a></li>
        <li><a href="choose.php">Animal Info</a></li>
        <li><a href="add_animal.php">Add Animal</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span><?php echo htmlspecialchars($_SESSION["username"]); ?>
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li><a href="reset-password.php">Change Password</a></li>
            <li><a href="#">Edit Profile</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </li>
        <li><a href="#"><span class="glyphicon glyphicon-search"></span></a></li>
      </ul>
    </div>
  </div>
</nav>
        <!--<div class="btn-group btn-group-justified">
        <a href="welcome.php" class="btn btn-primary">Welcome</a>
        <a href="choose.php" class="btn btn-primary">Animal Info</a>
        <a href="add_animal.php" class="btn btn-primary">Add an Animal</a>
        <a href="#" class="btn btn-sm"><?php echo htmlspecialchars($_SESSION["username"]); ?></a>
        <a href="reset-password.php" class="btn btn-warning">Reset Password</a>
        <a href="logout.php" class="btn btn-danger">Log Out</a>
    </div>-->
    <div class="page-header">
        <img src="/img/logo_base.png">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Here you can change your settings or Log Out</h1>
    </div>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>

</body>
</html>