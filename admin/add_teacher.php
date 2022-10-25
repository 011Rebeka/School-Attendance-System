<?php 
//require_once './dbcon.php';
// session_start();

if(isset($_POST['add_new'])){
$str="abcdefghijklmn";
$shuffled = str_shuffle($str);
$tpw=substr($shuffled,4);
 $name=$_POST['name'];
 $gender=$_POST['gender'];
 $designation=$_POST['designation'];
 $qualification=$_POST['qualification'];
	$doj=$_POST['doj'];
	$contact=$_POST['contact'];
	$address=$_POST['address'];
	$class_teacher="0";
$photo=explode('.',$_FILES['photo']['name']);
	$photo=end($photo);
	$pic_name=$gender.$contact.'.'.$photo;
	// $datetime=date('d/m/y');
	// $dob=$_POST['dob'];
	$query="INSERT INTO `teachers`(`name`,`gender`, `designation`, `qualification`, `joindate`, `contact`, `address`,`class_teacher`,`photo`,`tpw`) VALUES ('$name','$gender','$designation','$qualification','$doj','$contact','$address',$class_teacher,'$pic_name','$tpw')";
	$result=mysqli_query($link,$query);	
	if($result){
				$success="Data Insert Successful!";
				move_uploaded_file($_FILES['photo']['tmp_name'], 'teachers/'.$pic_name);
				} else {
						$error="Data Insertion Failed!";
				}
						//if($result){$_SESSION['data_insert_success']= "Registration Successful!";
						//move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/'.$pic_name);}
	//$input_error=array();
}

?>




<h1 class="text-primary"><i class="fa fa-user-plus"></i> Add Teachers <small>Add New Teacher</small></h1>

<ol class="breadcrumb">
				<li><i class="fa fa-dashboard"></i> Dashboard</li>
			</ol>
			<div class="row">
			<?php if(isset($success)){echo '<p class="alert alert-success col-sm-6">'.$success.'</p>'; } ?>
			<?php if(isset($error)){echo '<p class="alert alert-warning col-sm-6">'.$error.'</p>'; } ?>
			</div>
<div class="row">
	<div class="col-sm-8">
		<form action="" method="post" enctype="multipart/form-data">
			
			<div class="form-group">
				<label for="name">Teachers's Name</label>
				<input type="text" name="name" placeholder="Teachers's Name" id="name" class="form-control" required="" />
			</div>
			<div class="form-group">
				<label for="gender">Gender</label> <br />
  <input type="radio" id="male" name="gender" value="Male">
  <label for="male">Male</label><br>
  <input type="radio" id="female" name="gender" value="Female">
  <label for="female">Female</label>
			</div>
			<div class="form-group">
				<label for="roll">Designation</label>
				<input type="text" name="designation" placeholder="Designation" id="designation" class="form-control" required="" />
			</div>
			<div class="form-group">
				<label for="qualification">Qualification</label>
				<input type="text" name="qualification" placeholder="Qualification" id="qualification" class="form-control" required="" />
			</div>
			<div class="form-group">
				<label for="dob">Date of Join</label>
				<input type="date" name="doj" id="doj" class="form-control" />
			</div>
						<div class="form-group">
				<label for="contact">Contact Number</label>
				<input type="text" name="contact" placeholder="01*******" id="contact" class="form-control" pattern="01[1|2|3|4|5|6|7|8|9][0-9]{8}" required="" />
			</div>
			<div class="form-group">
				<label for="address">Address</label>
				<input type="text" name="address" placeholder="Address" id="address" class="form-control" required="" />
			</div>			
			<div class="form-group">
				<label for="photo">Photo</label>
				<input type="file" name="photo" placeholder="" id="photo" class="form-control" required="" />
			</div>
			
			<!----------<div class="form-group">
				<label for="date_time">Date of entry</label>
				<input type="text" name="" placeholder="" id="" class="form-control" />
			</div> ------>
			<div class="form-group">
				<input type="submit" value="Add Teacher" name="add_new" class="btn btn-primary pull-right" />
			</div>
		
		</form>
	</div>
</div>