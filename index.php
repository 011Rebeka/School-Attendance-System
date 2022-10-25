<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>SAAS</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <style>
    .container{min-height:100px;}
    img{width:100px;}
	.pull-right{margin-left:4px;}
    </style>

<script type="text/javascript" src="js/jquery-3.5.1.js"></script>
  <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="js/dataTables.bootstrap4.min.js"></script>
     <script type="text/javascript">
  jQuery(document).ready(function(){
	  jQuery('#posts').DataTable();
  })
  </script>
  </head>
  <body> 
    <div class="container">
	<?php include 'header.php';?>
	
	<a class="btn btn-primary pull-right" href="admin/login.php">Admin Login</a>

	<a class="btn btn-primary pull-right" href="admin/teacher_login.php">Teacher Login</a>
	<!------<h1 class="text-center">SAAS</h1> ------->

			<div class="col-sm-8">
			<h2 class="text-center">Notice Board</h2>
			<div class="table-responsive">
				<table id="posts" class="table table-hover table-bordered table-striped">
					<thead>
						<tr>
							<td><h4>Title</h4></td>
							<td><h4>Details</h4></td>
						</tr>
					</thead>

					<tbody>
					<?php 
			$db_sinfo=mysqli_query($link,"SELECT * FROM `notice`");
			while($row = mysqli_fetch_assoc($db_sinfo)) { ?>
					<tr>
						<td><h4><a href="admin/notice/<?php echo $row["picture"]; ?>"><?php echo ucwords($row["title"]); ?></a></h4></td>
						<td> <p><?php echo ucwords($row["detail"]); ?></p>  
						<a href="view_routine.php?page=<?php echo $row["picture"]; ?>"><image src="admin/notice/<?php echo $row["picture"]; ?>" alt="avater"></image></a>
						</td>
					</tr>
			<?php } ?>
					</tbody>

				</table>
				</div> <!---table-responsive--->
			</div> <!---- col-sm-8 ---->

			
<!-----------saas find-------------->
<br /><br /> <br /><br />
<div class="row">
			<div class="col-sm-4">
				<form action="" method="POST">
		<table class="table table-bordered">
			<tr>
				<td class="text-center" colspan="2"><label>Student Information</label></td>
				
			</tr>
			<tr>
				<td><label for="choose"> Choose Class</label></td>
				<td>
					<select class="form-control" name="choose" id="choose" required>
					<option value="">Select</option>
					<option value="1st">1st</option>
					<option value="2nd">2nd</option>
					<option value="3rd">3rd</option>
					<option value="4th">4th</option>
					<option value="5th">5th</option>
					<option value="6th">6th</option>
					<option value="7th">7th</option>
					<option value="8th">8th</option>
					<option value="9th">9th</option>
					</select>
				</td>
			</tr>
			<tr>
				<td><label for="roll">Roll</label></td>
				<td><input class="form-control" type="text" name="roll" placeholder="012345" pattern=[0-9]{6} /></td>
			</tr>
			<tr>
				<td class="text-center" colspan="2"><input class='btn btn-info' type="submit" value="Show Information" name="show_info" /></td>
			</tr>
		</table>
	</form>
			</div>	
		<?php
		require_once './admin/dbcon.php';
		if(isset($_POST['show_info'])){ 
		$class=$_POST['choose'];
		$roll=$_POST['roll'];
			$result=mysqli_query($link,"SELECT * FROM `student_info` WHERE `class`= '$class' and `roll`= '$roll'");
			if(mysqli_num_rows($result)>0) {
				while($row = mysqli_fetch_assoc($result)) {
		
		?>
			
	<!----	<div class="row"> --->
			<div class="col-sm-4">
			<?php if(isset($notfound)){echo $notfound;} ?>
				<table class="table table-bordered">
					<tr><td rowspan="7"><img style="width:150px;" src="admin/uploads/<?php echo $row['photo']; ?>" alt="Avater" class="img-thumbnail" /></td></tr>
					<tr>
						<td>Name</td>
						<td><?php echo $row['name']; ?></td>
					</tr>
					
					<tr>
						<td>Roll</td>
						<td><?php echo $row['roll']; ?></td>
					</tr>
					
					<tr>
						<td>Class</td>
						<td><?php echo $row['class']; ?></td>
					</tr>
					
					<tr>
						<td>Section</td>
						<td><?php echo $row['section']; ?></td>
					</tr>
					
					<tr>
						<td>Father</td>
						<td><?php echo $row['father']; ?></td>
					</tr>
					
					<tr>
						<td>Mother</td>
						<td><?php echo $row['mother']; ?></td>
					</tr>
					
				</table>
			</div>
	<!--- 	</div>  row-->
		<?php 
			}
				} 
			
			else {echo $notfound= 'No Data Is Found';}
		}
		?>		
					
		</div> <!-----------saas find form end------------->
		
<!-- ---------------assignment--------- -->


<div class="col-sm-8">
			<h2 class="text-center">Assignment Board</h2>
			<div class="table-responsive">
				<table id="posts" class="table table-hover table-bordered table-striped">
					<thead>
						<tr>
							<td><h4>Details</h4></td>
							<td><h4>Thumbnail</h4></td>
							<td><h4>Action</h4></td>
						</tr>
					</thead>
					<tbody>
					<?php 
			$db_sinfo=mysqli_query($link,"SELECT * FROM `assignment`");
			while($row = mysqli_fetch_assoc($db_sinfo)) { ?>
					<tr>
						<td>
						<h3><a href="assignment_detail.php?id=<?php echo $row["aid"]; ?>"><?php echo ucwords($row["asn_no"]); ?></a></h3>
						<h4><strong>Class: </strong><?php echo $row["class"]; ?></h4>
						<h4><strong>Section: </strong><?php echo ucwords($row["section"]); ?></h4>
						<h4><strong>Subject: </strong><?php echo $row["asubject"]; ?></h4>
		
						<h4><strong>Submitted to: </strong><?php echo $sto=ucwords($row["submit_to"]); ?></h4>
						
						<h4><strong>Date for Submission: </strong><?php echo $row["date_submission"]; ?></h4>
						</td>
						
						<td> <image src="admin/uploads/<?php echo $row["ques"]; ?>" alt="avater"></image> </td>
						</td>
	
					</tr>
			<?php } ?>
					</tbody>

				</table>
				</div> <!---table-responsive--->
			</div> <!---- col-sm-8 ---->		
	</div>

	<br /><br />
<?php include 'admin/footer.php';?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>