<div class="table-responsive">
<h1 class="text-primary"><i class="fa fa-users"></i>All Subjects <small>All New Subjects</small></h1>
<ol class="breadcrumb">
				<li><i class="fa fa-dashboard"></i> Dashboard</li>
			</ol>
	<table id="students" class="table table-hover table-bordered table-striped">
		<thead>
			<tr>
				<td>ID</td>
				<td>Subject Name</td>
				<td>Class</td>
				<td>Section</td>
				<td>Teacher</td>
				<td>Action</td>
			</tr>
		</thead>
		<tbody>
			<?php 
			$db_sinfo=mysqli_query($link,"SELECT * FROM `subject`");
  while($row = mysqli_fetch_assoc($db_sinfo)) { $tid=$row["teacher"]; ?>
	
			<tr>
				<td><?php echo $row["subid"]; ?></td>
				<td><?php echo ucwords($row["subname"]); ?></td>
				<td><?php echo $row["class"]; ?></td>
				<td><?php echo ucwords($row["section"]); ?> </td>
				<?php /// find class teacher
	  $steacher=mysqli_query($link,"SELECT * FROM `teachers` WHERE `id`='$tid'");
	  $count=mysqli_num_rows($steacher);
	  if($count!=0){
	  while($rowt=mysqli_fetch_array($steacher)) {$ct=$rowt['name']; $ctid=$rowt['id']; } ?>
				<td><?php echo ucwords($ct); ?></td>
	<?php } ?>	
				
				<td><a class="btn btn-xs btn-warning" href="edit_subject.php?id=<?php echo base64_encode($row['subid']); ?>"><i class="fa fa-pencil"></i>Edit</a>
					<a onClick="javascript: return confirm('Please confirm deletion: <?php echo ucwords($row["subname"]);?>');" class="btn btn-xs btn-danger" href="delete_subject.php?id=<?php echo $row['subid']; ?>"><i class="fa fa-trash"></i>Delete</a>
				</td>
				
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div> <!----table responsive----->