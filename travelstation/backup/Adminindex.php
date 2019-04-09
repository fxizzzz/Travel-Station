<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<!-- database link --> 
<?php 
	include ("header.php");
	
?>
 
	<div class="main" style="margin-left:340px;margin-right:40px"> 
 
	 <!-- Extract user data -->   
		<div class="row-padding">  
	
			<?php
	
			echo "<br>";   
			echo "Name : " . $_SESSION["Name"] . "<br>";   
			echo "ID number : " . $_SESSION["Admin_id"] . "<br>";   
			echo "IC number : " . $_SESSION["Ic_num"] . "<br>";
			echo "Phone number : " . $_SESSION["Phone_num"] . "<br>"; 
			
			?>   
		</div>   
	</div> 
 
  <!-- view data table -->   
	<div class="container" id="view" style="margin-top:75px">         
	
	   
		<div class="row-padding">  

			<?php
		
			include ("viewData.php");
		
			?> 
		</div> 
	</div>     
	
	<!-- add new data into table -->  
	<div class="container" id="add" style="margin-top:75px">
		<h1 class="xxxlarge text-red"><b>Add New.</b></h1>
		<hr style="width:50px;border:5px solid red" class="round">     
		
		<!-- add data -->   
		<div class="row-padding">  
			<?php include 
			
			("addNew.php");
			
			?>   
		</div>  
	</div> 
 
	<!-- list data -->  
	<div class="container" id="edit" style="margin-top:75px">   

		<!-- list data to edit or delete -->   
		<div class="row-padding">  
			<?php 
	
			include ("listEdit.php");
	
			?>   
		</div>  
	</div>    

 
	<!-- footer --> 
	<div class="light-grey container padding-32" style="margin-top:75px;padding-right:58px"> 
		<p class="right">&copy; Copyright Balona 2018</p> 
	</div> 

</body>
</html>