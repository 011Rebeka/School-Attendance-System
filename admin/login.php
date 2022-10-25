<?php
require_once './dbcon.php';
session_start();
if(isset($_SESSION['user_login'])){header('location:index.php');}
if(isset($_POST['login'])){
	// print_r($_POST);
	$username=$_POST['username'];
	$password=$_POST['password'];
	$query="SELECT * FROM `users` WHERE `username`= '$username'";
	$result=mysqli_query($link, $query);
	if(mysqli_num_rows($result)>0){
		$row=mysqli_fetch_assoc($result);
		//print_r($row);
		if($row['password']==$password){
			if($row['status']=='active'){
				$_SESSION['user_login']=$username;
				header('location:index.php');
			} 
			else {$status_inactive="You are not activated yet!";}
		} 
		else {$worng_pw="Password is not correct!";}
	} else {$no_user="Username not found!";}
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>SMS || Admin Login</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

	<style>
    .container h1{
		color: #07b5e6;
		padding:50px 0;
	}


	
	</style>


  </head>
  <body>
    <div class="container">
	<br />
	<a class="btn btn-primary pull-right" href="../index.php">Back To WebSite</a>
    	<h1 class="text-center">School Attendance & Assignment System</h1>

		<div class="row">
			<div class="col-sm-4 col-sm-offset-4">
			 <h2 class="text-center">Admin Login</h2>
			 <br />
		    
			 <form action="login.php" method="POST">
				<div>
				  <input type="text" name="username" placeholder="Username" required="" value="<?php if(isset($username)){echo $username; } ?>" class="form-control"  />
				</div>
				<br />
				<div>
				  <input type="password" name="password" placeholder="Password" required="" value="<?php if(isset($password)){echo $password; } ?>" class="form-control"  />
				</div>
				<br />
				<div>
				  <input class='btn btn-info pull-right' type="submit" name="login" value="Login" class="form-control"  />
				</div>
			 
			 </form>

			 <br />
			 <?php  if(isset($no_user)){echo '<br /><br /><div class="alert alert-danger">'.$no_user.'</div>';} ?>
			<?php  if(isset($worng_pw)){echo '<br /><br /><div class="alert alert-danger">'.$worng_pw.'</div>';} ?>
			 <br />
			
			</div>
		</div>
		<br />
		<br />
		<br />
		<br />
		<br />
		
		<?php include 'footer.php';?>
    </div>

   
  </body>
</html>
