<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel=" stylesheet" type="text/css" href="css/adminstyle.css" />
</head>

<body>
<?php include("header.php");?>

<div class="main">
	<div class="logo">
		<img src="logo 1.png">
	</div>

	<ul>
		<li><a href="viewCustomer.php">Customer</a></li>
		<li><a href="listCustomer.php">Edit Customer</a></li>
		<li><a href="logout.php">Log Out</a></li>
	</ul>
</div>

<?php
//look for a valid user id, either through GET or POST
if ((isset ($_GET['id'])) && (is_numeric($_GET['id']))) {
	$id = $_GET['id'];
} elseif ((isset($_POST['id'])) && (is_numeric($_POST['id']))) {
	$id = $_POST['id'];
} else  {
	echo '<p class ="error">This page has been accessed in error.</p>';
		exit();
}

if($_SERVER['REQUEST_METHOD'] =='POST') {
	if($_POST['sure'] == 'Yes') { //Delete the record
	//make the query
	$q = "DELETE FROM customer WHERE No_id=$id LIMIT 1";
	$result = @mysqli_query ($connect, $q);
	
	if (mysqli_affected_rows($connect) == 1) { //if there was no problem
	//display message
	echo 
	'<div class="tittle">
			<h1>The record has been deleted.</h1>
	</div>';
	} else {
		//display error message
		echo 
		'<div class="tittle">
			<p class="error">The record could not be deleted.<br>Probably because it does not exist or due to system error.</p>
		</div>';
		echo '<p>'.mysqli_error($connect).'<br\>Query:'.$q.'</p>';
		//debugging message
	}
	}
	else {
		echo 
		'<div class="tittle">
			<h1>The user has NOT been deleted.</h1>
		</div>';
	}
}else{
	//display the form
	//Retrieve the customer data
	$q = "SELECT Name FROM customer WHERE No_id = $id";
	$result = @mysqli_query ($connect, $q);
	if (mysqli_num_rows($result) == 1) {
		//Get the customer data
		$row =mysqli_fetch_array($result, MYSQLI_NUM);
		echo 
		"<div class='tittle'>
			<h1>Are you sure to permanently delete $row[0]? </h1>
		</div>";
		echo 
		'<div class="choice">
			<form action="deletecustomer.php" method="post">
			<input id="submit-no" type="submit" name="sure" value="Yes">
			<input id="submit-no" type="submit" name="sure" value="No">
			<input type ="hidden" name="id" value="'.$id.'">
			</form>
		</div>';
	} else {
		echo '<p class="error">This page has been accessed in error.</p>';
		echo '<p>&nbsp;</p>';
	}
}
mysqli_close($connect);
?>
</body>
</html>