<?php 
if($username=="admin123") {
?>
<ul class="nav navbar-nav navbar-right">
	    <li><a href="index.php?page=user_profile"><i class="fa fa-user"></i>Welcome <?php echo $logged_user; // echo $_SESSION['user_login']; ?></a></li>
	    <li><a href="index.php?page=user_profile"><i class="fa fa-user"></i> Profile</a></li>
        <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
</ul>
<?php } else { ?>

<ul class="nav navbar-nav navbar-right">
	    <li><a href="index.php?page=teacher_zone"><i class="fa fa-user"></i>Welcome <?php echo $logged_user; // echo $_SESSION['user_login']; ?></a></li>
	    <li><a href="index.php?page=teacher_zone"><i class="fa fa-user"></i> Profile</a></li>
        <li><a href="logoutt.php"><i class="fa fa-power-off"></i> Logout</a></li>
</ul>

<?php }?>
