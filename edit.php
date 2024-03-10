
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
$query = "SELECT `id`, `type`, `breed`, `number`, `name`, `gender`, `dob`, `dod`, `offspring`, `parents`, `status`, `date_purchased`, `date_sold`, `notes`, `meds`, `for_sale` FROM `animals` where id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit an Animal</title>
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
<!--<div class="form">-->
<div class="wrapper container">
<h1>Update Record</h1>
<?php
$verify = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
$created_at = date("Y-m-d H:i:s");
$type =$_REQUEST['type'];
$breed =$_REQUEST['breed'];
$number =$_REQUEST['number'];
$name =$_REQUEST['name'];
$gender =$_REQUEST['gender'];
$dob =$_REQUEST['dob'];
$dod =$_REQUEST['dod'];
$offspring =$_REQUEST['offspring'];
$parents =$_REQUEST['parents'];
$status =$_REQUEST['status'];
$date_purchased =$_REQUEST['date_purchased'];
$date_sold =$_REQUEST['date_sold'];
$notes =$_REQUEST['notes'];
$meds =$_REQUEST['meds'];
$for_sale =$_REQUEST['for_sale'];
$user_id = $_SESSION["username"];
//$update="update animals set created_at='".$created_at."',
//type='".$type."', breed='".$breed."', number='".$number."', name='".$name."', gender='".$gender."', offspring='".$offspring."', parents='".$parents."', date_purchased='".$date_purchased."', date_sold='".$date_sold."', notes='".$notes."',
//user_id='".$user_id."' where id='".$id."'";

if($date_sold == ''){
$update = "UPDATE animals SET created_at='".$created_at."', type='".$type."', breed='".$breed."', number='".$number."', name='".$name."', gender='".$gender."', dob='".$dob."', dod='".$dod."', offspring='".$offspring."', parents='".$parents."', status='".$status."', date_purchased='".$date_purchased."', date_sold=NULL, notes='".$notes."', meds='".$meds."', for_sale='".$for_sale."', user_id='".$user_id."' where id='".$id."'";
} else {

$update = "UPDATE animals SET created_at='".$created_at."', type='".$type."', breed='".$breed."', number='".$number."', name='".$name."', gender='".$gender."', dob='".$dob."', dod='".$dod."', offspring='".$offspring."', parents='".$parents."', status='".$status."', date_purchased='".$date_purchased."', date_sold='".$date_sold."', notes='".$notes."', meds='".$meds."', for_sale='".$for_sale."', user_id='".$user_id."' where id='".$id."'";
}

mysqli_query($con, $update) or die(mysqli_error());
$verify = "Record Updated Successfully. </br></br>";

echo '<p style="color:#FF0000;">'.$verify.'</p>';
echo '<a href=view.php?id='.$id.'>View Record</a>';


}else {
?>
<div>
<!--<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
<p><input type="text" name="name" placeholder="Enter Name" 
required value="<?php echo $row['name'];?>" /></p>
<p><input type="text" name="age" placeholder="Enter Age" 
required value="<?php echo $row['age'];?>" /></p>
<p><input name="submit" type="submit" value="Update" /></p>
</form>
-->

        <form name="form" method="post" action=""> 
            <div class="form-group">
            	<input type="hidden" name="new" value="1" />
				<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
                <label for="type">Type</label>
                <select name="type" class="form-control" required value="<?php echo $row['type'];?>" />
                    <option selected="selected" value="<?php echo $row['type'];?>"><?php echo $row['type'];?></option>
                    <option value="Sheep">Sheep</option>
                    <option value="Chicken">Chicken</option>
                    <option value="Turkey">Turkey</option>
                    <option value="Pig">Pig</option>
                </select>
            </div>    
            <div class="form-group">
                <label>Breed</label>
                <input type="text" name="breed" class="form-control" required value="<?php echo $row['breed'];?>" />
            </div>
            <div class="form-group">
                <label>Number</label>
                <input type="text" name="number" class="form-control" required value="<?php echo $row['number'];?>" />
            </div>
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" required value="<?php echo $row['name'];?>" />
            </div>
            <div class="form-group">
                <label>Gender</label>
                <select name="gender" id="gender" class="form-control" required value="<?php echo $row['gender'];?>" />
                    <option selected="selected" value="<?php echo $row['gender'];?>"><?php echo $row['gender'];?></option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="form-group">
                <label>Date of Birth</label>
                <input type="date" name="dob" class="form-control">
            </div>
            <div class="form-group">
                <label>Date of Death/Dispatch</label>
                <input type="date" name="dod" class="form-control">
            </div>
            <div class="form-group">
                <label>Offspring</label>
                <textarea type="text" class="form-control" rows="5" id="offspring" name="offspring"><?php echo $row['offspring'];?></textarea>
            </div>
            <div class="form-group">
                <label>Parents</label>
                <input type="text" name="parents" class="form-control" required value="<?php echo $row['parents'];?>" />
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status" class="form-control" required value="<?php echo $row['status'];?>" />
                    <option selected="selected" value="<?php echo $row['status'];?>"><?php echo $row['status'];?></option>
                    <option value="Alive">Alive</option>
                    <option value="Dead">Dead</option>
                    <option value="Sold">Sold</option>
                    <option value="For Sale">For Sale</option>
                    <option value="Harvested">Harvested</option>
                </select>
            </div>

            <div class="form-group">
                <label>Purchased</label>
                <input type="date" name="date_purchased" class="form-control" required value="<?php echo $row['date_purchased'];?>" />
            </div>
            <div class="form-group">
                <label>Sold</label>
                <input type="date" name="date_sold" class="form-control" value="<?php echo $row['date_sold'];?>" />
            </div>

            <div class="form-group">
                <label for="status">List for sale?</label>
                <select id="for_sale" name="for_sale" class="form-control" required value="<?php echo $row['for_sale'];?>" />
                    <option selected="selected" value="<?php echo $row['for_sale'];?>"><?php echo $row['for_sale'];?></option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                    <option value="Has Been Sold">Has Been Sold</option>
                </select>
            </div>

            <div class="form-group">
              <label>Notes</label>
              <textarea type="text" class="form-control" rows="5" id="notes" name="notes"><?php echo $row['notes'];?></textarea>
            </div>
            <div class="form-group">
              <label>Medications</label>
              <textarea type="text" class="form-control" rows="5" id="notes" name="meds"><?php echo $row['meds'];?></textarea>
            </div>
            <div class="form-group">
            	<input name="submit" type="submit" value="Update" />
                <!--<input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">-->
            </div>


<?php } ?>
</div>
</div>
</body>
</html>