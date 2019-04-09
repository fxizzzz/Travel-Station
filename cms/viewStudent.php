<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<?php include ("header.php"); ?>
<?php
echo '<h2 align = "center"> List Of Student </h2>';

//make query
$q = "SELECT Name, No_id, Address, Phone_num, Ic_num, Course, Father_name, Mother_name, Father_num, Mother_num, Father_Salary, Mother_salary, Status, Sibling, Gender, Username, Password From student ORDER BY No_id";

$result = @mysqli_query ($connect, $q ); 
if ($result) {
	echo '<table border = "2" align = "center">
	<tr><td><b>Name</b></td>
	<td><b>No_id</b></td>
	<td><b>Address</b></td>
	<td><b>Phone_num</b></td>
	<td><b>Ic_num</b></td>
	<td><b>Course</b></td>
	<td><b>Father_name</b></td>
	<td><b>Mother_name</b></td>
	<td><b>Father_num</b></td>
	<td><b>Mother_num</b></td>
	<td><b>Father_Salary</b></td>
	<td><b>Mother_salary</b></td>
	<td><b>Status</b></td>
	<td><b>Sibling</b></td>
	<td><b>Gender</b></td>
	</tr>';
	
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	echo '<tr><td>' .$row ['Name'].
	'</td><td>' .$row ['No_id'].
	'</td><td>' .$row ['Address'].
	'</td><td>' .$row ['Phone_num'].
	'</td><td>' .$row ['Ic_num'].
	'</td><td>' .$row ['Course'].
	'</td><td>' .$row ['Father_name'].
	'</td><td>' .$row ['Mother_name'].
	'</td><td>' .$row ['Father_num'].
	'</td><td>' .$row ['Mother_num'].
	'</td><td>' .$row ['Father_Salary'].
	'</td><td>' .$row ['Mother_salary'].
	'</td><td>' .$row ['Status'].
	'</td><td>' .$row ['Sibling'].
	'</td><td>' .$row ['Gender'].
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