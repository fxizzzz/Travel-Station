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
		<li><a href="index.html">Home</a></li>
		<li><a href="Hotel.html">Hotel</a></li>
		<li><a href="Grab.html">Grab</a></li>
		<li><a href="Food.html">Food</a></li>
		<li class="active"><a href="customerorder.php">Order</a></li>
		<li><a href="About.html">About</a></li>
		<li><a href="Contact.html">Contact</a></li>
    </ul>

	<div class="tittle">
		<h1> New customer registration </h1>
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
	$Name = mysqli_real_escape_string ($connect, trim ($_POST ['Name']));
	}

	//check for a course
	if (empty($_POST['Ic_num'])){
		$error [] = 'You forgot to enter your IC Number.';
	}
	else {
		$ic_num = mysqli_real_escape_string ($connect, trim ($_POST ['Ic_num']));
	}
	
//check for a course
	if (empty($_POST['Phone_num'])){
		$error [] = 'You forgot to enter your Phone Number.';
	}
	else {
		$phone_num = mysqli_real_escape_string ($connect, trim ($_POST ['Phone_num']));
	}	

//check for a country
	if (empty($_POST['Country'])){
		$error [] = 'You forgot to enter your Country.';
	}
	else {
		$country = mysqli_real_escape_string ($connect, trim ($_POST ['Country']));
	}						
	
	
//register the user in database
//make the query: 

	$q = "Insert INTO customer (Name, No_id, Ic_num, Phone_num, Country)
	VALUES ('$Name', ' ', '$ic_num', '$phone_num', '$country')";
	
	$result = @mysqli_query ($connect, $q); // run the query
	
	if ($result){ //if it run    
	//if success, open this tab    
	header("Location: Order.html"); 

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
	<form method="post" action="customerorder.php">

	<div class="container">
		<p><label class = "label" for = "Name"> Name : *</label>
		<input id = "Name" type= "text" name = "Name" size"30" maxlength="30"
		value="<?php if (isset($_POST['Name'])) echo $_POST ['Name']; ?> " /></p>

		<p><label class = "label" for = "Ic_num"> IC Number : *</label>
		<input id = "Ic_num" type= "text" name = "Ic_num" size"12" maxlength="30"
		value="<?php if (isset($_POST['Ic_num'])) echo $_POST ['Ic_num']; ?> " /></p>

		<p><label class = "label" for = "Phone_num"> Telephone : *</label>
		<input id = "Phone_num" type= "text" name = "Phone_num" size"12" maxlength="30"
		value="<?php if (isset($_POST['Phone_num'])) echo $_POST ['Phone_num']; ?> " /></p>

		<p><label class = "label" for = "Country"> Country : *</label>
		<input id = "Country" type= "text" name = "Country" size"14" maxlength="30"
		value="<?php if (isset($_POST['Country'])) echo $_POST ['Country']; ?> " /></p>


		<p>
		</form>

		<input id= "submit" type="submit" name="submit" value="Register" /></p>
		<p>
	</div>
</div>
<div class="error1">
	<p align="center">&nbsp;&nbsp;&nbsp;&nbsp; Already have an account? Continue to login page.
<a href="login.php">Login</a></p>
</div>
</body>
</html>