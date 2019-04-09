<?php
include('config.php');
if(isset($_REQUEST["submit"]))
{
	$user=$_REQUEST["user"];
	$pass=$_REQUEST["pass"];
	$add=$_REQUEST["address"];
	$gender=$_REQUEST["gender"];
	$country=$_REQUEST["country"];
	$education=$_REQUEST["education"];
	$b=implode(",",$education);
	$file=$_FILES["file"]["name"];
	$tmp_name=$_FILES["file"]["tmp_name"];
	$path="image/".$file;
	$file1=explode(".",$file);
	$ext=$file1[1];
	$allowed=array("jpg","png","gif","pdf","wmv");
	if(in_array($ext,$allowed))
	{
 move_uploaded_file($tmp_name,$path);
	
	
	
	mysql_query("insert into user(user,pass,address,gender,country,education,file)values('$user','$pass','$add','$gender','$country','$b','$file')");
	header('location:select.php');
	
	}
}
?>



<form method="post"  enctype="multipart/form-data">
Name:<Input type="text" name="Name"><br><br>
Password:<input type="password" name="pass"><br><br>
Address:<textarea name="address"></textarea><br><br>
Gender:<input type="radio" name="gender" value="male">Male<input type="radio"name="gender" value="female">Female<br><br>
Destination:
<select name="Destination"
<option value=" ">Destination</option>
<option value="Royale Chulan Kuala Lumpur Superior Room">Royale Chulan Kuala Lumpur Superior Room</option>
<option value="Royale Chulan Kuala Lumpur Deluxe Room">Royale Chulan Kuala Lumpur Deluxe Room</option>
<option value="Royale Chulan Kuala Lumpur Premier Room">Royale Chulan Kuala Lumpur Premier Room</option>
<option value="Royale Chulan Damansara Superior Room">Royale Chulan Damansara Superior Room</option>
<option value="Royale Chulan Damansara Deluxe Room">Royale Chulan Damansara Deluxe Room</option>
<option value="Royale Chulan Damansara Premier Deluxe">Royale Chulan Damansara Premier Deluxe</option>
<option value="Royale Chulan Bukit Bintang Superior Room">Royale Chulan Bukit Bintang Superior Room</option>
<option value="Royale Chulan Bukit Bintang Deluxe Room">Royale Chulan Bukit Bintang Deluxe Room</option>
<option value="Royale Chulan Bukit Bintang Deluxe Club">Royale Chulan Bukit Bintang Deluxe Club</option>
<option value="Royale Chulan The Curve Superior Room">Royale Chulan The Curve Superior Room</option>
<option value="Royale Chulan The Curve Deluxe Room">Royale Chulan The Curve Deluxe Room</option>
<option value="Royale Chulan The Curve Studio Deluxe">Royale Chulan The Curve Studio Deluxe</option>
</select>


<p>
Food:
<select name = "Food">
<option value=" ">Food</option>
<option value="Nasi Lemak Ayam Rendang">Nasi Lemak Ayam Rendang</option>
<option value="Steak">Steak</option>
<option value="Spaghetti">Spaghetti</option>
<option value="Lobster">Lobster</option>
<option value="Gulai Ikan Royale">Gulai Ikan Royale</option>
<option value="Gulai Udang Royale">Gulai Udang Royale</option>
<option value="Kuey Teow Royale">Kuey Teow Royale</option>
<option value="Tomyam Royale">Tomyam Royale</option>
<option value="Cucur Udang">Cucur Udang</option>
<option value="Chicken Chop">Chicken Chop</option>
<option value="Fish and Chip">Fish and Chip</option>
<option value="Bubur Ayam Royale">Bubur Ayam Royale</option>
<option value="Nasi Goreng Kampung">Nasi Goreng Kampung</option>
<option value="Satay Royale">Satay Royale</option>
<option value="Dim Sum">Dim Sum</option>
<option value="Chee Cheong Fun">Chee Cheong Fun</option>
<option value="Ayam Goreng Royale">Ayam Goreng Royale</option>
<option value="Mee Hailam">Mee Hailam</option>
<option value="Spicy Fried Meehon">Spicy Fried Meehon</option>
<option value="Yong Tau Foo">Yong Tau Foo</option>
<option value="Lasagna">Lasagna</option>
<option value="Macarooni Royale">Macarooni Royale</option>
<option value="Sotong Goreng Tepung">Sotong Goreng Tepung</option>
<option value="Maggi Goreng">Maggi Goreng</option>
<option value="Roti Bakar">Roti Bakar</option>
<option value="Chineese Fried Rice">Chineese Fried Rice</option>
<option value="Roti Canai">Roti Canai</option>
<option value="Curry Mee Royale">Curry Mee Royale</option>
<option value="Assam Pedas">Assam Pedas</option>
<option value="ABC">ABC</option>
<option value="Banana Split">Banana Split</option>
<option value="Cendol Royale">Cendol Royale</option>
<option value="Bubur Kacang">Bubur Kacang</option>
<option value="Rojak Buah">Rojak Buah</option>
<option value="Mushroom Soup with Garlic Bread">Mushroom Soup with Garlic Bread</option>
<option value="Royale Waffle with Ice Cream">Royale Waffle with Ice Cream</option>
<option value="No Food">No Food</option>
</select>
</p>

Education
<input type="checkbox" name="education[]" value="diploma">Diploma
<input type="checkbox" name="education[]" value="b.tech">B.tech
<input type="checkbox" name="education[]" value="mba">MBA

<br><br>
File Upload
<input type="file" name="file">
<br><br>
<input type="submit" value="insert" name="submit">
</form>