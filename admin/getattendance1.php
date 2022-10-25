<?php
session_start();
require_once './dbcon.php';
if(!isset($_SESSION['user_login'])){header('location:login.php');}
$username=$_SESSION['user_login'];
if($username=="admin123"){
$query="SELECT * FROM `users` WHERE `username`= '$username'";
$result=mysqli_query($link, $query);
$row=mysqli_fetch_assoc($result);
if(mysqli_num_rows($result)>0){
	$logged_user= $row['name'];
	$superadmin= $row['superadmin'];
}
}
else{
	$query="SELECT name FROM `teachers` WHERE `contact`= '$username'";
$result=mysqli_query($link, $query);
$row=mysqli_fetch_assoc($result);
if(mysqli_num_rows($result)>0){
	$logged_user= $row['name'];
}
}


?>
<?php
$contact=$username;
$db_sinfo=mysqli_query($link,"SELECT * FROM `teachers` WHERE `contact`='$contact' AND `class_teacher`='1'");
  if(mysqli_num_rows($db_sinfo)>0){
  $row = mysqli_fetch_assoc($db_sinfo);
	  $tclass=$row['tclass']; 
	  $tsec=$row['tsec'];
	  
	  
	if(isset($_POST["btnsubmit"]))
	{
		$date = $_POST["cyear"]."-".$_POST["cmonth"]."-".$_POST["cdate"];
            
			/* chk is done or not */
	$db_chk=mysqli_query($link,"SELECT * FROM `attandance` WHERE `stu_class`='$tclass' AND `date`='$date' AND `stu_sec`='$tsec'");
	if(mysqli_num_rows($db_chk)>0){ 
	print "<script>";
	print "alert('Attendence for this date already taken!');";
			print "self.location='index.php?page=attendence_report_zone';"; 
	print "</script>";
	}
  else {   		
		$query = "SELECT * FROM `student_info` WHERE `class`='$tclass' AND `section`='$tsec'";
		$result = mysqli_query($link,$query)or die("select error");
		while($rec = mysqli_fetch_array($result))
		{
			$mno = $rec["id"];
			$roll= $rec["roll"];
			$stu_name=$rec["name"];
			$stu_class=$rec["class"];
			$stu_sec=$rec["section"];
			if(isset($_POST[$mno]))
			{
				$query1 = "INSERT INTO  `attandance`(`id` ,`roll_num`,`stu_name`,`stu_class`,`stu_sec`,`date` , `atten`) VALUES('$mno','$roll','$stu_name','$stu_class','$stu_sec','$date','1')";
			}
			else
			{
				$query1 = "INSERT INTO  `attandance`(`id` ,`roll_num`,`stu_name`,`stu_class`,`stu_sec`,`date` , `atten`) VALUES('$mno','$roll','$stu_name','$stu_class','$stu_sec','$date','0')";
			}
			mysqli_query($link,$query1)or die("insert error".$mno);
			print "<script>";
			print "alert('Attendance get successfully....');";
			print "self.location='index.php?page=attendence_report_zone';";
			print "</script>";
		}
		
		
   } /* condition for chk end */	
		
	}
  }
	else
	{
		header("Location:index.php");
	}
?>