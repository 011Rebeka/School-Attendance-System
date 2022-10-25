<?php 
//require_once './dbcon.php';
// session_start();

if(isset($_POST['add_new'])){
	
 $name=$_POST['name'];
 $roll=$_POST['roll'];
 $father=$_POST['father'];
	$mother=$_POST['mother'];
	$class=$_POST['class'];
	$section=$_POST['section'];
	$address=$_POST['address'];
	$contact=$_POST['contact'];
$photo=explode('.',$_FILES['photo']['name']);
	$photo=end($photo);
	$pic_name=$roll.'.'.$photo;
	$datetime=date('d/m/y');
	$dob=$_POST['dob'];
	$query="INSERT INTO `student_info`(`name`, `father`, `mother`, `roll`, `class`, `section`, `address`, `contact`, `photo`, `datetime`,`dob`) VALUES ('$name','$father','$mother','$roll','$class','$section','$address','$contact','$pic_name','$datetime','$dob')";
	$result=mysqli_query($link,$query);	
	if($result){
				$success="Data Insert Successful!";
				move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/'.$pic_name);
				} else {
						$error="Data Insertion Failed!";
				}
						//if($result){$_SESSION['data_insert_success']= "Registration Successful!";
						//move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/'.$pic_name);}
	//$input_error=array();
}

?>




<h1 class="text-primary"><i class="fa fa-user-plus"></i> Add Students <small>Add New Students</small></h1>

<ol class="breadcrumb">
				<li><i class="fa fa-dashboard"></i> Dashboard</li>
				<li>Roll Selection guide: Class= 01, Year=22, Serial= 01. </li>
				<li>So Roll: 220101</li>
			</ol>
			<div class="row">
			<?php if(isset($success)){echo '<p class="alert alert-success col-sm-6">'.$success.'</p>'; } ?>
			<?php if(isset($error)){echo '<p class="alert alert-warning col-sm-6">'.$error.'</p>'; } ?>
			</div>
<div class="row">
	<div class="col-sm-8">
		<form action="" method="post" enctype="multipart/form-data">
			
			<div class="form-group">
				<label for="name">Student's Name</label>
				<input type="text" name="name" placeholder="Student's Name" id="name" class="form-control" required="" />
			</div>
			
			<div class="form-group">
				<label for="roll">Roll</label>
				<input type="text" name="roll" placeholder="Roll" id="roll" class="form-control" pattern="[0-9]{6}" required="" />
			</div>
			<div class="form-group">
				<label for="dob">Date of Birth</label>
				<input type="date" name="dob" placeholder="Student's Name" id="dob" class="form-control" required="" />
			</div>
			<div class="form-group">
				<label for="father">Father's Name</label>
				<input type="text" name="father" placeholder="Father's Name" id="father" class="form-control" required="" />
			</div>
			
			<div class="form-group">
				<label for="mother">Mother's Name</label>
				<input type="text" name="mother" placeholder="Mother's Name" id="mother" class="form-control" required="" />
			</div>
			
			<div class="form-group">
				<label for="class">Class</label>
				<select name="class" id="class" class="form-control" required="" />
					<option value="">Select</option>
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
				<input type="text" name="section" placeholder="Section" id="section" class="form-control" required="" />
			</div>
			
			<div class="form-group">
				<label for="address">Address</label>
				<input type="text" name="address" placeholder="Address" id="address" class="form-control" required="" />
			</div>
			
			<div class="form-group">
				<label for="contact">Contact Number</label>
				<input type="text" name="contact" placeholder="01*******" id="contact" class="form-control" pattern="01[1|2|3|4|5|6|7|8|9][0-9]{8}" required="" />
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
				<input type="submit" value="Add Student" name="add_new" class="btn btn-primary pull-right" />
			</div>
		
		</form>
	</div>
</div>