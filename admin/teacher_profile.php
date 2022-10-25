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
require_once './dbcon.php';
$tid=base64_decode($_GET['id']);
$db_sinfo=mysqli_query($link,"SELECT * FROM `teachers` WHERE `id`='$tid'");
  while($row = mysqli_fetch_assoc($db_sinfo)) {
?>
<div class="row">
	<div class="col-sm-6">
		<table class="table table-bordered">
			<tr>
				<td>ID</td>
				<td><?php echo $row["id"]; ?></td>
			</tr>
			<tr>
				<td>Name</td>
				<td><?php echo ucwords($row["name"]); ?></td>
			</tr>
			<tr>
				<td>Designation</td>
				<td><?php echo $row["designation"]; ?></td>
			</tr>
			<tr>
				<td>Qualification</td>
				<td><?php echo $row["qualification"]; ?></td>
			</tr>
			<tr>
				<td>Date of Join</td>
				<td><?php echo $row["joindate"]; ?></td>
			</tr>
			<tr>
				<td>contact</td>
				<td><?php echo $row["contact"]; ?></td>
			</tr>
			<tr>
				<td>Address</td>
				<td><?php echo ucwords($row["address"]); ?></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><?php echo ucwords($row["tpw"]); ?></td>
			</tr>
			
			<?php if($row["class_teacher"]==1){ ?>
				<tr>
					<td> Class Teacher of:</td>
					<td>
					<strong>Class: </strong><?php echo ucwords($row["tclass"]).'</br>'; ?>
					<strong>Section: </strong><?php echo $row["tsec"].'</br>'; ?>
					<strong>From: </strong><?php echo $row["jdate"].'</br>'; ?>
					</td>
				</tr>
				<?php } ?> 
				
				
		</table>
	</div>



	<div class="col-sm-6">
		<a href="#"><img class="img-thumbnail" src="teachers/<?php echo $row["photo"]; ?>" alt="<?php echo ucwords($row["name"]); ?>" /></a>
		<br />
		<?php 
		if(isset($_POST['upload'])){
			$photo=explode('.',$_FILES['photo']['name']);
	$photo=end($photo);
	$gender=$row["gender"];
	$contact=$row["contact"];
	$pic_name=$gender.$contact.'.'.$photo;
	$upload=mysqli_query($link,"UPDATE `teachers` SET `photo`='$pic_name' WHERE `id`='$tid'");
	if($upload){
		echo $success="Profile picture is changed!";
				move_uploaded_file($_FILES['photo']['tmp_name'], 'teachers/'.$pic_name);
	}
			
		}
		?>
		<form action="" enctype="multipart/form-data" method="POST">
		<label for="photo">Change Profile Picture</label> <br />
		<input type="file" name="photo" id="photo" required="" /> <br />
		<input class="btn btn-sm btn-info" type="submit" name="upload" value="Upload" />
		
		</form>
		<br />
		<button type="button" id="toggle_button" onclick="myFunction()">Set Password</button>
		<script>
		function myFunction() {
  var x = document.getElementById("change_p");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
		</script>
		<div id="change_p" style="height:150px;width:100%; margin-top:10px;display:none;">
		<?php
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $length = 7;
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++)
    {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }//end loop
	if(isset($_POST['pupload'])){
 $tpw=$_POST['tpw'];

	if(strlen($tpw)>6){	
$query1="UPDATE `teachers` SET `tpw`='$tpw' WHERE `id`='$tid'";
	$result1=mysqli_query($link,$query1);	
	if($result1){
				 echo $success="Password Change Is Successful!";

				} else {
						echo $error="Password Update Failed!";
				}
	  
   }
}
?>
		<form action="" enctype="multipart/form-data" method="POST">
		<div class="form-group">
				<label for="tpw">New Password</label>
				<input type="text" name="tpw" value="<?php echo $randomString; ?>" id="address" class="form-control" required="" />
			</div>
		<input class="btn btn-sm btn-info" type="submit" name="pupload" value="Generate Password" />
		</form>
		</div> <!------change_p---->
	</div>
</div>
  <?php } ?>
	</div>
		 </div> <!---content--->
		</div>
	</div>


</div>
<br />
<?php include 'footer.php';?>
  </body>
</html>