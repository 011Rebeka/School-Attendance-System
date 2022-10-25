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
$uid=$_GET['id'];
if(isset($_POST['update'])){
	
 echo $name=$_POST['name'];
 echo $email=$_POST['email'];
 
 $query="UPDATE `users` SET `name`='$name',`email`='$email' WHERE `id`='$uid'";
	$result=mysqli_query($link,$query);	
	if($result){
				echo $success="Data Upadate Is Successful!";
				header("location:index.php?page=user_profile");
				// move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/'.$pic_name);
				} else {
						echo $error="Data Update Failed!";
				}
						//if($result){$_SESSION['data_insert_success']= "Registration Successful!";
						//move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/'.$pic_name);}

 
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>SMS</title>
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
      
      <a class="navbar-brand" href="index.php">SMS</a>
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
		
		$show_query="SELECT * FROM `users` WHERE `id`='$uid'";
 $result=mysqli_query($link,$show_query);
 if($result){
 // header("location:index.php?page=all_students");
  while($row = mysqli_fetch_array($result)) {
		?>
		<h1 class="text-primary"><i class="fa fa-pencil"></i>Edit User Information of &nbsp; <small><?php echo ucwords($logged_user); ?></small></h1>
<ol class="breadcrumb">
				<li><i class="fa fa-dashboard"></i> Dashboard</li>
			</ol>
		 <div class="content">
		 
		 	<div class="col-sm-8">
		<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
					<div class="form-group">
					   <label class="control-label col-sm-1" for="name">Name</label>
					   <div class="col-sm-4">
					   <input id="name" class="form-control" type="text" name="name" value="<?php echo ucwords($row["name"]); ?>" required   />
					   </div>
	
					</div>
					
					<div class="form-group">
					   <label class="control-label col-sm-1" for="email">Email</label>
					   <div class="col-sm-4">
					   <input id="email" class="form-control" type="email" name="email" placeholder="Enter Your Email Address" value= "<?php echo $row["email"]; ?>" required />
					   </div>
					</div>
  <?php } } ?>		
					<div class="col-sm-4 col-sm-offset-1">
						<input type="submit" value="Update" name="update" class="btn btn-primary" />
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