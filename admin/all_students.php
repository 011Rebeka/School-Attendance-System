<div class="table-responsive">
<h1 class="text-primary"><i class="fa fa-users"></i>All Students <small>All New Students</small></h1>
<ol class="breadcrumb">
				<li><i class="fa fa-dashboard"></i> Dashboard</li>
			</ol>
	<table id="students" class="table table-hover table-bordered table-striped">
		<thead>
			<tr>
				<td>ID</td>
				<td>Name</td>
				<td>Roll</td>
				<td>Class</td>
				<td>Section</td>
				<td>Address</td>
				<td>Contact</td>
				<td>Photo</td>
				<td>Action</td>
			</tr>
		</thead>
		<tbody>
			<?php 
			$db_sinfo=mysqli_query($link,"SELECT * FROM `student_info`");
  while($row = mysqli_fetch_assoc($db_sinfo)) { ?>
			
			<tr>
				<td><?php echo $row["id"]; ?></td>
				<td><a href="student_profile.php?id=<?php echo $row["id"]; ?>"><?php echo ucwords($row["name"]); ?></a></td>
				<td><?php echo $row["roll"]; ?></td>
				<td><?php echo $row["class"]; ?> </td>
				<td><?php echo ucwords($row["section"]); ?></td>
				<td><?php echo ucwords($row["address"]); ?></td>
				<td><?php echo $row["contact"]; ?> </td>
				<td> <image src="uploads/<?php echo $row["photo"]; ?>" alt="avater"></image></td>
				
				<td><a class="btn btn-xs btn-warning" href="edit_student.php?id=<?php echo base64_encode($row['id']); ?>"><i class="fa fa-pencil"></i>Edit</a>
					<a onClick="javascript: return confirm('Please confirm deletion: <?php echo ucwords($row["name"]);?>');" class="btn btn-xs btn-danger" href="delete_student.php?id=<?php echo base64_encode($row['id']); ?>"><i class="fa fa-trash"></i>Delete</a>
				</td>
				
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div> <!----table responsive----->