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
//require_once './dbcon.php';
// session_start();

if(isset($_POST['add_new'])){
 $date_submission=$_POST['date_submission'];	
 $asn_no=$_POST['asn_no'];
 $submit_to=$_POST['submit_to'];
 $asubject=$_POST['asubject'];
	$class=$_POST['class'];
	$section=$_POST['section'];
	$photo=explode('.',$_FILES['photo']['name']);
	$photo=end($photo);
	$pic_name=$class.$section.$asubject.$asn_no.'.'.$photo;
	$query="INSERT INTO `assignment`(`date_submission`, `submit_to`, `asn_no`, `ques`, `asubject`, `class`, `section`) VALUES ('$date_submission','$submit_to','$asn_no','$pic_name','$asubject','$class','$section')";
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




<h1 class="text-primary"><i class="fa fa-user-plus"></i> Add Assignment <small>Add New Assignment</small></h1>

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
				<label for="asn_no">Assignment's Name</label>
				<input type="text" name="asn_no" placeholder="Assignment's Name" id="asn_no" class="form-control" required="" />
			</div>
			
			<div class="form-group">
				<label for="class">Class</label>
				<select name="class" id="class" onchange="showSubject(this.value)" class="form-control" required="" />
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
				<label for="submit_to">Teachers's Name</label>
				<select name="submit_to" id="submit_to" class="form-control" required="">
					<option value="">Add Subject Teacher</option>
					<?php
			$name=mysqli_query($link,"SELECT * FROM `teachers`");
			while($row=mysqli_fetch_assoc($name)){
			?>
					<option value="<?php echo $row['name']; ?>"> <?php  echo ucwords($row['name']).'&nbsp&nbsp'.ucwords($row['designation']); ?> </option>
			<?php } ?>
				</select>
			</div>

			<div class="form-group">
				<label for="asubject">Subject</label>
				<select id="asubject" name="asubject">
					<option value="">Select Subject</option>
				</select>
			</div>
			
			<div class="form-group">
				<label for="date_submission">Date of Submission</label>
				<input type="date" name="date_submission" id="date_submission" class="form-control" required="" />
			</div>
			<div class="form-group">
				<label for="photo">Photo</label>
				<input type="file" name="photo" placeholder="" id="photo" class="form-control" required="" />
			</div>
			
			<div class="form-group">
				<label for="date_time">Date of entry</label>
				<input type="text" name="" placeholder="" id="" class="form-control" />
			</div>  

			 <div class="form-group">
				<input type="submit" value="Add Assignment" name="add_new" class="btn btn-primary pull-right" />
			</div>
		
		</form>
	</div>
</div>