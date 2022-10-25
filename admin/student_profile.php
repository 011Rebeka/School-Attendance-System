<?php
session_start();
require_once './dbcon.php';
if(!isset($_SESSION['user_login'])){header('location:login.php');}
$username=$_SESSION['user_login'];
if($username=="admin123"){
$query="SELECT name FROM `users` WHERE `username`= '$username'";
$result=mysqli_query($link, $query);
$row=mysqli_fetch_assoc($result);
if(mysqli_num_rows($result)>0){
	$logged_user= $row['name'];
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
      
      <a class="navbar-brand" href="index.php"><?php include 'title_tag.php';?></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
      <ul class="nav navbar-nav navbar-right">
	    <li><a href="index.php?page=user_profile"><i class="fa fa-user"></i>Welcome <?php echo ucwords($logged_user); // echo $_SESSION['user_login']; ?></a></li>
	   
	    <li><a href="index.php?page=user_profile"><i class="fa fa-user"></i> Profile</a></li>
        <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
        
      </ul>
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
$sid=$_GET['id'];
$db_sinfo=mysqli_query($link,"SELECT * FROM `student_info` WHERE `id`='$sid'");
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
				<td>Roll</td>
				<td><?php echo $row["roll"]; ?></td>
			</tr>
			<tr>
				<td>Class</td>
				<td><?php echo $r= $row["class"]; ?></td>
			</tr>
			<tr>
				<td>Section</td>
				<td><?php echo $s=ucwords($row["section"]); ?></td>
			</tr>
			<tr>
				<td>Father</td>
				<td><?php echo ucwords($row["father"]); ?></td>
			</tr>
			<tr>
				<td>Mother</td>
				<td><?php echo ucwords($row["mother"]); ?></td>
			</tr>
			<tr>
				<td>Date of Birth</td>
				<td><?php echo $row["dob"]; ?></td>
			</tr>
			<tr>
				<td>Address</td>
				<td><?php echo $row["address"]; ?></td>
			</tr>
			<tr>
				<td>Contact</td>
				<td><?php echo $row["contact"]; ?></td>
			</tr>
			<tr>
				<td>Entry Date</td>
				<td><?php echo $row["datetime"]; ?></td>
			</tr>
			<?php /// find class teacher
	  $classteacher=mysqli_query($link,"SELECT * FROM `teachers` WHERE `tclass`='$r' AND `tsec`='$s'");
	  $count=mysqli_num_rows($classteacher);
	  if($count!=0){
	  while($rowt=mysqli_fetch_array($classteacher)) {$ct=$rowt['name']; $ctid=$rowt['id']; } ?>
			<tr>
	   <td>Class Teacher:</td>
	   <td> <a href="teacher_profile.php?id=<?php echo base64_encode($ctid); ?>"><?php echo ucwords($ct); ?></a></td>
			</tr>
			<tr>
			<a href="s_report.php?id=<?php echo base64_encode($sid); ?>">Attendence</a>
			</tr>
	  <?php } ?>	
		</table>
	</div>



	<div class="col-sm-6">
		<a href="#"><img class="img-thumbnail" src="uploads/<?php echo $row["photo"]; ?>" alt="<?php echo ucwords($row["name"]); ?>" /></a>
		<br />
		<?php 
		if(isset($_POST['upload'])){
			$photo=explode('.',$_FILES['photo']['name']);
	$photo=end($photo);
	$pic_name=$row["roll"].'.'.$photo;
	$upload=mysqli_query($link,"UPDATE `student_info` SET `photo`='$pic_name' WHERE `id`='$sid'");
	if($upload){
		echo $success="Profile picture is changed!";
				move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/'.$pic_name);
	}
			
		}
		?>
		<form action="" enctype="multipart/form-data" method="POST">
		<label for="photo">Change Profile Picture</label> <br />
		<input type="file" name="photo" id="photo" required="" /> <br />
		<input class="btn btn-sm btn-info" type="submit" name="upload" value="Upload" />
		
		</form>
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