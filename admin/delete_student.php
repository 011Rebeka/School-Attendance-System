<?php
require_once './dbcon.php';
$sid=base64_decode($_GET['id']);
$del_query="DELETE FROM `student_info` WHERE `id`='$sid'";
 $result=mysqli_query($link,$del_query);
 if($result){echo 'yes';
 header("location:index.php?page=all_students");}


?>