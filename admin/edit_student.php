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
$sid=base64_decode($_GET['id']);
if(isset($_POST['update'])){
	
 $name=$_POST['name'];
 $roll=$_POST['roll'];
 $father=$_POST['father'];
	$mother=$_POST['mother'];
	$class=$_POST['class'];
	$section=$_POST['section'];
	$address=$_POST['address'];
	$contact=$_POST['contact'];
//$photo=explode('.',$_FILES['photo']['name']);
	//$photo=end($photo);
	//$pic_name=$roll.'.'.$photo;
	$datetime=date('d/m/y');
	$dob=$_POST['dob'];
	$query="UPDATE `student_info` SET `name`='$name',`father`='$father',`mother`='$mother',`roll`='$roll',`class`='$class',`section`='$section',`address`='$address',`contact`='$contact',`datetime`='$datetime',`dob`='$dob' WHERE `id`='$sid'";
	$result=mysqli_query($link,$query);	
	if($result){
				echo $success="Data Upadate Is Successful!";
				header("location:index.php?page=all_students");
				// move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/'.$pic_name);
				} else {
						echo $error="Data Update Failed!";
				}
						//if($result){$_SESSION['data_insert_success']= "Registration Successful!";
						//move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/'.$pic_name);}
	//$input_error=array();
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
		$show_query="SELECT * FROM `student_info` WHERE `id`='$sid'";
 $result=mysqli_query($link,$show_query);
 if($result){
 // header("location:index.php?page=all_students");
 while($row = mysqli_fetch_array($result)) {
		?>
		<h1 class="text-primary"><i class="fa fa-pencil"></i>Edit Student Information of &nbsp; <small><?php echo ucwords($row["name"]).'&nbsp;Class&nbsp;'.$row['class']; ?></small></h1>
<ol class="breadcrumb">
				<li><i class="fa fa-dashboard"></i> Dashboard</li>
			</ol>
		 <div class="content">
		 
		 	<div class="col-sm-8">
		<form action="" method="post" enctype="multipart/form-data">
			
			<div class="form-group">
				<label for="name">Student's Name</label>
				<input type="text" name="name" value="<?php echo $row['name']; ?>" id="name" class="form-control" required="" />
			</div>
			
			<div class="form-group">
				<label for="roll">Roll</label>
				<input type="text" name="roll" value="<?php echo $row['roll']; ?>" id="roll" class="form-control" pattern="[0-9]{6}" required="" />
			</div>
			<div class="form-group">
				<label for="dob">Date of Birth</label>
				<input type="date" name="dob"  value="<?php echo $row['dob']; ?>" id="dob" class="form-control" required="" />
			</div>
			<div class="form-group">
				<label for="father">Father's Name</label>
				<input type="text" name="father" value="<?php echo $row['father']; ?>" id="father" class="form-control" required="" />
			</div>
			
			<div class="form-group">
				<label for="mother">Mother's Name</label>
				<input type="text" name="mother" value="<?php echo $row['mother']; ?>" id="mother" class="form-control" required="" />
			</div>
			
			<div class="form-group">
				<label for="class">Class</label>
				<select name="class" id="class" class="form-control" required="" />
					<option value="<?php echo $row['class']; ?>"><?php echo $row['class']; ?></option>
					<option value="1st">One</option>
					<option value="2nd">Two</option>
					<option value="3rd">Three</option>
					<option value="4th">Four</option>
					<option value="5th">Five</option>
					<option value="6th">Six</option>
					<option value="7th">Seven</option>
					<option value="8th">Eight</option>
				</select>
			</div>
			
			<div class="form-group">
				<label for="section">Section</label>
				<input type="text" name="section" value="<?php echo $row['section']; ?>" id="section" class="form-control" required="" />
			</div>
			
			<div class="form-group">
				<label for="address">Address</label>
				<input type="text" name="address" value="<?php echo $row['address']; ?>" id="address" class="form-control" required="" />
			</div>
			
			<div class="form-group">
				<label for="contact">Contact Number</label>
				<input type="text" name="contact" value="<?php echo $row['contact']; ?>" id="contact" class="form-control" pattern="01[1|2|3|4|5|6|7|8|9][0-9]{8}" required="" />
			</div>
			
			<?php
              }
               }
			?>
			<!----------<div class="form-group">
				<label for="date_time">Date of entry</label>
				<input type="text" name="" placeholder="" id="" class="form-control" />
			</div> ------>
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