<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel=" stylesheet" type="text/css" href="css/adminstyle.css" />
</head>
<style>
table, th, td {
  color: #fff;
}
</style>
<body>
<?php include ("header.php"); ?>
<?php

echo 
'<div class="main">
	<div class="logo">
		<img src="logo 1.png">
	</div>

	<ul>
		<li class="active"><a href="viewCustomer.php">Customer</a></li>
		<li><a href="listCustomer.php">Edit Customer</a></li>
		<li><a href="logout.php">Log Out</a></li>
		<li><a href="index.html">Home</a></li>
	</ul>

	<div class="tittle">
		<h1>List Of Customer</h1>
	</div>
</div>';

//make query
$q = "SELECT Name, No_id, Ic_num, Phone_num, Country From customer ORDER BY No_id";

$result = @mysqli_query ($connect, $q ); 
if ($result) {
	echo 
	'<div class="table">
		<table border = "2" align = "center">
		<tr>
		<td><b>Name</b></td>
		<td><b>No_id</b></td>
		<td><b>Ic_num</b></td>
		<td><b>Phone_num</b></td>
		<td><b>Country</b></td>
		</tr>
	</div>';
	
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	echo '<tr><td>' .$row ['Name']. 
	   '</td><td>' .$row ['No_id']. 
	   '</td><td>' .$row ['Ic_num']. 
	   '</td><td>' .$row ['Phone_num']. 
	   '</td><td>' .$row ['Country']. 
	   '</td></tr>'; }
	
	echo '<table>'; 
	mysqli_free_result ($result); 
} else {
	echo '<p class = "error"> the curent users could not be retrived. We apologize 
for any inconvinience. </p>';	
	echo '<p>' .mysqli_error ($connect).'<br><br>Query : '.$q.'</p>';
}

mysqli_close ($connect); 
	 
?>
</body>
</html>