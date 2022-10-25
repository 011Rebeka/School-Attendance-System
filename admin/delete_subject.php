<?php
require_once './dbcon.php';
echo $subid=$_GET['id'];
$del_query="DELETE FROM `subject` WHERE `subid`='$subid'";
 $result=mysqli_query($link,$del_query);
 if($result){echo 'yes';
  header("location:index.php?page=all_subject");
 }


?>