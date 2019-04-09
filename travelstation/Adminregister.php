<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Travel Station</title>
	<link rel=" stylesheet" type="text/css" href="css/adminstyle.css" />
</head>

<body>
<?php include ("header.php");?>

<div class="main">
	<div class="logo">
		<img src="logo 1.png">
	</div>

	<ul>
		<li><a href="login.php">Login</a></li>
	</ul>

	<div class="tittle">
		<h1> Registration </h1>
	</div>
</div>

<?php
//This query inserts a record in the cms table
//has form been ubmitted?
if($_SERVER { 'REQUEST_METHOD' } == 'POST') {
	$error = array (); //initialize an error array

//check for a name
	if (empty($_POST ['Name'])) {
		$error [] = 'You forgot to enter your Name.';
	}
	else {
	$n = mysqli_real_escape_string ($connect, trim ($_POST ['Name']));
	}

//check for a course
	if (empty($_POST['Admin_id'])){
		$error [] = 'You forgot to enter Admin_id.';
	}
	else {
		$ai = mysqli_real_escape_string ($connect, trim ($_POST ['Admin_id']));
	}

//check for a course
	if (empty($_POST['Ic_num'])){
		$error [] = 'You forgot to enter your IC Number.';
	}
	else {
		$ic = mysqli_real_escape_string ($connect, trim ($_POST ['Ic_num']));
	}
	
//check for a course
	if (empty($_POST['Phone_num'])){
		$error [] = 'You forgot to enter your Phone Number.';
	}
	else {
		$t = mysqli_real_escape_string ($connect, trim ($_POST ['Phone_num']));
	}	

						
	
	
//register the user in database
//make the query: 

	$q = "Insert INTO admin (Name, Admin_id, Ic_num, Phone_num)
	VALUES ('$n', '$ai', '$ic', '$t')";
	
	$result = @mysqli_query ($connect, $q); // run the query
	if ($result){ //if it runs
	echo 
	'<div class="error4">
		<h1>Thank you for register with us. We looking foward to make your day with ease </h1>
	</div>';
	exit();
	} else { //if it did run 
	//message
	echo '<h1>System error</h1>';
	
	//debugging message
	echo '<p>' .mysqli_error($connect). '<br><br>Query: '.$q. '</p>';
	} //end of it (result)
	mysqli_close($connect); //close the database connection 
	exit();
	
} //End of the main submit conditional
?>
<div class="error4">
	<h4> *required field </h4>
	<form action="Adminregister.php" method = "post">

	<div class="container">
	<p><label class = "label" for = "Name"> Name : *</label>
	<input id = "Name" type= "text" name = "Name" size"30" maxlength="30"
	value="<?php if (isset($_POST['Name'])) echo $_POST ['Name']; ?> " /></p>

	<p><label class = "label" for = "Admin_id">ID Number : *</label>
	<input id = "Admin_id" type= "text" name = "Admin_id" size"12" maxlength="30"
	value="<?php if (isset($_POST['Admin_id'])) echo $_POST ['Admin_id']; ?> " /></p>

	<p><label class = "label" for = "Ic_num"> IC Number : *</label>
	<input id = "Ic_num" type= "text" name = "Ic_num" size"12" maxlength="30"
	value="<?php if (isset($_POST['Ic_num'])) echo $_POST ['Ic_num']; ?> " /></p>

	<p><label class = "label" for = "Phone_num"> Telephone : *</label>
	<input id = "Phone_num" type= "text" name = "Phone_num" size"12" maxlength="15"
	value="<?php if (isset($_POST['Phone_num'])) echo $_POST ['Phone_num']; ?> " /></p>

	<p><input id= "submit" type="submit" name="submit" value="Register" /></p>
	</form>
	<p>
	</div>
</div>



</body>
</html>