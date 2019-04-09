<!doctype html>
<html>

<?php  
//destroy session   
session_destroy();   
//go back to login page  
header("location:login.php");  
exit();  

?>
<body>

</body>
</html>