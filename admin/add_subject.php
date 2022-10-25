<?php 
//require_once './dbcon.php';
// session_start();

if(isset($_POST['add_new'])){
	 $subname=$_POST['subname'];
	 $class=$_POST['class'];
	 $teacher=ucwords($_POST['teacher']);
	 $section=$_POST['section'];
	$query="INSERT INTO `subject`(`subname`, `class`, `teacher`, `section`) VALUES ('$subname','$class','$teacher','$section')";
	$result=mysqli_query($link,$query);	
	if($result){
				$success="Subject Insert Successful!";
				//header("location:index.php?page=all_subject");
				} else {
						$error="Subject Insertion Failed!";
				}
						//if($result){$_SESSION['data_insert_success']= "Registration Successful!";
						//move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/'.$pic_name);}
	//$input_error=array();
}
?>




<h1 class="text-primary"><i class="fa fa-user-plus"></i> Add Subject <small>Add New Subject</small></h1>

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
				<label for="subname">Subject's Name</label>
				<input type="text" name="subname" placeholder="Subject's Name" id="subname" class="form-control" required="" />
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
					<option value="10th">Ten</option>
				</select>
			</div>
			<div class="form-group">
				<label for="section">Section</label>
				<input type="text" name="section" id="section" class="form-control" required="" />
			</div>
			<div class="form-group">
				<label for="teacher">Teachers's Name</label>
				<select name="teacher" id="teacher" class="form-control" required="">
					<option value="">Add Subject Teacher</option>
					<?php
			$name=mysqli_query($link,"SELECT * FROM `teachers`");
			while($row=mysqli_fetch_assoc($name)){
			?>
					<option value="<?php echo $row['id']; ?>"> <?php  echo ucwords($row['name']).'&nbsp&nbsp'.ucwords($row['designation']); ?> </option>
			<?php } ?>
				</select>
			</div>

			<!----------<div class="form-group">
				<label for="date_time">Date of entry</label>
				<input type="text" name="" placeholder="" id="" class="form-control" />
			</div> ------>
			<div class="form-group">
				<input type="submit" value="Add Subject" name="add_new" class="btn btn-primary pull-right" />
			</div>
		
		</form>
	</div>
</div>