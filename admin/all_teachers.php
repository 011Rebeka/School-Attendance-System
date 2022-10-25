<div class="table-responsive">
<h1 class="text-primary"><i class="fa fa-users"></i>All Teachers <small>All New Teachers</small></h1>
<ol class="breadcrumb">
				<li><i class="fa fa-dashboard"></i> Dashboard</li>
			</ol>
	<table id="students" class="table table-hover table-bordered table-striped">
		<thead>
			<tr>
				<td>ID</td>
				<td>Name</td>
				<td>Class Teacher Status</td>
				<td>Date of Join</td>
				<td>Address and Contact</td>
				<td>Photo</td>
				<td>Action</td>
			</tr>
		</thead>
		<tbody>
			<?php 
			$db_sinfo=mysqli_query($link,"SELECT * FROM `teachers`");
  while($row = mysqli_fetch_assoc($db_sinfo)) { ?>
			
			<tr>
				<td><?php echo $row["id"]; ?></td>
				<td><a href="teacher_profile.php?id=<?php echo base64_encode($row["id"]); ?>"><?php echo ucwords($row["name"]); ?></a>
					<br /><br />
					<strong>Designation: </strong> <?php echo ucwords($row["designation"]); ?>
					<br /><br />
					<strong>Qualification: </strong> <?php echo ucwords($row["qualification"]); ?>
				</td>
				<td><?php echo ucwords($row["class_teacher"]); ?> </td>
				<td><?php echo $row["joindate"]; ?></td>
				<td><?php echo ucwords($row["address"]); ?> <br /><br /> 
				<strong>Contact:</strong> <?php echo $row["contact"]; ?> </td>
				<td> <image src="teachers/<?php echo $row["photo"]; ?>" alt="avater"></image></td>
				
				<td><a class="btn btn-xs btn-warning" href="edit_teacher.php?id=<?php echo base64_encode($row['id']); ?>"><i class="fa fa-pencil"></i>Edit</a>
					<a onClick="javascript: return confirm('Please confirm deletion: <?php echo ucwords($row["name"]);?>');" class="btn btn-xs btn-danger" href="delete_teacher.php?id=<?php echo base64_encode($row['id']); ?>"><i class="fa fa-trash"></i>Delete</a>
				</td>
				
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div> <!----table responsive----->