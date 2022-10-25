<?php 
require_once './admin/dbcon.php';
$query="SELECT * FROM `design`";
$result=mysqli_query($link, $query);
$row=mysqli_fetch_assoc($result);
if(mysqli_num_rows($result)>0){
	$logo= $row['logo'];
}


?>
<div id="content">
	<div class="banner col-md-12 ">
		<div class="logo col-sm-2 pull-left text-center">
			<a href="index.php"><img src="admin/images/school logo.jpg" alt="" /> </a>
		</div>
		<div class="row col-sm-10"><h1 class="text-center">School Attendance & Assignment System</h1> 
									
		</div>
	</div>
</div>


<style>
 #content{width:100%;
 min-height:200px;
 }
 
 .banner{
  background-color: #72c4db;
 min-height:100px;
 
}
 
 .logo{
	 padding: 10px;
	
	}

.row h1{
 /* color: #3050c2; */
 font-family: "Times New Roman", Times, serif;
 padding: 10px;
 margin-right: 50px; 

</style>