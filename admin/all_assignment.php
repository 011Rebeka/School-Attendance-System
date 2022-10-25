<div class="table-responsive">
<h1 class="text-primary"><i class="fa fa-users"></i>All Assignments <small>All New Assignments</small></h1>
<ol class="breadcrumb">
				<li><i class="fa fa-dashboard"></i> Dashboard</li>
			</ol>
<div class="col-sm-8">
			<h1 class="text-center">Assignment Board</h1>
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
						<h3><a href="../assignment_detail.php?id=<?php echo $row["aid"]; ?>"><?php echo ucwords($row["asn_no"]); ?></a></h3>
						<h4><strong>Class: </strong><?php echo $row["class"]; ?></h4>
						<h4><strong>Section: </strong><?php echo ucwords($row["section"]); ?></h4>
						<h4><strong>Subject: </strong><?php echo $row["asubject"]; ?></h4>
		
						<h4><strong>Submitted to: </strong><?php echo $sto=ucwords($row["submit_to"]); ?></h4>
						
						<h4><strong>Date for Submission: </strong><?php echo $row["date_submission"]; ?></h4>
						</td>
						
						<td> <image src="uploads/<?php echo $row["ques"]; ?>" alt="avater"></image> </td>
						</td>
						<td>
						<a class="btn btn-xs btn-warning" href="edit_asgn.php?id=<?php echo base64_encode($row['aid']); ?>"><i class="fa fa-pencil"></i>Edit</a>
						<a onClick="javascript: return confirm('Please confirm deletion:<?php echo ucwords($row["asn_no"]);?>');" class="btn btn-xs btn-danger" href="delete_asgn.php?id=<?php echo $row['aid']; ?>"><i class="fa fa-trash"></i>Delete</a>
						</td>
					</tr>
			<?php } ?>
					</tbody>

				</table>
				</div> <!---table-responsive--->
			</div> <!---- col-sm-8 ---->
</div> 