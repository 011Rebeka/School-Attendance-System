<?php
require_once './dbcon.php';
$tid=base64_decode($_GET['id']);
$del_query="DELETE FROM `teachers` WHERE `id`='$tid'";
 $result=mysqli_query($link,$del_query);
 if($result){
 header("location:index.php?page=all_teachers");}


?>