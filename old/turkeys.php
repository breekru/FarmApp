<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BLK Farm's Sheep</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
    <link rel="icon" type="image/ico" href="/img/favicon.ico" />
</head>
<body>
<div class="page-header">
        <img src="/img/logo_base.png">
        <h1>BLK Farm's Sheep</h1>
    </div>
<div>
<?php
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Type</th><th>Breed</th><th>Number</th><th>Name</th><th>Gender</th><th>Offspring</th><th>Parents</th><th>Purchased</th><th>Sold</th><th>Created On</th></tr>";

class TableRows extends RecursiveIteratorIterator {
  function __construct($it) {
    parent::__construct($it, self::LEAVES_ONLY);
  }

  function current() {
    return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
  }

  function beginChildren() {
    echo "<tr>";
  }

  function endChildren() {
    echo "</tr>" . "\n";
  }
}

$servername = "localhost";
$username = "blkfarms_connect";
$password = "gNGA{-xKX#v3";
$dbname = "blkfarms_farmapp";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->prepare("SELECT `type`, `breed`, `number`, `name`, `gender`, `offspring`, `parents`, `date_purchased`, `date_sold`, `created_at` FROM `animals` WHERE `type` = \"turkey\"");
  $stmt->execute();

  // set the resulting array to associative
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
    echo $v;
  }
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>
</div>
</body>
</html>