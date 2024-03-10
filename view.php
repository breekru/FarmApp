
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
$query = "SELECT `id`, `type`, `breed`, `number`, `name`, `gender`, `dob`, `dod`, `offspring`, `parents`, `status`, `date_purchased`, `date_sold`, `notes`, `meds`, `image` FROM `animals` where id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
$imgresult = mysqli_query($con, "SELECT * FROM animals WHERE id='".$id."'");
?>
<!DOCTYPE html>
<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View an Animal</title>
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
</nav>        <!--<div class="btn-group btn-group-justified">
        <a href="welcome.php" class="btn btn-primary">Welcome</a>
        <a href="choose.php" class="btn btn-primary">Animal Info</a>
        <a href="add_animal.php" class="btn btn-primary">Add an Animal</a>
        <a href="#" class="btn btn-sm"><?php echo htmlspecialchars($_SESSION["username"]); ?></a>
        <a href="reset-password.php" class="btn btn-warning">Reset Password</a>
        <a href="logout.php" class="btn btn-danger">Log Out</a>
    </div>-->
<div class="form">

<h1 align="center">View Record</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
$created_at = date("Y-m-d H:i:s");
$type =$_REQUEST['type'];
$breed =$_REQUEST['breed'];
$number =$_REQUEST['number'];
$name =$_REQUEST['name'];
$gender =$_REQUEST['gender'];
$offspring =$_REQUEST['offspring'];
$parents =$_REQUEST['parents'];
$status1 =$_REQUEST['status'];
$date_purchased =$_REQUEST['date_purchased'];
$date_sold =$_REQUEST['date_sold'];
$notes =$_REQUEST['notes'];
$dob =$_REQUEST['dob'];
$dod =$_REQUEST['dod'];
$meds =$_REQUEST['meds'];
$user_id = $_SESSION["username"];
$update="update animals set created_at='".$created_at."',
type='".$type."', breed='".$breed."', number='".$number."', name='".$name."', gender='".$gender."', dob='".$dob."', dod='".$dod."', offspring='".$offspring."', parents='".$parents."', status1='".$status."', date_purchased='".$date_purchased."', date_sold='".$date_sold."', notes='".$notes."', meds='".$meds."',
user_id='".$user_id."' where id='".$id."'";
mysqli_query($con, $update) or die(mysqli_error());
$status = "Record Updated Successfully. </br></br>
<a href='welcome.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>

<div id="content">
  <?php
    while ($data = mysqli_fetch_array($imgresult)) {
        if (empty($data['image'])) {
            echo "<div align=center>";
            echo "<img src='img/no_image.png' height=300>";
            echo "</div>";

      } else {
            echo "<div align=center>";
            echo "<img src='images/".$data['image']."' height=300 class='img-circle'>";
            echo "</div>";
        }
    }
  ?>

<div class="container">


<!--<table width="80%" border="1" style="border-collapse:collapse;">-->
<table width="50%" border="1" class="table table-hover">
<?php
$count=1;
$result = mysqli_query($con,$query);
while($row = mysqli_fetch_assoc($result)) { 
    ?>
<!--<tr>
    <td align="center"><?php echo $count; ?></td>
<td align="center">ID:</td>
<td align="center"><?php echo $row["id"]; ?></td>
</tr>-->
<tr>
<td align="center">Type:</td>
<td align="center"><?php echo $row["type"]; ?></td>
</tr>
<tr>
<td align="center">Breed:</td>
<td align="center"><?php echo $row["breed"]; ?></td>
</tr>
<tr>
<td align="center">Number:</td>
<td align="center"><?php echo $row["number"]; ?></td>
</tr>
<tr>
<td align="center">Name:</td>
<td align="center"><?php echo $row["name"]; ?></td>
</tr>
<tr>
<td align="center">Gender:</td>
<td align="center"><?php echo $row["gender"]; ?></td>
</tr>
<tr>
    <td align="center">Date of Birth:</td>
    <?php
    $dob_date = strtotime($row["dob"]);
    $f_dob = date("m/d/Y", $dob_date);
    ?>
    <td align="center"><?php echo $f_dob; ?></td>
</tr>
<tr>
    <td align="center">Date of Death/Dispatch:</td>
    <?php
    if (!empty($row["dod"])) {
        $dod_date = strtotime($row["dod"]);
        $f_dod = date("m/d/Y", $dod_date);
    } else {
        $f_dod = "N/A"; // Set to blank if $row["dob"] is empty
    }
    ?>
    <td align="center"><?php echo $f_dod; ?></td>
</tr>
<tr>
<td align="center">Offspring:</td>
<td align="center"><?php echo $row["offspring"]; ?></td>
</tr>
<tr>
<td align="center">Parents:</td>
<td align="center"><?php echo $row["parents"]; ?></td>
</tr>
<tr>
<td align="center">Status:</td>
<td align="center"><?php echo $row["status"]; ?></td>
</tr>
<tr>
<td align="center">Purchased:</td>
<td align="center"><?php echo $row["date_purchased"]; ?></td>
</tr>
<tr>
<td align="center">Sold:</td>
<td align="center"><?php echo $row["date_sold"]; ?></td>
</tr>
<tr>
<td align="center">Notes:</td>
<td align="center" class="tdbreak"><?php echo $row["notes"]; ?></td>
</tr>
<tr>
<td align="center">Medication History:</td>
<td align="center" class="tdbreak"><?php echo $row["meds"]; ?></td>
</tr>
<tr>
    <td colspan="2" align="center">
        <?php $return = strtolower($row["type"]); ?>
        <?php
        if ($return == "pig") {
            $return = "pigs";
        }
        if ($return == "chicken"){
            $return = "chickens";
        }
        if ($return == "turkey"){
            $return = "turkeys";
        }
        ?>

<div align="center">
    <a href="edit.php?id=<?php echo $row["id"]; ?>"class="btn btn-info">Edit Entry</a>
    <a href="delete.php?id=<?php echo $row["id"]; ?>"class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item')">Delete Entry</a>
</div>
    </td>
    </tr>
    <tr>
        <td colspan="2" align="center">
            <div align="center">
                <a href=<?php echo $return; ?>.php class="btn btn-block btn-warning">Return to List</a>
            </div>
        </td>
    </tr>
    <tr>
        <td colspan="2" align="center">
            <div align="center">
                <a href="choose.php" class="btn btn-block btn-primary">Back to Choose Animal</a>
            </div>
        </td>
    </tr>

<?php $count++; } ?>
</tbody>
</table>
            </div>
<?php } ?>
</div>
</div>
</body>
</html>