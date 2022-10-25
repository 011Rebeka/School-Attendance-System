<div class="table-responsive">
<h1 class="text-primary"><i class="fa fa-users"></i>All Notices <small>All New Notices</small></h1>
<ol class="breadcrumb">
				<li><i class="fa fa-dashboard"></i> Dashboard</li>
			</ol>
<div class="col-sm-8">
			<h1 class="text-center">Notice Board</h1>
			<div class="table-responsive">
				<table id="posts" class="table table-hover table-bordered table-striped">
					<thead>
						<tr>
							<td><h4>Class</h4></td>
							<td><h4>Section</h4></td>
							<td><h4>Thumbnail</h4></td>
							<td><h4>Action</h4></td>
						</tr>
					</thead>
					<tbody>
					<?php 
			$db_sinfo=mysqli_query($link,"SELECT * FROM `notice`");
			while($row = mysqli_fetch_assoc($db_sinfo)) { ?>
					<tr>
						<td><h4><a href="notice/<?php echo $row["picture"]; ?>"><?php echo ucwords($row["title"]); ?></a></h4></td>
						<td> <p><?php echo ucwords($row["detail"]); ?></p>  </td>
						<td> <a href="notice/<?php echo $row["picture"]; ?>"><image src="notice/<?php echo $row["picture"]; ?>" alt="avater"></image> </a></td>
						</td>
						<td><a onClick="javascript: return confirm('Please confirm deletion: <?php echo $row["nid"];?>);" class="btn btn-xs btn-danger" href="delete_notice.php?id=<?php echo $row['nid']; ?>"><i class="fa fa-trash"></i>Delete</a>
						</td>
					</tr>
			<?php } ?>
					</tbody>

				</table>
				</div> <!---table-responsive--->
			</div> <!---- col-sm-8 ---->
</div> <!----table responsive----->