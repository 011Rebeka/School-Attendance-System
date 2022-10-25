<?php
require_once './dbcon.php';
$sid=$_GET['id'];
$del_query="DELETE FROM `notice` WHERE `nid`='$sid'";
 $result=mysqli_query($link,$del_query);
 if($result){echo 'yes';
 header("location:index.php?page=all_notices");}


?>