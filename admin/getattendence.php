<script type="text/javascript">
	function getatt(value)
	{
		if(value == true)
		{
			document.getElementById("txtAbsent").value = parseInt(document.getElementById("txtAbsent").value) - 1;
			document.getElementById("txtPresent").value = parseInt(document.getElementById("txtPresent").value) + 1;
		}
		else
		{
			document.getElementById("txtAbsent").value = parseInt(document.getElementById("txtAbsent").value) + 1;
			document.getElementById("txtPresent").value = parseInt(document.getElementById("txtPresent").value) - 1;
		}
	}
</script>
<div class="container-fluid">

	<div class="row">
	
		<div class="col-sm-10">
		<?php
require_once './dbcon.php';
$contact=$username;
$db_sinfo=mysqli_query($link,"SELECT * FROM `teachers` WHERE `contact`='$contact' AND `class_teacher`='1'");
  if(mysqli_num_rows($db_sinfo)>0){
  $row = mysqli_fetch_assoc($db_sinfo);
	  $tclass=$row['tclass']; 
	  $tsec=$row['tsec'];
	  ?>
<form action="getattendance1.php" method="post">
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
             </table>	
</div>
<div class="col-sm-8">
			 <table class="table table-bordered">
			 	<tr class="table table-bordered">
					<h1>Get Daily Attendance</h1>
				</tr>
				<thead>
			 	<tr>
					<td>Roll:</td>
					<td>Name:</td>
					<td>Class:</td>
					<td>Section:</td>
					<td>Contact</td>
					<td>Attendence</td>
				</tr>
				</thead>
				<tbody>
				<?php 
				extract($_POST);
			$db_sinfo=mysqli_query($link,"SELECT * FROM `student_info` WHERE `class`='$tclass' AND `section`='$tsec'");
			$s = 0;
  while($row = mysqli_fetch_assoc($db_sinfo)) { $s = $s + 1; ?>
			 	<tr>
					<td><?php echo $row['roll']; ?></td>
					<td><?php echo $row['name']; ?></td>
					<td><?php echo $row['class']; ?></td>
					<td><?php echo $row['section']; ?></td>
					<td><?php echo $row['contact']; ?></td>
					<td><input type=checkbox name='<?php echo $row["id"]; ?>' onclick="getatt(this.checked);"/><strong>&nbsp;Present</strong></td>
				
				</tr>
			 <?php } ?>
			<tr>
				<td><input class="btn btn-primary" type="submit" value="Get Attendance" name="btnsubmit"/></td>
			</tr>			 
				</tbody>
			 </table>
</div>
</form>
		<div class="col-sm-3">
		<table width="100px" align="right" style="margin-left:35px">
            	<tr>
                	<td> Total Absent : <input type="text" id="txtAbsent" value="<?php print $s; ?>" size="10" disabled="disabled"/></td>
                </tr>
                <tr>
                	<td> Total Present : <input type="text" id="txtPresent" value="0" size="10"  disabled="disabled"/></td>
                </tr>
                <tr>
                	<td> Total Student : <input type="text" id="txtStrength" value="<?php print $s; ?>" size="10" disabled="disabled"/></td>
                </tr>
        </table>
		</div>
		<?php 
  }
else {echo '<h1>Only Class Teacher can get attendence!</h1>';}  
?>
	  </div>
		 </div> <!---content--->
		</div>
