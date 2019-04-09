<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php include("header.php"); ?>

<h2> Edit a record </h2>

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
	
	//check for a address
	if (empty($_POST['Address']))
	{
		$error [] = 'You forgot to enter your address.';
	}
	else
	{
		$add = mysqli_real_escape_string ($connect, trim ($_POST['Address']));
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
	
	//check for a Ic_num
	if (empty($_POST['Ic_num']))
	{
		$error [] = 'You forgot to enter your address.';
	}
	else
	{
		$ic = mysqli_real_escape_string ($connect, trim ($_POST['Ic_num']));
	}
	
	//check for a course
	if (empty($_POST['Course']))
	{
		$error [] = 'You forgot to enter your course.';
	}
	else
	{
		$c = mysqli_real_escape_string ($connect, trim ($_POST['Course']));
	}
	
	//check for a father name
	if (empty($_POST['Father_name']))
	{
		$error [] = 'You forgot to enter your father name.';
	}
	else
	{
		$fn = mysqli_real_escape_string ($connect, trim ($_POST['Father_name']));
	}
	
	//check for a mother name
	if (empty($_POST['Mother_name']))
	{
		$error [] = 'You forgot to enter your mother name.';
	}
	else
	{
		$mn = mysqli_real_escape_string ($connect, trim ($_POST['Mother_name']));
	}
	
	//check for a father telephone
	if (empty($_POST['Father_num']))
	{
		$error [] = 'You forgot to enter your father phone number.';
	}
	else
	{
		$ft = mysqli_real_escape_string ($connect, trim ($_POST['Father_num']));
	}
	
	//check for a mother telephone
	if (empty($_POST['Mother_num']))
	{
		$error [] = 'You forgot to enter your mother phone number.';
	}
	else
	{
		$mt = mysqli_real_escape_string ($connect, trim ($_POST['Mother_num']));
	}
	
	//check for a father salary
	if (empty($_POST['Father_salary']))
	{
		$error [] = 'You forgot to enter your father salary.';
	}
	else
	{
		$fs = mysqli_real_escape_string ($connect, trim ($_POST['Father_salary']));
	}
	
	//check for a mother salary
	if (empty($_POST['Mother_salary']))
	{
		$error [] = 'You forgot to enter your mother salary.';
	}
	else
	{
		$ms = mysqli_real_escape_string ($connect, trim ($_POST['Mother_salary']));
	}
	
	//check for a status
	if (empty($_POST['Status']))
	{
		$error [] = 'You forgot to enter your status.';
	}
	else
	{
		$st = mysqli_real_escape_string ($connect, trim ($_POST['Status']));
	}
	
	//check for a sibling
	if (empty($_POST['Sibling']))
	{
		$error [] = 'You forgot to enter your sibling.';
	}
	else
	{
		$sib = mysqli_real_escape_string ($connect, trim ($_POST['Sibling']));
	}
	
	//check for a gender
	if (empty($_POST['Gender']))
	{
		$error [] = 'You forgot to enter your gender .';
	}
	else
	{
		$g = mysqli_real_escape_string ($connect, trim ($_POST['Gender']));
	}
	
	//check for a username
	if (empty($_POST['Username']))
	{
		$error [] = 'You forgot to enter your username.';
	}
	else
	{
		$u = mysqli_real_escape_string ($connect, trim ($_POST['Username']));
	}
	
	//check for a password
	if (empty($_POST['Password']))
	{
		$error [] = 'You forgot to enter your password .';
	}
	else
	{
		$p = mysqli_real_escape_string ($connect, trim ($_POST['Password']));
	}
	
	//if no problem occured
	if (empty($error))
	{
		$q = "SELECT No_id From student WHERE Ic_num = '$ic' AND No_id != $id";
		$result = @mysqli_query($connect, $q);
		
		if (mysqli_num_rows($result) == 0)
		{
			$q = "UPDATE student SET Name='$n', Address='$add', Phone_num='$t', Ic_num='$ic', Course='$c', Father_name='$fn', Mother_name='$mn', Father_num='$ft', Mother_num='$mt', Father_salary='$fs', Mother_salary='$ms', Status='$st', Sibling='$sib', Gender='$g' WHERE No_id ='$id' LIMIT 1";
			
			$result = @mysqli_query($connect, $q);
			
			if (@mysqli_affected_rows($connect) == 1)
			{
				echo '<h3> The user has been edited </h3>';
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
	
	$q = "SELECT Name, No_id, Address, Phone_num, Ic_num, Course, Father_name, Mother_name, Father_num, Mother_num, Father_salary, Mother_salary, Status, Sibling, Gender, Username, Password FROM student WHERE No_id=$id";
	
	$result = @mysqli_query ($connect, $q);
	
	if (mysqli_num_rows($result) == 1)
	{
		//get student information
		$row = mysqli_fetch_array ($result, MYSQLI_NUM);
		//create form
		echo '<form action="edit_student.php" method="post">
		
		<p><label class = "label" for="Name"> Name : </label>
		<input id = "Name" type="text" name="Name" size="30" maxlength="30" value="'.$row[0].'"></p>
		
		<p><label class = "label" for="Address"> Address : </label>
		<input id = "Address" type="text" name="Address" size="130" maxlength="130" value="'.$row[2].'"></p>
		
		<p><label class = "label" for="Phone_num"> Telephone : </label>
		<input id = "Phone_num" type="text" name="Phone_num" size="30" maxlength="30" value="'.$row[3].'"></p>
		
		<p><label class = "label" for="Ic_num"> No IC : </label>
		<input id = "Ic_num" type="text" name="Ic_num" size="30" maxlength="30" value="'.$row[4].'"></p>
		
		<p><label class = "label" for="Course"> Course : </label>
		<input id = "Course" type="text" name="Course" size="30" maxlength="30" value="'.$row[5].'"></p>
		
		<p><label class = "label" for="Father_name"> Father Name : </label>
		<input id = "Father_name" type="text" name="Father_name" size="30" maxlength="30" value="'.$row[6].'"></p>
		
		<p><label class = "label" for="Mother_name"> Mother Name : </label>
		<input id = "Mother_name" type="text" name="Mother_name" size="30" maxlength="30" value="'.$row[7].'"></p>

		<p><label class = "label" for ="Father_num"> Father Phone Number : *</label>
		<input id = "Father_num" type="text" name="Father_num" size = "30" maxlength ="30"
		value="'.$row[8].'"></p>

		<p><label class = "label" for ="Mother_num"> Mother Phone Number : *</label>
		<input id = "Mother_num" type="text" name="Mother_num" size = "30" maxlength ="30"
		value="'.$row[9].'"></p>

		<p><label class = "label" for ="Father_salary"> Father Salary per month : *</label>
		<input id = "Father_salary" type="decimal" name="Father_salary" size = "7" maxlength ="8"
		value="'.$row[10].'"></p>

		<p><label class = "label" for ="Mother_salary"> Mother Salary per month : *</label>
		<input id = "Mother_salary" type="decimal" name="Mother_salary" size = "7" maxlength ="8"
		value="'.$row[11].'"></p>

		<p><label class = "label" for ="Status"> Mother Salary per month : *</label>
		<input id = "Status" type="decimal" name="Status" size = "7" maxlength ="8"
		value="'.$row[12].'"></p>

		<p><label class = "label" for ="Sibling"> Sibling : *</label>
		<input id = "Sibling" type="int" name="Sibling" size = "30" maxlength ="30"
		value="'.$row[13].'"></p>

		<p><label class = "label" for ="Gender"> Mother Salary per month : *</label>
		<input id = "Gender" type="decimal" name="Gender" size = "7" maxlength ="8"
		value="'.$row[14].'"></p>

		<p><label class = "label" for ="Username"> Username : *</label>
		<input id = "Username" type="text" name="Username" size = "30" maxlength ="30"
		value="'.$row[15].'"></p>

		<p><label class = "label" for ="Password"> Password : *</label>
		<input id = "Password" type="Password" name="Password" size = "12" maxlength ="12"
		value="'.$row[16].'"></p>

		<br><p><input id="submit" type="submit" name="submit" value"Edit"></p>
		<br><input type="hidden" name="id" value="'.$id.'"/>
		</form>';
	}
	else
	{
		echo '<p class="error"> This page has been accessed in error.</p>';
	}
	mysqli_close ($connect);
?>
</body>
</html>