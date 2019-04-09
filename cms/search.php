<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>

<?php include ("header.php"); ?>

<h2>Search for a record</h2>
<form action = "recordFound.php" method = "post">

<p><label class = "label" for = "Name"> Name : </label>
<input id = "Name" type = "text" name = "Name" size = "30" maxlenght = "30" value = "<?php if (isset($_POST['Name'])) echo $_POST ['Name']; ?>" /></p>

<p><input id = "submit" type = "submit" name = "submit" value = "Search" /></p>
</form> 

</body>
</html>