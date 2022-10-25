
<div class="table-responsive">
<h1 class="text-primary"><i class="fa fa-users"></i>Attendence Report</h1>
<ol class="breadcrumb">
				<li><i class="fa fa-dashboard"></i> Dashboard</li>
			</ol>
	<form action="" method="post">
		<div class="col-sm-6">		
			<table class="table table-bordered">
            	<tr>
                	<td> Select date : <br />
                   <?php 
				 		    $dt = getdate();
							$day = $dt["mday"];
							$month = date("m");
							$year = $dt["year"];
							
							echo "<select name='cdate'>";
							for($a=1;$a<=31;$a++)
							{
								if($day == $a)
									echo "<option value='$a' selected='selected'>$a</option>";
								else
									echo "<option value='$a' >$a</option>";
							}
							echo "</select><select name='cmonth'>";
							for($a=1;$a<=12;$a++)
							{
								if($month == $a)
									echo "<option value='$a' selected='selected'>$a</option>";
								else
									echo "<option value='$a' >$a</option>";
							}
							echo "</select><select name='cyear'>";
							for($a=2010;$a<=$year;$a++)
							{
								if($year == $a)
									echo "<option value='$a' selected='selected'>$a</option>";
								else
									echo "<option value='$a' >$a</option>";
							}
							echo "</select>";
						?>                    
                    </td>
                </tr>
				<tr>
				 <td>
				  <input class="btn btn-primary" type="submit" value="See Attendance" name="btnsubmit"/>
				 </td>
				</tr>
             </table>
		
</div>
</form>			 
	<table id="report" class="table table-hover table-bordered table-striped">
		<thead>
			<tr>
				<td>Roll</td>
				<td>Name</td>
				<td>Class</td>
				<td>Section</td>
				<td>Attendence</td>
				<td>Date</td>
			</tr>
		</thead>
		<tbody>
		<?php 
		if(isset($_POST['btnsubmit'])){
		$contact=$username;
		$date = $_POST["cyear"]."-".$_POST["cmonth"]."-".$_POST["cdate"];
$db_tinfo=mysqli_query($link,"SELECT * FROM `teachers` WHERE `contact`='$contact' AND `class_teacher`='1'");
  if(mysqli_num_rows($db_tinfo)>0){
	   
  $row = mysqli_fetch_assoc($db_tinfo);
	 $tclass=$row['tclass']; 
	 $tsec=$row['tsec'];
	  ?>
			<?php 
			$db_sinfo=mysqli_query($link,"SELECT * FROM `attandance` WHERE `stu_class`='$tclass' AND `date`='$date' AND `stu_sec`='$tsec'");
  if(mysqli_num_rows($db_sinfo)>0){
  while($row = mysqli_fetch_assoc($db_sinfo)) { ?>
			
			<tr>
				<td><?php echo $row["roll_num"]; ?></td>
				<td><a href="student_profile.php?id=<?php echo $row["id"]; ?>"><?php echo ucwords($row["stu_name"]); ?></a></td>
				<td><?php echo $row["stu_class"]; ?></td>
				<td><?php echo ucwords($row["stu_sec"]); ?> </td>
				<td><?php if($row["atten"]=="1") {echo 'Present';} else {echo 'Absent';}; ?></td>
				<td><?php echo $row["date"]; ?></td>
			</tr>
		<?php 
  } } else {echo "<tr><td><h2>Attendence is not taken!</h2></td></tr>";};?>
		<tr>
		<td>
		<?php $result = mysqli_query($link,"SELECT * FROM `attandance` WHERE `stu_class`='$tclass' AND `date`='$date' AND `stu_sec`='$tsec' AND `atten`='1'");
$num_rows = mysqli_num_rows($result);

echo "<h2>$num_rows Present\n</h2>"; ?>
</td>
       </tr>
			<?php 	} 
		
			} else {echo "<tr><td>Select a date to see attendence</td></tr>";}?>
		</tbody>
	</table>
</div> <!----table responsive----->
<div class="row">
<style type="text/css">

</style>
</div>