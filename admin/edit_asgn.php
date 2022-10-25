<script>
function showSubject(str) {
  if (str == "") {
    document.getElementById("asubject").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("asubject").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","getsubject.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>
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
	
 $date_submission=$_POST['date_submission'];	
 $asn_no=$_POST['asn_no'];
 $submit_to=$_POST['submit_to'];
 $asubject=$_POST['asubject'];
	$class=$_POST['class'];
	$section=$_POST['section'];
	$query="UPDATE `assignment` SET `date_submission`='$date_submission',`submit_to`='$submit_to',`asn_no`='$asn_no',`asubject`='$asubject',`class`='$class',`section`='$section' WHERE `aid`='$sid'";
	$result=mysqli_query($link,$query);	
	if($result){
				echo $success="Data Upadate Is Successful!";
				header("location:index.php?page=all_assignment");
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
		// $sid=$_GET['id'];
		$show_query="SELECT * FROM `assignment` WHERE `aid`='$sid'";
 $result=mysqli_query($link,$show_query);
 if($result){
 // header("location:index.php?page=all_students");
 while($row = mysqli_fetch_array($result)) {
		?>
		<h1 class="text-primary"><i class="fa fa-pencil"></i>Edit &nbsp; <small><?php echo ucwords($row["asn_no"]); ?></small></h1>
<ol class="breadcrumb">
				<li><i class="fa fa-dashboard"></i> Dashboard</li>
			</ol>
		 <div class="content">
		 
		 	<div class="col-sm-8">
		<form action="" method="post" enctype="multipart/form-data">
			
			<div class="form-group">
				<label for="asn_no">Assignment's Name</label>
				<input type="text" name="asn_no" value="<?php echo ucwords($row["asn_no"]); ?>" id="asn_no" class="form-control" required="" />
			</div>
			
			<div class="form-group">
				<label for="class">Class</label>
				<select name="class" id="class" onchange="showSubject(this.value)" class="form-control" required="" />
					<option value="<?php echo $row["class"]; ?>"><?php echo $row["class"]; ?></option>
					<option value="1st">One</option>
					<option value="2nd">Two</option>
					<option value="3rd">Three</option>
					<option value="4th">Four</option>
					<option value="5th">Five</option>
					<option value="6th">Six</option>
					<option value="7th">Seven</option>
					<option value="8th">Eight</option>
					<option value="9th">Nine</option>
				</select>
			</div>
			
			<div class="form-group">
				<label for="section">Section</label>
				<input type="text" name="section" value="<?php echo $row["section"]; ?>" id="section" class="form-control" required="" />
			</div>
			<div class="form-group">
				<label for="asubject">Subject</label>
				<select id="asubject" name="asubject">
					<option value="<?php echo ucwords($row["asubject"]); ?>"><?php echo ucwords($row["asubject"]); ?></option>
				</select>
			</div>
			<div class="form-group">
				<label for="date_submission">Date of Submission</label>
				<input type="date" value="<?php echo $row["date_submission"]; ?>" name="date_submission" id="date_submission" class="form-control" required="" />
			</div>
			<div class="form-group">
				<label for="submit_to">Teachers's Name</label>
				<select name="submit_to" id="submit_to" class="form-control" required="">
					<option value="<?php echo $row["submit_to"]; ?>"><?php echo $row["submit_to"]; ?></option>
					<?php
			$name=mysqli_query($link,"SELECT * FROM `teachers`");
			while($row=mysqli_fetch_assoc($name)){
			?>
					<option value="<?php echo $row["name"]; ?>"> <?php  echo ucwords($row["name"]).'&nbsp&nbsp'.ucwords($row['designation']); ?> </option>
			<?php } ?>
				</select>
			</div>
			<!---<div class="form-group">
				<label for="photo">Photo</label>
				<input type="file" name="photo" value="" id="photo" class="form-control" required="" />
			</div>--->
			
			<?php
              }
               }
			?>

			<div class="form-group">
				<input type="submit" value="Add Assignment" name="update" class="btn btn-primary pull-right" />
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