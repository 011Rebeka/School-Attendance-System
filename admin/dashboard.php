
<h1 class="text-primary"><i class="fa fa-dashboard"></i> Dashboard <small>Overview</small></h1>
			<ol class="breadcrumb">
				<li><i class="fa fa-dashboard"></i> Dashboard</li>
			</ol>
			<div class="row">
				<div class="col-sm-4">
				 <div class="panel panel-primary">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3"><i class="fa fa-users fa-4x"></i></div>
							<?php
							$count_student=mysqli_query($link,"SELECT * FROM `student_info`");
							$totals=mysqli_num_rows($count_student);
							
							?>
							<div class="col-xs-9">
								<div class="pull-right"><?php echo $totals; ?></div>
								<div class="clearfix"></div>
								<div class="pull-right">All Students</div>
							</div>
						</div>
					</div>
					<a href="index.php?page=all_students">
						<div class="panel-footer">
						<span class="pull-left">View All Students</span>
						<span class="pull-right"><i class="fa fa-arrow-circle-o-right"></i></span>
						<div class="clearfix"></div>
					</div>
					
					</a>
				 </div>
				</div>
				
				
				<div class="col-sm-4">
				 <div class="panel panel-primary">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3"><i class="fa fa-users fa-4x"></i></div>
							<?php
							$count_teachers=mysqli_query($link,"SELECT * FROM `teachers`");
							$totalt=mysqli_num_rows($count_teachers);
							?>
							<div class="col-xs-9">
								<div class="pull-right"><?php echo $totalt; ?></div>
								<div class="clearfix"></div>
								<div class="pull-right">All Teachers</div>
							</div>
						</div>
					</div>
					<a href="index.php?page=all_teachers">
						<div class="panel-footer">
						<span class="pull-left">View All Teachers</span>
						<span class="pull-right"><i class="fa fa-arrow-circle-o-right"></i></span>
						<div class="clearfix"></div>
					</div>
					
					</a>
				 </div>
				</div>
				
					
				
			</div>
	<hr />
	<h3>New Students</h3>
	<div class="table-responsive">
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
			</tr>
		</thead>
		<tbody>
			<?php 
			$db_sinfo=mysqli_query($link,"SELECT * FROM `student_info`");
  while($row = mysqli_fetch_assoc($db_sinfo)) { ?>
			
			<tr>
				<td><?php echo $row["id"]; ?></td>
				<td><?php echo $row["name"]; ?></td>
				<td><?php echo $row["roll"]; ?></td>
				<td><?php echo $row["class"]; ?> </td>
				<td><?php echo $row["section"]; ?></td>
				<td><?php echo $row["address"]; ?></td>
				<td><?php echo $row["contact"]; ?> </td>
				<td> <image src="uploads/<?php echo $row["photo"]; ?>" alt="avater"></image></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div> <!----table responsive----->