
<div class="container-fluid">

	<div class="row">
	
		<div class="col-sm-10">
		<?php
require_once './dbcon.php';
$contact=$username;
$db_sinfo=mysqli_query($link,"SELECT * FROM `teachers` WHERE `contact`='$contact'");
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
			<tr>
				<td>Password</td>
				<td><?php echo $row["tpw"]; ?></td>
			</tr>
			<tr>
			<td><a class="btn btn-xs btn-warning" href="edit_teacher.php?id=<?php echo base64_encode($row['id']); ?>"><i class="fa fa-pencil"></i>Edit</a>	
			</td>
			</tr>
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
	$upload=mysqli_query($link,"UPDATE `teachers` SET `photo`='$pic_name' WHERE `contact`='$contact'");
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
		<button type="button" id="toggle_button" onclick="myFunction()">Change Password</button>
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
		<div id="change_p" style="height:150px;width:100%; margin-top:10px; display:none;">
		<?php
if(isset($_POST['pupload'])){
	echo $old=$row['tpw'];
$tpw=$_POST['tpw'];
$c_password=$_POST['c_password'];
$oldpw=$_POST['oldpw'];
	if(strlen($tpw)>6){
		if($oldpw==$old){
				if($tpw==$c_password){
$query="UPDATE `teachers` SET `tpw`='$tpw' WHERE `contact`='$contact'";
	$result=mysqli_query($link,$query);	
	if($result){
				 echo $success="Password Change Is Successful!";

				} else {
						echo $error="Password Update Failed!";
				}
			}
		}
	}
}

?>
		<form action="" enctype="multipart/form-data" method="POST">
		<div class="form-group">
				<label for="tpw">Old Password</label>
				<input type="password" name="oldpw" value="" id="address" class="form-control" required="" />
			</div>
		<div class="form-group">
				<label for="tpw">New Password</label>
				<input type="password" name="tpw" value="" id="address" class="form-control" required="" />
			</div>
			<div class="form-group">
				<label for="tpw">Confirm Password</label>
				<input type="password" name="c_password" value="" id="address" class="form-control" required="" />
			</div>
		<input class="btn btn-sm btn-info" type="submit" name="pupload" value="Change Password" />
		</form>
		</div>
	</div>
</div>
  <?php } ?>
	</div>
		 </div> <!---content--->
		</div>
