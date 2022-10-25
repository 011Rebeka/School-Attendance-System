<?php
require_once './dbcon.php';
$tid=base64_decode($_GET['id']);
$del_query="UPDATE `teachers` SET `class_teacher`='0',`tclass`='0',`tsec`='0',`jdate`='NULL' WHERE `id`='$tid'";
 $result=mysqli_query($link,$del_query);
 if($result){
 header("location:index.php?page=all_class_teachers");}


?>