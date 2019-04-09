<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Untitled Document</title>
</head>

<body>
<p>
    <?php include ("banner.html"); ?>
</p>
	<?php include ("header.php"); ?>
	
	<?php
	//this section processes submissions from the login form
	//check if the form has been submitted
	if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {
		//validate the username
		if ( !empty( $_POST[ 'Username' ] ) ) {
			$u = mysqli_real_escape_string( $connect, $_POST[ 'Username' ] );
		} else {
			$u = FALSE;
			echo '<p class="error"> You forgot to enter your username. </p>';
		}

		//validate the password
		if ( !empty( $_POST[ 'Password' ] ) ) {
			$p = mysqli_real_escape_string( $connect, $_POST[ 'Password' ] );
		} else {
			$p = FALSE;
			echo '<p class="error"> You forgot to enter your password. </p>';
		}

		//if no problem
		if ( $u && $p ) {
			//retrieve the id, first name, last name, for the username and password combination
			$q = "SELECT Name, No_id, Address, Phone_num, Ic_num, Course, Father_name, Mother_name, Father_num, Mother_num, Father_salary, Mother_salary, Status, Sibling, Gender, Username, Password FROM student WHERE (username = '$u' AND password = '$p')";

			//run the query and assign it to the variable $result
			$result = mysqli_query( $connect, $q );

			//count the number of rows that match the username/password combination
			//if one database row (record) matches the input
			if ( @mysqli_num_rows( $result ) == 1 ) {
				//start the session, fetch the record and insert the three values in an array
				session_start();
				$_SESSION = mysqli_fetch_array( $result, MYSQLI_ASSOC );

				echo '<p>Successful.</p>';
				//cancel the rest of the script
				exit();

				mysqli_free_result( $result );
				mysqli_close( $connect );
			}
			//else if no match was made
			else {
				echo '<p class="error">The username and password entered do not match our records.<br>
				Perhaps you need to register, just click the Register button.</p>';
			}
		}
		//if there was a problem
		else {
			echo '<p class="error"> Please try again. </p>';
		}
		mysqli_close( $connect );
		//end of submit conditional
	}
	?>

	<h2 align="center">LOGIN</h2>

	<form action="login.php" method="post">
		<p><label class="label" for="Username">Username:</label>
			<input id="Username" type="text" name="Username" size="30" maxlength="60" value="<?php if (isset($_POST['Username'])) echo $_POST['Username'];?>">
		</p>

		<p><label class="label" for="Password">Password:</label>
			<input id="Password" type="password" name="Password" size="30" maxlength="60" value="<?php if (isset($_POST['Password'])) echo $_POST['Password'];?>">
		</p>
		<p>&nbsp;</p>
		<p align="left">
			<input id="submit" type="submit" name="submit" value="login"/>
		</p>
	</form>
	<p align="center">&nbsp;&nbsp;&nbsp;&nbsp; Don't have an account?
	<a href="register.php">Sign Up</a></p>
</body>
</html>