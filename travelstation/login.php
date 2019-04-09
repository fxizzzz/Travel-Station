<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Untitled Document</title>
	<link rel=" stylesheet" type="text/css" href="css/adminstyle.css" />
</head>

<body>
</p>
	<?php include ("header.php"); ?>
	

	<?php
	//this section processes submissions from the login form
	//check if the form has been submitted
	if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {
		//validate the ID Number
		if ( !empty( $_POST[ 'Admin_id' ] ) ) {
			$ai = mysqli_real_escape_string( $connect, $_POST[ 'Admin_id' ] );
		} else {
			$ai = FALSE;
			echo 

			'<div class="error1">
				<h1><p class="error"> You forgot to enter Admin ID </p><h1>
			</div>';
		}

		//validate the IC Number
		if ( !empty( $_POST[ 'Ic_num' ] ) ) {
			$ic = mysqli_real_escape_string( $connect, $_POST[ 'Ic_num' ] );
		} else {
			$ic = FALSE;
			echo 
			
			'<div class="error2">
				<h1><p class="error"> You forgot to enter your IC Number </p><h1>
			</div>';
		}


		//if no problem
		if ( $ai && $ic ) {
			//retrieve the id, first name, last name, for the username and password combination
			$q = "SELECT Name, Admin_id, Ic_num, Phone_num FROM admin WHERE (Admin_id = '$ai' AND Ic_num = '$ic')";

			//run the query and assign it to the variable $result
			$result = mysqli_query( $connect, $q );

			//count the number of rows that match the username/password combination
			//if one database row (record) matches the input
			if ( @mysqli_num_rows( $result ) == 1 ) {
				//start the session, fetch the record and insert the three values in an array
				session_start();
				$_SESSION = mysqli_fetch_array( $result, MYSQLI_ASSOC );

				echo 
					'<div class="main">
						<div class="logo">
							<img src="logo 1.png">
						</div>

						<ul>
							<li><a href="viewCustomer.php">Customer</a></li>
							<li><a href="listCustomer.php">Edit Customer</a></li>
							<li><a href="logout.php">Log Out</a></li>
							<li><a href="index.html">Home</a></li>
						</ul>

						<div class="tittle">
							<h1>Successful. Welcome to admin page.</h1>
						</div>
					</div>';
				//cancel the rest of the script
				exit();

				mysqli_free_result( $result );
				mysqli_close( $connect );
			}
			//else if no match was made
			else {
				echo '<p class="error">The Admin ID and IC Number entered do not match our records.<br>
				Perhaps you need to register, just click the Register button.</p>';
			}
		}
		//if there was a problem
		else {
			echo 
			'<div class="error3">
				<h1><p class="error"> System Error </p><h1>
			</div>';
		}
		mysqli_close( $connect );
		//end of submit conditional
	}
	?>

	<div class="tittle">
		<h2 align="center">LOGIN</h2>

		<form action="login.php" method="post">
			<p><label class="label" for="a">ID Number :</label>
				<input id="Admin_id" type="text" name="Admin_id" size="12" maxlength="60" value="<?php if (isset($_POST['Admin_id'])) echo $_POST['Admin_id'];?>">
			</p>

			<p><label class="label" for="Ic_num">IC Number :</label>
				<input id="Ic_num" type="text" name="Ic_num" size="12" maxlength="60" value="<?php if (isset($_POST['Ic_num'])) echo $_POST['Ic_num'];?>">
			</p>

			<p>&nbsp;</p>

			<p align="center">
				<input id="submit" type="submit" name="submit" value="login"/>
			</p>
		</form>

		<p align="center">&nbsp;&nbsp;&nbsp;&nbsp; Don't have an account?
		<a href="Adminregister.php">Sign Up</a></p>
	</div>
</body>
</html>