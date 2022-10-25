<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>SMS</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <style>
.container{min-height:500px;}
img{width:100px;}
</style>

<script type="text/javascript" src="js/jquery-3.5.1.js"></script>
  <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="js/dataTables.bootstrap4.min.js"></script>
     <script type="text/javascript">
  jQuery(document).ready(function(){
	  jQuery('#posts').DataTable();
  })
  </script>
  </head>
  
  <body> 
    <div class="container">
	<?php include 'header.php';?>
	<?php
require_once './admin/dbcon.php';
$notice_id=$_GET['id']; 
$db_sinfo=mysqli_query($link,"SELECT * FROM `notice` WHERE `nid`='$notice_id'");
  while($row = mysqli_fetch_assoc($db_sinfo)) { ?>

<div class="row notice">
	<h1 class="text-center"><?php echo $row['title']; ?></h1>
<p> <?php echo $row['detail']; ?></p>
	<img class="img-fluid" alt="Responsive image" src="admin/notice/<?php echo $row["picture"]; ?>" />
</div>
  <?php

  }
?>
	
	
	</div>
	<br /><br />
<?php include 'admin/footer.php';?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<style type="text/css">
	.img-fluid{width:90%;}
	</style>
  </body>
</html>