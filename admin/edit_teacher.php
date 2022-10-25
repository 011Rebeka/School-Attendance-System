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
<?php
 $tid=base64_decode($_GET['id']);
if(isset($_POST['update'])){
 $name=$_POST['name'];
  $gender=$_POST['gender'];
 $designation=$_POST['designation'];
	$qualification=$_POST['qualification'];
	$joindate=$_POST['joindate'];
	$contact=$_POST['contact'];
	$address=$_POST['address'];
	$query="UPDATE `teachers` SET `name`='$name',`gender`='$gender',`designation`='$designation',`qualification`='$qualification',`joindate`='$joindate',`contact`='$contact',`address`='$address' WHERE `id`='$tid'";
	$result=mysqli_query($link,$query);	
	if($result){
				 $success="Data Upadate Is Successful!";
				 if($username=="admin123"){
				header("location:index.php?page=all_teachers");
				 }
				 else { header("location:index.php?page=teacher_zone");}
				// move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/'.$pic_name);
				} else {
						echo $error="Data Update Failed!";
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
    <title>SAAS</title>
<link href="style.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/font-awesome.css" rel="stylesheet">
	<link href="../css/dataTables.bootstrap4.min.css" rel="stylesheet">

<style>
.footer_area{text-align:center; padding:20px 0; background:#3ca9c8; color:#fff;}
.footer_area p{margin:0}
.content{min-height:450px;}
img{width:100px;}
</style>

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
      
      <a class="navbar-brand" href="index.php">SAAS</a>
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
		<?php 
		// $sid=$_GET['id'];
		$show_query="SELECT * FROM `teachers` WHERE `id`='$tid'";
 $result=mysqli_query($link,$show_query);
 if($result){
 // header("location:index.php?page=all_students");
 while($row = mysqli_fetch_array($result)) {
		?>
		<h1 class="text-primary"><i class="fa fa-pencil"></i>Edit Teacher Information of &nbsp; <small><?php echo ucwords($row["name"]); ?></small></h1>
<ol class="breadcrumb">
<p><?php //  echo $success; ?></p>
				<li><i class="fa fa-dashboard"></i> Dashboard</li>
			</ol>
		 <div class="content">
		 
		 	<div class="col-sm-8">
		<form action="" method="post" enctype="multipart/form-data">
			
			<div class="form-group">
				<label for="name">Teacher's Name</label>
				<input type="text" name="name" value="<?php echo $row['name']; ?>" id="name" class="form-control" required="" />
			</div>
			<div class="form-group">
				<label for="roll">Gender</label>
				<input type="text" name="gender" value="<?php echo $row['gender']; ?>" id="gender" class="form-control" required="" />
			</div>
			<div class="form-group">
				<label for="designation">Designation</label>
				<input type="text" name="designation" value="<?php echo $row['designation']; ?>" id="designation" class="form-control" required="" />
			</div>
			<div class="form-group">
				<label for="qualification">Qualification</label>
				<input type="text" name="qualification" value="<?php echo $row['qualification']; ?>" id="qualification" class="form-control" required="" />
			</div>
			
			<div class="form-group">
				<label for="joindate">Date of Join</label>
				<input type="text" name="joindate"  value="<?php echo $row['joindate']; ?>" id="joindate" class="form-control" required="" />
			</div>
			
			<div class="form-group">
				<label for="contact">Contact Number</label>
				<input type="text" name="contact" value="<?php echo $row['contact']; ?>" id="contact" class="form-control" pattern="01[1|2|3|4|5|6|7|8|9][0-9]{8}" required="" />
			</div>
			<div class="form-group">
				<label for="address">Address</label>
				<input type="text" name="address" value="<?php echo $row['address']; ?>" id="address" class="form-control" required="" />
			</div>
			<?php
              }
               }
			?>
		
			<div class="form-group">
				<input type="submit" value="Save Changes" name="update" class="btn btn-primary pull-right" />
			</div>
		
		</form>
	</div>
		 </div> <!---content--->
		</div>
	</div>


</div>
<br />
<?php include 'footer.php';?>
  </body>
</html>