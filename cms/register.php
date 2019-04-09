<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php include ("header.php");?>

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

//check for a address
	if (empty($_POST['Address'])) {
		$error [] = 'You forgot to enter your address.';
	}
	else {
		$add = mysqli_real_escape_string ($connect, trim ($_POST ['Address']));
	}
	
//check for a course
	if (empty($_POST['Phone_num'])){
		$error [] = 'You forgot to enter your Phone Number.';
	}
	else {
		$t = mysqli_real_escape_string ($connect, trim ($_POST ['Phone_num']));
	}	

//check for a course
	if (empty($_POST['Ic_num'])){
		$error [] = 'You forgot to enter your IC Number.';
	}
	else {
		$ic = mysqli_real_escape_string ($connect, trim ($_POST ['Ic_num']));
	}
	
//check for a course
	if (empty($_POST['Course'])){
		$error [] = 'You forgot to enter your Course.';
	}
	else {
		$c = mysqli_real_escape_string ($connect, trim ($_POST ['Course']));
	}
	
//check for a father name
	if (empty($_POST['Father_name'])){
		$error [] = 'You forgot to enter your Father name.';
	}
	else {
		$fn = mysqli_real_escape_string ($connect, trim ($_POST ['Father_name']));
	}	
	
//check for a mother name
	if (empty($_POST['Mother_name'])){
		$error [] = 'You forgot to enter your Mother name.';
	}
	else {
		$mn = mysqli_real_escape_string ($connect, trim ($_POST ['Mother_name']));
	}	
	
//check for a Father number telephone
	if (empty($_POST['Father_num'])){
		$error [] = 'You forgot to enter your Father phone number.';
	}
	else {
		$ft = mysqli_real_escape_string ($connect, trim ($_POST ['Father_num']));
	}	
	
//check for a Mother number telephone
	if (empty($_POST['Mother_num'])){
		$error [] = 'You forgot to enter your Mother phone number.';
	}
	else {
		$mt = mysqli_real_escape_string ($connect, trim ($_POST ['Mother_num']));
	}	
	
//check for a Father Salary
	if (empty($_POST['Father_salary'])){
		$error [] = 'You forgot to enter your Father Salary.';
	}
	else {
		$fs = mysqli_real_escape_string ($connect, trim ($_POST ['Father_salary']));
	}
	
//check for a Mother salary
	if (empty($_POST['Mother_salary'])){
		$error [] = 'You forgot to enter your Mother salary.';
	}
	else {
		$ms = mysqli_real_escape_string ($connect, trim ($_POST ['Mother_salary']));
	}
	
//check for a status
	if (empty($_POST['Status'])){
		$error [] = 'You forgot to enter your status.';
	}
	else {
		$st = mysqli_real_escape_string ($connect, trim ($_POST ['Status']));
	}	
	
//check for a sibling
	if (empty($_POST['Sibling'])){
		$error [] = 'You forgot to enter your sibling.';
	}
	else {
		$sib = mysqli_real_escape_string ($connect, trim ($_POST ['Sibling']));
	}
	
//check for a gender
	if (empty($_POST['Gender'])){
		$error [] = 'You forgot to enter your gender.';
	}
	else {
		$g = mysqli_real_escape_string ($connect, trim ($_POST ['Gender']));
	}
	
//check for a username
	if (empty($_POST['Username'])){
		$error [] = 'You forgot to enter your username.';
	}
	else {
		$u = mysqli_real_escape_string ($connect, trim ($_POST ['Username']));
	}					
	
//check for a Password
	if (empty($_POST['Password'])){
		$error [] = 'You forgot to enter your Password.';
	}
	else {
		$p = mysqli_real_escape_string ($connect, trim ($_POST ['Password']));
	}
	
//register the user in database
//make the query: 

	$q = "Insert INTO student (Name, No_id, Address, Phone_num, Ic_num, Course, Father_name, Mother_name, Father_num, Mother_num, Father_salary, Mother_salary, Status, Sibling, Gender, Username, Password)
	VALUES ('$n', ' ', '$add', '$t', '$ic', '$c', '$fn', '$mn', '$ft', '$mt', '$fs', '$ms', '$st', '$sib', '$g', '$u', '$p')";
	
	$result = @mysqli_query ($connect, $q); // run the query
	if ($result){ //if it runs
	echo '<h1>thank you </h1>';
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

<h2> Register </h2>
<h4> *required field </h4>
<form action="register.php" method = "post">

<p><label class = "label" for = "Name"> Name : *</label>
<input id = "Name" type= "text" name = "Name" size"30" maxlength="30"
value="<?php if (isset($_POST['Name'])) echo $_POST ['Name']; ?> " /></p>

<p><label class = "label" for = "Address"> Address : *</label>
<textarea name = "Address" rows="5" cols="40"><?php if (isset($_POST['Address'])) echo $_POST ['Address']; ?></textarea>

<p><label class = "label" for = "Phone_num"> Telephone : *</label>
<input id = "Phone_num" type= "text" name = "Phone_num" size"12" maxlength="15"
value="<?php if (isset($_POST['Phone_num'])) echo $_POST ['Phone_num']; ?> " /></p>

<p><label class = "label" for = "Ic_num"> Ic Number : *</label>
<input id = "Ic_num" type= "text" name = "Ic_num" size"14" maxlength="30"
value="<?php if (isset($_POST['Ic_num'])) echo $_POST ['Ic_num']; ?> " /></p>

<p><label class = "label" for ="Course"> Course :</label>
<input type = "radio" name="Course" <?php if(isset ($Course) && $Course == "FT001") echo "checked"
;?> value = "FT001" /> FT001
<input type = "radio" name="Course" <?php if(isset ($Course) && $Course == "CC101") echo "checked"
;?> value = "CC101" /> CC101
<input type = "radio" name="Course" <?php if(isset ($Course) && $Course == "CC202") echo "checked"
;?> value = "CC202" /> CC202
<input type = "radio" name="Course" <?php if(isset ($Course) && $Courser == "CT203") echo "checked"
;?> value = "CT203" /> CT203

<p><label class = "label" for ="Father_name"> Father Name : *</label>
<input id = "Father_name" type="text" name="Father_name" size = "30" maxlength ="30"
value="<?php if (isset($_POST['Father_name'])) echo $_POST ['Father_name']; ?>" /></p>

<p><label class = "label" for ="Mother_name"> Mother Name : *</label>
<input id = "Mother_name" type="text" name="Mother_name" size = "30" maxlength ="30"
value="<?php if (isset($_POST['Mother_name'])) echo $_POST ['Mother_name']; ?>" /></p>

<p><label class = "label" for ="Father_num"> Father Phone Number : *</label>
<input id = "Father_num" type="text" name="Father_num" size = "30" maxlength ="30"
value="<?php if (isset($_POST['Father_num'])) echo $_POST ['Father_num']; ?>" /></p>

<p><label class = "label" for ="Mother_num"> Mother Phone Number : *</label>
<input id = "Mother_num" type="text" name="Mother_num" size = "30" maxlength ="30"
value="<?php if (isset($_POST['Mother_num'])) echo $_POST ['Mother_num']; ?>" /></p>

<p><label class = "label" for ="Father_salary"> Father Salary per month : *</label>
<input id = "Father_salary" type="decimal" name="Father_salary" size = "7" maxlength ="8"
value="<?php if (isset($_POST['Father_salary'])) echo $_POST ['Father_salary']; ?>" /></p>

<p><label class = "label" for ="Mother_salary"> Mother Salary per month : *</label>
<input id = "Mother_salary" type="decimal" name="Mother_salary" size = "7" maxlength ="8"
value="<?php if (isset($_POST['Mother_salary'])) echo $_POST ['Mother_salary']; ?>" /></p>

<p><label class = "label" for ="Status"> Status : *</label>
<input type = "radio" name="Status" <?php if (isset ($Status) && $Status == "Single") echo
"checked";?> value = "Single" /> Single

<input type = "radio" name="Status" <?php if (isset ($Status) && $Status == "Married") echo
"checked";?> value = "Married" /> Married

<input type = "radio" name="Status" <?php if (isset ($Status) && $Status == "Widow") echo
"checked";?> value = "Widow" /> Widow

<input type = "radio" name="Status" <?php if (isset ($Status) && $Status == "Doubt") echo
"checked";?> value = "Doubt" /> Doubt

<p><label class = "label" for ="Sibling"> Sibling : *</label>
<input id = "Sibling" type="int" name="Sibling" size = "30" maxlength ="30"
value="<?php if (isset($_POST['Sibling'])) echo $_POST ['Sibling']; ?>" /></p>

<p><label class = "label" for ="Gender"> Gender : *</label>
<input type = "radio" name="Gender" <?php if (isset ($Gender) && $Gender == "female") echo
"checked";?> value = "female" /> Female

<input type = "radio" name="Gender" <?php if (isset ($Status) && $Gender == "male") echo
"checked";?> value = "male" /> Male

<p><label class = "label" for ="Username"> Username : *</label>
<input id = "Username" type="text" name="Username" size = "30" maxlength ="30"
value="<?php if (isset($_POST['Username'])) echo $_POST ['Username']; ?>" /></p>

<p><label class = "label" for ="Password"> Password : *</label>
<input id = "Password" type="Password" name="Password" size = "12" maxlength ="12"
value="<?php if (isset($_POST['Password'])) echo $_POST ['Password']; ?>" />
&nbsp;&nbsp; Between 8 and 12 characters</p>

<p><input id= "submit" type="submit" name="submit" value="Register" /></p>
</form>
<p>
			
	
</body>
</html>