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
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="headerstyle.css" />
    <link rel="icon" type="image/ico" href="/farmapp/img/favicon.ico" />
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
    <div class="page-header">
        <img src="/farmapp/img/logo_base.png">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
    </div>

    <p>
        <a href="choose.php" class="btn btn-warning">Animal Info</a>
        <a href="add_animal.php" class="btn btn-warning">Add an Animal</a>
        <!--<a href="edit_animal.php" class="btn btn-warning">Edit an Animal</a>-->
    </p>

    <div class="container" style="height: 1000px;">  
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="/img/ss/1.jpg" alt="garden" style="width:100%; height: 300px;">
      </div>

      <div class="item">
        <img src="/img/ss/banner.jpg" alt="Farm" style="width:100%; height: 300px;">
      </div>
    
      <div class="item">
        <img src="/img/ss/4.jpg" alt="farm dog" style="height: 300px; display: block; margin-left: auto; margin-right: auto; width: auto;">
      </div>

      <div class="item">
        <img src="/img/ss/5.jpg" alt="Guinneas" style="height: 300px; display: block; margin-left: auto; margin-right: auto; width: auto;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

</body>
</html>