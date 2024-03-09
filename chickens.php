<?php
require('config.php');

// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

$cur_user = $_SESSION["username"];
?>
<!DOCTYPE html>
<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chickens</title>
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
<div class="container" align="center">

<h2>View Chicken Records</h2>
<br>
 <input class="form-control" id="myInput" type="text" placeholder="Search..">
 <br>
<!--<table width="80%" border="1" style="border-collapse:collapse;" class="table table-striped">-->
<table width="50%" border="1" class="table table-hover">
<thead>
<tr>
<th><strong>Number</strong></th>
<th><strong>Name</strong></th>
<th><strong>Gender</strong></th>
<th><strong>Breed</strong></th>
<th><strong>Type</strong></th>
<!--<th><strong>Offspring</strong></th>
<th><strong>Parents</strong></th>
<th><strong>Purchased</strong></th>
<th><strong>Sold</strong></th>-->
<th><strong>View</strong></th>
<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>


</tr>
</thead>
<tbody id="myTable">
<?php
$count=1;
$sel_query="SELECT `id`, `type`, `breed`, `number`, `name`, `gender`, `offspring`, `parents`, `date_purchased`, `date_sold` FROM `animals` WHERE `type`= 'Chicken' && `user_id`='$cur_user'";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { 
	?>
<tr>
	<!--<td align="center"><?php echo $count; ?></td>-->


<td align="center"><?php echo $row["number"]; ?></td>
<td align="center"><?php echo $row["name"]; ?></td>
<td align="center"><?php echo $row["gender"]; ?></td>
<td align="center"><?php echo $row["breed"]; ?></td>
<td align="center"><?php echo $row["type"]; ?></td>

<!--<td align="center"><?php echo $row["offspring"]; ?></td>
<td align="center"><?php echo $row["parents"]; ?></td>
<td align="center"><?php echo $row["date_purchased"]; ?></td>
<td align="center"><?php echo $row["date_sold"]; ?></td>-->
<td align="center">
<a href="view.php?id=<?php echo $row["id"]; ?>" class="btn btn-success">View</a>
</td> 
<td align="center">
<a href="edit.php?id=<?php echo $row["id"]; ?>"class="btn btn-info">Edit</a>
</td>
<td align="center">
<a href="delete.php?id=<?php echo $row["id"]; ?>"class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item')">Delete</a>
</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
<br>
<br>
<div align="center">
<a href="choose.php" class="btn btn-block btn-primary">Back to Choose Animal</a>
</div>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

</body>
</html>