<?php 
//require_once './dbcon.php';
// session_start();

if(isset($_POST['add_new'])){
	
 $title=$_POST['title'];
 $detail=$_POST['detail'];
$photo=explode('.',$_FILES['picture']['name']);
	$photo=end($photo);
	$pic_name=$title.'.'.$photo;
	// $datetime=date('d/m/y');
	// $dob=$_POST['dob'];
	$query="INSERT INTO `notice`(`title`, `detail`, `picture`) VALUES ('$title','$detail','$pic_name')";
	$result=mysqli_query($link,$query);	
	if($result){
				$success="Data Insert Successful!";
				move_uploaded_file($_FILES['picture']['tmp_name'], 'notice/'.$pic_name);
				} else {
						$error="Data Insertion Failed!";
				}
						//if($result){$_SESSION['data_insert_success']= "Registration Successful!";
						//move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/'.$pic_name);}
	//$input_error=array();
}

?>




<h1 class="text-primary"><i class="fa fa-user-plus"></i> Add Routine <small>Add New Routine</small></h1>

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
				<label for="title">Class</label>
				<select name="title" id="title" class="form-control" required="" />
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
				<label for="detail">Section</label>
				<input type="text" name="detail" placeholder="Section" id="detail" class="form-control" required="" />
			</div>
			<div class="form-group">
				<label for="picture">Photo</label>
				<input type="file" name="picture" placeholder="" id="picture" class="form-control"/>
			</div>
			
			<!----------<div class="form-group">
				<label for="date_time">Date of entry</label>
				<input type="text" name="" placeholder="" id="" class="form-control" />
			</div> ------>
			<div class="form-group">
				<input type="submit" value="Add Notice" name="add_new" class="btn btn-primary pull-right" />
			</div>
		
		</form>
	</div>
</div>