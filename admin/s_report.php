<?php
session_start();
require_once './dbcon.php';
if(!isset($_SESSION['user_login'])){header('location:login.php');}
$username=$_SESSION['user_login'];
if($username=="admin123"){
$query="SELECT name FROM `users` WHERE `username`= '$username'";
$result=mysqli_query($link, $query);
$row=mysqli_fetch_assoc($result);
if(mysqli_num_rows($result)>0){
	$logged_user= $row['name'];
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
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    
    <title>SAAS</title>
<link href="style.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/font-awesome.css" rel="stylesheet">
<!-------------------------------------------------------------->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!------------------------------------------------------------->
        <!-- Datatable CSS -->
        <link href='DataTables/datatables.min.css' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" type="text/css" href="../css/jquery-ui.min.css">

        <!-- jQuery Library -->
        <script src="../js/jquery-3.4.1.min.js"></script>
	
        <script type="text/javascript" src="../js/jquery-ui.min.js"></script>

        <!-- Datatable JS -->
        <script src="DataTables/datatables.min.js"></script>


		<style>
.footer_area{text-align:center; padding:20px 0; background:#3ca9c8; color:#fff;}
.footer_area p{margin:0}
.content{min-height:450px;}
img{width:100px;}
</style>

        
    </head>
    <body >
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      
      <a class="navbar-brand" href="index.php"><?php include 'title_tag.php';?></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
      <ul class="nav navbar-nav navbar-right">
	    <li><a href="index.php?page=user_profile"><i class="fa fa-user"></i>Welcome <?php echo ucwords($logged_user); // echo $_SESSION['user_login']; ?></a></li>
	   
	    <li><a href="index.php?page=user_profile"><i class="fa fa-user"></i> Profile</a></li>
        <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="container-fluid">
	<div class="col-sm-4">
	<div class="list-group">
	<?php // include 'submenu.php';?>
	<?php $sid= base64_decode($_GET['id']); 
	$db_sinfo=mysqli_query($link,"SELECT * FROM `student_info` WHERE `id`='$sid'");
  while($row = mysqli_fetch_assoc($db_sinfo)) { ?>
	<h3><?php echo ucwords($row["name"]); ?></h4>
	<h4>Roll: <?php echo ucwords($row["roll"]); ?></h4>
	<h4>Class: <?php echo ucwords($row["class"]); ?></h4>
	<h4>Section: <?php echo ucwords($row["section"]); ?></h4>
	<br />
	<h4>Father: <?php echo ucwords($row["father"]); ?></h4>
	<h4>Mpther: <?php echo ucwords($row["mother"]); ?></h4>
	<h4>Contact: <?php echo ucwords($row["contact"]); ?></h4>
	<h4>Section: <?php echo ucwords($row["section"]); ?></h4>
  <?php }
	?>
	<style>
.dropdown .btn  {
  position: relative;
  background-color:#9cf6f7;
  margin:5px;
  padding: 10px;
  border: 1px solid black;
  list-style-type: 10px;
  overflow: hidden;
}
</style>

	</div>
	
	</div>
	<div class="col-sm-6">
        <div class="table-responsive">
            <!-- Date Filter -->
            <table>
                <tr>
                    <td>
                        <input type='text' readonly id='search_fromdate' class="datepicker" placeholder='From date'>
                    </td>
                    <td>
                        <input type='text' readonly id='search_todate' class="datepicker" placeholder='To date'>
                    </td>
					<td>
                        <input type='hidden' readonly id='s_id' value='<?php echo base64_decode($_GET['id']); ?>'>
                    </td>
                    <td>
                        <input type='button' id="btn_search" value="Search">
                    </td>
                </tr>
            </table>
            
            <!-- Table -->
            <table id='empTable' class='display dataTable'>
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Roll</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Attendence</th>
                </tr>
                </thead>
                
            </table>
        </div>
        
        <!-- Script -->
        <script>
        $(document).ready(function(){

            // Datapicker 
            $( ".datepicker" ).datepicker({
                "dateFormat": "yy-mm-dd",
                changeYear: true
            });

            // DataTable
            var dataTable = $('#empTable').DataTable({
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                'searching': true, // Set false to remove default Search Control
                'ajax': {
                    'url':'ajaxfile.php',
                    'data': function(data){
                        // Read values
                        var from_date = $('#search_fromdate').val();
                        var to_date = $('#search_todate').val();
						var sid=$('#s_id').val();

                        // Append to data
                        data.searchByFromdate = from_date;
                        data.searchByTodate = to_date;
						data.searchByid = sid;
                    }
                },
                'columns': [
                    { data: 'id' },
                    { data: 'roll_num' },
                    { data: 'stu_name' },
                    { data: 'date' },
                    { data: 'atten' },
                ]
            });

            // Search button
            $('#btn_search').click(function(){
                dataTable.draw();
            });
           
        });
        </script>

        <!-- <print code -->
		</div>
		<button class="btn btn-primary " onclick="window.print()">Print</button>
</div> <!-------container-fluid------->

    </body>

</html>
