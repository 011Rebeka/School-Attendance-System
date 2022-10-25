
	<?php
$picture=$_GET['page'];
?>
<div class="container">
<div class="container">
<br />
	<button class="btn btn-primary " onclick="window.print()">Print</button>
</div>
<br />
	 <image src="admin/notice/<?php echo $picture; ?>" alt="avater"></image>
</div>
<style type="text/css">
.container{
	margin:0 auto;
	width:1000px;
	background-color:#3ca9c8;
	text-align:center;}
.container img{
	width:60%;
	overflow:hidden;
}
.btn{
}

.btn-primary{
	background-color:#ffffff;
	border: 2px solid black;
	border-radius: 15px;
	padding:10px;
	font-weight:bold;
}
.btn-primary:hover{
	cursor:pointer;
}

.pull-left{float: left;
margin-right:-20px;}
</style>
