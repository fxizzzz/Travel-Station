<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel=" stylesheet" type="text/css" href="css/adminstyle.css" />
</head>

<body>
<?php include("header.php"); ?>

<div class="main">
	<div class="logo">
		<img src="logo 1.png">
	</div>

	<ul>
		<li><a href="viewCustomer.php">Customer</a></li>
		<li><a href="listCustomer.php">Edit Customer</a></li>
		<li><a href="logout.php">Log Out</a></li>
	</ul>

	<div class="tittle">
		<h1> Edit a record </h1>
	</div>
</div>

<?php

//look for a valid user id, either through GET or POST
if ((isset ($_GET['id'])) && (is_numeric($_GET['id'])))
{
	$id = $_GET['id'];
}
elseif ((isset($_POST['id'])) && (is_numeric($_POST['id'])))
{
	$id = $_POST['id'];
}
else
{
	echo '<p class = "error"> This page has been accessed in error. </p>';
	exit ();
}

if($_SERVER ['REQUEST_METHOD'] == 'POST')
{
	$error = array();
	
	//check for a name
	if (empty($_POST['Name']))
	{
		$error [] = 'You forgot to enter your Name.';
	}
	else
	{
		$n = mysqli_real_escape_string ($connect, trim ($_POST['Name']));
	}
	
	//check for a Ic_num
	if (empty($_POST['Ic_num']))
	{
		$error [] = 'You forgot to enter your address.';
	}
	else
	{
		$ic = mysqli_real_escape_string ($connect, trim ($_POST['Ic_num']));
	}
	
	//check for a telephone
	if (empty($_POST['Phone_num']))
	{
		$error [] = 'You forgot to enter your Phone number.';
	}
	else
	{
		$t = mysqli_real_escape_string ($connect, trim ($_POST['Phone_num']));
	}
	
	
	//check for a course
	if (empty($_POST['Country']))
	{
		$error [] = 'You forgot to enter your course.';
	}
	else
	{
		$country = mysqli_real_escape_string ($connect, trim ($_POST['Country']));
	}
	
	//if no problem occured
	if (empty($error))
	{
		$q = "SELECT No_id From customer WHERE Ic_num = '$ic' AND No_id != $id";
		$result = @mysqli_query($connect, $q);
		
		if (mysqli_num_rows($result) == 0)
		{
			$q = "UPDATE customer SET Name='$n', Ic_num='$ic', Phone_num='$t',  Country='$country' WHERE No_id ='$id' LIMIT 1";
			
			$result = @mysqli_query($connect, $q);
			
			if (@mysqli_affected_rows($connect) == 1)
			{
				echo
				'<div class="error2">
					<h1> The user has been edited </h1>
				</div>';
			}
			else
			{
				echo '<p class="error"> The user has not be edited due to the system error. We apologize for any convenience.</p>';
				echo '<p>'.mysqli_error($connect). '<br/> query: '.$q. '</p>';
			}
		}
		else
		{
			echo '<p class="error"> The no ic has already been registered</p>';
		}
	}
	else
	{
		echo '<p class="error"> The following error (s) occured: <br>';
		foreach ($error as $msg)
		{
			echo "-$msg<br> \n";
		}
		echo '<p> Please try again.</p>';
	}
}
	
	$q = "SELECT Name, No_id, Ic_num, Phone_num, Country FROM customer WHERE No_id=$id";
	$result = @mysqli_query ($connect, $q);
	if (mysqli_num_rows($result) == 1)
	{
		//get customer information
		$row = mysqli_fetch_array ($result, MYSQLI_NUM);
		//create form
		echo 
		'<div class="error4">
			<form action="editCustomer.php" method="post">
		
			<p><label class = "label" for="Name"> Name : </label>
			<input id = "Name" type="text" name="Name" size="30" maxlength="30" value="'.$row[0].'"></p>
		
			<p><label class = "label" for="Ic_num"> No IC : </label>
			<input id = "Ic_num" type="text" name="Ic_num" size="12" maxlength="30" value="'.$row[2].'"></p>
		
			<p><label class = "label" for="Phone_num"> Telephone : </label>
			<input id = "Phone_num" type="text" name="Phone_num" size="12" maxlength="30" value="'.$row[3].'"></p>
	
			<p><label class = "label" for="Country"> Country : </label>
			<input id = "Country" type="text" name="Country" size="14" maxlength="30" value="'.$row[4].'"></p>

			<div class="butang">
				<p><input id="submit" type="submit" name="submit" value"Edit"></p>
			</div>
			
			<br><input type="hidden" name="id" value="'.$id.'"/>
			</form>
		</div>';
	}
	else
	{
		echo '<p class="error"> This page has been accessed in error.</p>';
	}
	mysqli_close ($connect);
?>
</body>
</html>