<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>SAAS</title>

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
$asn_id=$_GET['id']; 
$db_sinfo=mysqli_query($link,"SELECT * FROM `assignment` WHERE `aid`='$asn_id'");
  while($row = mysqli_fetch_assoc($db_sinfo)) { ?>

<div class="row notice">
<button class="btn btn-primary " onclick="window.print()">Print</button>
<table>
	<tr>
	<h3><a href="asgn_detail.php?id=<?php echo $row["aid"]; ?>"><?php echo ucwords($row["asn_no"]); ?></a></h3>
						<h4><strong>Class: </strong><?php echo $row["class"]; ?></h4>
						<h4><strong>Section: </strong><?php echo ucwords($row["section"]); ?></h4>
						<h4><strong>Subject: </strong><?php echo $row["asubject"]; ?></h4>
		
						<h4><strong>Submitted to: </strong><?php echo $sto=ucwords($row["submit_to"]); ?></h4>
						
						<h4><strong>Date for Submission: </strong><?php echo $row["date_submission"]; ?></h4>
	</tr>
	<tr>
	<img class="img-fluid" alt="Responsive image" src="admin/uploads/<?php echo $row["ques"]; ?>" />
	</tr>
</table>
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