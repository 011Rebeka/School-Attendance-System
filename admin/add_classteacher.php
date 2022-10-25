<?php 
//require_once './dbcon.php';
// session_start();

if(isset($_POST['add_new'])){
	 $tid=$_POST['tname'];
	 $tclass=$_POST['tclass'];
	 $tsection=ucwords($_POST['tsection']);
	 $jdate=$_POST['jdate'];
	$t_info= '1';
	$query="UPDATE `teachers` SET `class_teacher`='1',`tclass`='$tclass',`tsec`='$tsection',`jdate`='$jdate' WHERE `id`='$tid'";
	$result=mysqli_query($link,$query);	
	if($result){
				$success="Data Insert Successful!";
				// header("location:index.php?page=all_class_teachers");
				} else {
						$error="Data Insertion Failed!";
				}
						//if($result){$_SESSION['data_insert_success']= "Registration Successful!";
						//move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/'.$pic_name);}
	//$input_error=array();
}
?>




<h1 class="text-primary"><i class="fa fa-user-plus"></i> Add Class Teachers <small>Add New Teacher</small></h1>

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
				<label for="tclass">Class</label>
				<select name="tclass" id="tclass" class="form-control" required="" />
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
				<label for="tsection">Section</label>
				<input type="text" name="tsection" id="tsection" class="form-control" required="" />
			</div>

			
			<div class="form-group">
				<label for="name">Teachers's Name</label>
				<select name="tname" id="tname" class="form-control" required="">
					<option value="">Add Class Teacher</option>
					<?php
			$name=mysqli_query($link,"SELECT * FROM `teachers` WHERE `class_teacher`='0'");
			while($row=mysqli_fetch_assoc($name)){
			?>
					<option value="<?php echo $row['id']; ?>"> <?php  echo ucwords($row['name']).'&nbsp&nbsp'.ucwords($row['designation']); ?> </option>
			<?php } ?>
				</select>
			</div>

			<div class="form-group">
				<label for="jdate">Date of Join</label>
				<input type="date" name="jdate" id="jdate" class="form-control" />
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