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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Animal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="headerstyle.css" />
    <link rel="icon" type="image/ico" href="/farmapp/img/favicon.ico" />
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px;}
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
    <div class="wrapper container">
        <h2>Add Animal</h2>
        <p>Please fill this form to Add an Animal to your Farm</p>
        <form action="control_table.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="type">Type</label>
                <select id="type" name="type" class="form-control">
                    <option value="Sheep">Sheep</option>
                    <option value="Chicken">Chicken</option>
                    <option value="Turkey">Turkey</option>
                    <option value="Pig">Pig</option>
                    <option value="Cow">Cow</option>
                </select>
            </div>    
            <div class="form-group">
                <label>Breed</label>
                <input type="text" name="breed" class="form-control">
            </div>

            <div class="form-group">
                <label>Registration Number</label>
                <input type="text" name="reg_num" class="form-control">
            </div>
            <div class="form-group">
                <label>Registration Name</label>
                <input type="text" name="reg_name" class="form-control">
            </div>


            <div class="form-group">
                <label>Number</label>
                <input type="text" name="number" class="form-control">
            </div>
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control">
            </div>

            <div class="form-group">
                <label>Color Description</label>
                <input type="text" name="color" class="form-control">
            </div>

            <div class="form-group">
                <label>Gender</label>
                <select id="gender" name="gender" class="form-control">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="form-group">
                <label>Offspring</label>
                <input type="text" name="offspring" class="form-control">
            </div>
            <div class="form-group">
                <label>Parents</label>
                <input type="text" name="parents" class="form-control">
            </div>

            <div class="form-group">
            <label>Dam</label>
            <select id="Dam" name="Dam" class="form-control">
            <?php 
            //$sql = "SELECT `day_of_week` FROM `stats` WHERE `timeframe` = \"week\"";
            $sql_dam = "SELECT `name` FROM `animals` WHERE `gender` = \"Female\" && `user_id`='$cur_user'";
            $result_dam = mysqli_query($con,$sql_dam);
            $count=1;
            while($row_dam = mysqli_fetch_assoc($result_dam)):;
            ?>
                <option value="<?php echo $row_dam["name"]; ?>"><?php echo $row_dam["name"]; ?></option>

                <?php
                endwhile;
                ?>
                <option value="other">Other</option>
            </select>
            </div>

            
            <div class="form-group">

            <script type="text/javascript">
    function EnableDisableTextBox(sire) {
        var selectedValue = ddlModels.options[ddlModels.selectedIndex].value;
        var txtOther = document.getElementById("txtOther");
        txtOther.disabled = selectedValue == 5 ? false : true;
        if (!txtOther.disabled) {
            txtOther.focus();
        }
    }
</script>

            <label>Sire</label>
            <select id="sire" name="sire" class="form-control">
            <?php 
            //$sql = "SELECT `day_of_week` FROM `stats` WHERE `timeframe` = \"week\"";
            $sql_sire = "SELECT `name` FROM `animals` WHERE `gender` = \"Male\" && `user_id`='$cur_user'";
            $result_sire = mysqli_query($con,$sql_sire);
            $count_sire=1;
            while($row_sire = mysqli_fetch_assoc($result_sire)):;
            ?>
                <option value="<?php echo $row_sire["name"]; ?>"><?php echo $row_sire["name"]; ?></option>

                <?php
                endwhile;
                ?>
                <option value="other">Other</option>
            </select>
            <input type="text" id="txtOther" disabled="disabled" />
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status" class="form-control">
                    <option value="Alive">Alive</option>
                    <option value="Dead">Dead</option>
                    <option value="Sold">Sold</option>
                    <option value="For Sale">For Sale</option>
                    <option value="Harvested">Harvested</option>
                </select>
            </div> 
            <div class="form-group">
              <label for="comment">Notes</label>
              <textarea class="form-control" rows="5" id="notes" name="notes"></textarea>
            </div>

            <div class="form-group">
              <label for="comment">Medications</label>
              <textarea class="form-control" rows="5" id="meds" name="meds"></textarea>
            </div>

            <div class="form-group">
                <label>Date of Birth</label>
                <input type="date" name="dob" class="form-control">
            </div>

            <div class="form-group">
                <label>Purchased</label>
                <input type="date" name="purchased" class="form-control">
            </div>

            <div class="form-group">
                <label>Cost to Purchase</label>
                <input type="text" name="purch_cost" class="form-control">
            </div>

            <div class="form-group">
                <label>Seller Info</label>
                <input type="text" name="purch_info" class="form-control">
            </div>

            <div class="form-group">
                <label>Sold</label>
                <input type="date" name="sold" class="form-control">
            </div>

            <div class="form-group">
                <label>Sell Price</label>
                <input type="text" name="sell_price" class="form-control">
            </div>

            <div class="form-group">
                <label>Purchaser Info</label>
                <input type="text" name="sell_info" class="form-control">
            </div>

            <div class="form-group">
                <label>Date of Death/Dispatch</label>
                <input type="date" name="dod" class="form-control">
            </div>

            <div class="form-group">
                <input type="file" name="image">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit" name="upload">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
        </form>
        <?php

        if ( !empty($_SERVER['CONTENT_LENGTH']) && empty($_FILES) && empty($_POST) )
    echo 'The uploaded zip was too large. You must upload a file smaller than ' . ini_get("upload_max_filesize");
        ?>



    </body>
</html>






