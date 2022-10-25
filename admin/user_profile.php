
<h1 class="text-primary"><i class="fa fa-user"></i> Admin Profile <small><?php echo ucwords($row["name"]); ?></small></h1>
			<ol class="breadcrumb">
				<li><a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard </a></li>
			</ol>
			
<?php
$username=$_SESSION['user_login'];
$db_sinfo=mysqli_query($link,"SELECT * FROM `users` WHERE `username`='$username'");
  while($row = mysqli_fetch_assoc($db_sinfo)) {
?>
<div class="row">
	<div class="col-sm-6">
		<table class="table table-bordered">
			<tr>
				<td>User ID</td>
				<td><?php echo $row["id"]; ?></td>
			</tr>
			<tr>
				<td>Name</td>
				<td><?php echo ucwords($row["name"]); ?></td>
			</tr>
			<tr>
				<td>Username</td>
				<td><?php echo $username; ?></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><?php echo $row["email"]; ?></td>
			</tr>
			<tr>
				<td>Status</td>
				<td><?php echo ucwords($row["status"]); ?></td>
			</tr>
			<tr>
				<td>Entry Date</td>
				<td><?php echo $row["entry_date"]; ?></td>
			</tr>
		</table>
		<a class="btn btn-sm pull-right btn-info" href="edit_user_profile.php?id=<?php echo $row['id']; ?>">Edit Profile</a>
	</div>



	<div class="col-sm-6">
		<a href="#"><img class="img-thumbnail" src="images/<?php echo $row["photo"]; ?>" alt="<?php echo ucwords($row["photo"]); ?>" /></a>
		<br />
		<?php 
		if(isset($_POST['upload'])){
			$photo=explode('.',$_FILES['photo']['name']);
	$photo=end($photo);
	$pic_name=$username.'.'.$photo;
	$upload=mysqli_query($link,"UPDATE `users` SET `photo`='$pic_name' WHERE `username`='$username'");
	if($upload){
		echo $success="Profile picture is changed!";
				move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$pic_name);
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