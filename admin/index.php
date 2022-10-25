<?php
session_start();
require_once './dbcon.php';
if(!isset($_SESSION['user_login'])){header('location:login.php');}
$username=$_SESSION['user_login'];
if($username=="admin123"){
$query="SELECT * FROM `users` WHERE `username`= '$username'";
$result=mysqli_query($link, $query);
$row=mysqli_fetch_assoc($result);
if(mysqli_num_rows($result)>0){
	$logged_user= $row['name'];
	$superadmin= $row['superadmin'];
}
}
else{
	$query="SELECT name FROM `teachers` WHERE `contact`= '$username'";
$result=mysqli_query($link, $query);
$row=mysqli_fetch_assoc($result);
if(mysqli_num_rows($result)>0){
	$logged_user= $row['name'];
}
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title><?php include 'title_tag.php';?></title>
<link href="style.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/font-awesome.css" rel="stylesheet">
	<link href="../css/dataTables.bootstrap4.min.css" rel="stylesheet">

<style>
.footer_area{text-align:center; padding:20px 0; background:#3ca9c8; color:#fff;}
.footer_area p{margin:0}
.content{min-height:600px;}
img{width:100px;}
</style>

<link href='DataTables/datatables.min.css' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" type="text/css" href="../css/jquery-ui.min.css">

        <!-- jQuery Library -->
        <script src="../js/jquery-3.4.1.min.js"></script>
		<script type="text/javascript" src="../js/jquery-ui.min.js"></script>

        <!-- Datatable JS -->
        <script src="DataTables/datatables.min.js"></script>
  <script type="text/javascript" src="../js/jquery-3.5.1.js"></script>
  <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="../js/dataTables.bootstrap4.min.js"></script>
     <script type="text/javascript">
  jQuery(document).ready(function(){
	  jQuery('#students').DataTable();
  })
  </script>
  </head>
  <body>
    <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      
      <a class="navbar-brand" href="../index.php"><?php include 'title_tag.php';?></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
      <?php include 'navbar.php';?>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-2">
			<div class="list-group">
   <?php include 'menu.php';?>
  
  
</div>
		</div>
		<div class="col-sm-10">
		 <div class="content">
		 
		 	<?php // require_once('dashboard.php'); 
			if(isset($_GET['page'])){
			$page= $_GET['page']; 
			$page_name=$page.'.php'; }
			else {$page_name="dashboard.php";}
			if(file_exists($page_name)){
			 require_once $page_name; 
			}
			else
			{require_once '404.php';}
			?>
		 </div> <!---content--->
		</div>
	</div>


</div>
<?php include 'footer.php';?>
  </body>
</html>