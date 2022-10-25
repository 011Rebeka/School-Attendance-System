 <?php
if(!isset($_SESSION['user_login'])){header('location:login.php');}
$username=$_SESSION['user_login']; 
if($username=="admin123"){
?>
  <a href="index.php?page=dashboard" class="list-group-item active"><i class="fa fa-dashboard"></i> Dashboard</a>
  
 
 <div class="dropdown">
    <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Manage Student
    <span class="caret"></span></button>
    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
      <li role="presentation"><a role="menuitem" tabindex="-1" href="index.php?page=add_student"><i class="fa fa-user-plus"></i>Add Student</a></li>
      <li role="presentation" class="divider"></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="index.php?page=all_students"><i class="fa fa-users"></i>All Students</a></li>
    </ul>
</div>
<div class="dropdown">	
	<button class="btn btn-default dropdown-toggle" type="button" id="menu2" data-toggle="dropdown">Manage Teacher
    <span class="caret"></span></button>
	<ul class="dropdown-menu" role="menu" aria-labelledby="menu2">
      <li role="presentation"><a role="menuitem" tabindex="-1" href="index.php?page=add_teacher"><i class="fa fa-user-plus"></i>Add Teacher</a></li>
      <li role="presentation" class="divider"></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="index.php?page=all_teachers"><i class="fa fa-users"></i>All Teachers</a></li>
	  <li role="presentation" class="divider"></li>
	  <li role="presentation"><a role="menuitem" tabindex="-1" href="index.php?page=add_classteacher"><i class="fa fa-user-plus"></i>Add Class Teacher</a></li>
	  <li role="presentation" class="divider"></li>
	  <li role="presentation"><a role="menuitem" tabindex="-1" href="index.php?page=all_class_teachers"><i class="fa fa-users"></i>All Class Teachers</a></li>
	</ul>
</div>	
<div class="dropdown">	
	<button class="btn btn-default dropdown-toggle" type="button" id="menu3" data-toggle="dropdown">Manage Class
    <span class="caret"></span></button>
    <ul class="dropdown-menu" role="menu" aria-labelledby="menu3">
      <li role="presentation"><a role="menuitem" tabindex="-1" href="index.php?page=add_notice"><i class="fa fa-plus"></i>Add Routine</a></li>
      <li role="presentation" class="divider"></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="index.php?page=all_notices"><i class="fa fa-times-rectangle"></i>All Routines</a></li>
    </ul>
</div>

<div class="dropdown">	
	<button class="btn btn-default dropdown-toggle" type="button" id="menu4" data-toggle="dropdown">Manage Subject
    <span class="caret"></span></button>
    <ul class="dropdown-menu" role="menu" aria-labelledby="menu4">
      <li role="presentation"><a role="menuitem" tabindex="-1" href="index.php?page=add_subject"><i class="fa fa-plus"></i>Add Subject</a></li>
      <li role="presentation" class="divider"></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="index.php?page=all_subject"><i class="fa fa-book"></i>All Subjects</a></li>
    </ul>
</div>


<?php } else { include 'submenu.php'; }

?>


<style>
.dropdown .btn  {
  position: relative;
  background-color:#ccccff;
  margin:5px;
  padding: 10px;
  border: 1px solid black;
  list-style-type: 10px;
  overflow: hidden;
}


</style>



  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>