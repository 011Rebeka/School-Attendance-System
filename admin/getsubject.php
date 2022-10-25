<!DOCTYPE html>
<html>
<head>
<style>
table {
  width: 100%;
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid black;
  padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
echo $q = $_GET['q'];

require_once './dbcon.php';
$sql="SELECT `subname` FROM `subject` WHERE `class`='$q'";
$result = mysqli_query($link,$sql);

while($row = mysqli_fetch_array($result)) {
  echo "<option>" . $row['subname'] . "</option>";
}
mysqli_close($link);
?>
</body>
</html>