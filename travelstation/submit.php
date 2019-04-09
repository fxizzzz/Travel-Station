<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel=" stylesheet" type="text/css" href="css/submitstyle.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

</head>

<body>
<div style="text-align:center;">

<?php

echo 
'<div class="main">
	<div class="logo">
		<img src="logo 1.png">
	</div>

	<ul>
		<li><a href="index.html">Home</a></li>
	</ul>
</div>';

extract($_POST);

$pricehotel; 
$jumlah;
$payment;


if ($Destination == 'Royale Chulan Kuala Lumpur Superior Room')
{
	$pricehotel = 370.00;
}
else if ($Destination == 'Royale Chulan Kuala Lumpur Deluxe Room')
{
	$pricehotel = 391.00;
}

else if ($Destination == 'Royale Chulan Kuala Lumpur Premier Room')
{
	$pricehotel = 416.00;
}
else if ($Destination == 'Royale Chulan Damansara Superior Room')
{
	$pricehotel = 282.00;
}
else if ($Destination == 'Royale Chulan Damansara Deluxe Room')
{
	$pricehotel = 324.00;
}
else if ($Destination == 'Royale Chulan Damansara Premier Deluxe')
{
	$pricehotel = 342.00;
}
else if ($Destination == 'Royale Chulan Bukit Bintang Superior Room')
{
	$pricehotel = 350.00;
}
else if ($Destination == 'Royale Chulan Bukit Bintang Deluxe Room')
{
	$pricehotel = 371.00;
}
else if ($Destination == 'Royale Chulan Bukit Bintang Deluxe Club')
{
	$pricehotel = 389.00;
}
else if ($Destination == 'Royale Chulan The Curve Superior Room')
{
	$pricehotel = 267.00;
}
else if ($Destination == 'Royale Chulan The Curve Deluxe Room')
{
	$pricehotel = 278.00;
}
else if ($Destination == 'Royale Chulan The Curve Studio Deluxe')
{
	$pricehotel = 309.00;
}

else
{
	echo "Please choose your hotel";
}

if ($Food == 'Nasi Lemak Ayam Rendang')
{
	$jumlah = $pricehotel + 18.00;
}

else if ($Food == 'Steak')
{
	$jumlah = $pricehotel + 40.00;
}

else if ($Food == 'Spaghetti')
{
	$jumlah = $pricehotel + 22.00;
}

else if ($Food == 'Lobster')
{
	$jumlah = $pricehotel + 30.00;
}

else if ($Food == 'Gulai Ikan Royale')
{
	$jumlah = $pricehotel + 25.00;
}

else if ($Food == 'Gulai Udang Royale')
{
	$jumlah = $pricehotel + 28.00;
}

else if ($Food == 'Kuey Teow Royale')
{
	$jumlah = $pricehotel + 13.00;
}

else if ($Food == 'Tomyam Royale')
{
	$jumlah = $pricehotel + 21.00;
}

else if ($Food == 'Cucur Udang')
{
	$jumlah = $pricehotel + 12.00;
}

else if ($Food == 'Chicken Chop')
{
	$jumlah = $pricehotel + 28.00;
}

else if ($Food == 'Fish and Chip')
{
	$jumlah = $pricehotel + 28.00;
}

else if ($Food == 'Bubur Ayam Royale')
{
	$jumlah = $pricehotel + 13.00;
}

else if ($Food == 'Nasi Goreng Kampung')
{
	$jumlah = $pricehotel + 13.00;
}

else if ($Food == 'Satay Royale')
{
	$jumlah = $pricehotel + 10.00;
}

else if ($Food == 'Dim Sum')
{
	$jumlah = $pricehotel + 15.00;
}

else if ($Food == 'Chee Cheong Fun')
{
	$jumlah = $pricehotel + 14.00;
}

else if ($Food == 'Ayam Goreng Royale')
{
	$jumlah = $pricehotel + 9.00;
}

else if ($Food == 'Mee Hailam')
{
	$jumlah = $pricehotel + 11.00;
}

else if ($Food == 'Spicy Fried Meehon')
{
	$jumlah = $pricehotel + 12.00;
}

else if ($Food == 'Yong Tau Foo')
{
	$jumlah = $pricehotel + 10.00;
}

else if ($Food == 'Lasagna')
{
	$jumlah = $pricehotel + 28.00;
}

else if ($Food == 'Macarooni Royale')
{
	$jumlah = $pricehotel + 24.00;
}

else if ($Food == 'Sotong Goreng Tepung')
{
	$jumlah = $pricehotel + 17.00;
}

else if ($Food == 'Maggi Goreng')
{
	$jumlah = $pricehotel + 11.00;
}

else if ($Food == 'Roti Bakar')
{
	$jumlah = $pricehotel + 10.00;
}

else if ($Food == 'Chineese Fried Rice')
{
	$jumlah = $pricehotel + 13.00;
}

else if ($Food == 'Roti Canai')
{
	$jumlah = $pricehotel + 8.00;
}

else if ($Food == 'Curry Mee Royale')
{
	$jumlah = $pricehotel + 19.00;
}

else if ($Food == 'Assam Pedas')
{
	$jumlah = $pricehotel + 22.00;
}

else if ($Food == 'ABC')
{
	$jumlah = $pricehotel + 8.00;
}

else if ($Food == 'Banana Split')
{
	$jumlah = $pricehotel + 9.00;
}

else if ($Food == 'Cendol Royale')
{
	$jumlah = $pricehotel + 8.00;
}

else if ($Food == 'Bubur Kacang')
{
	$jumlah = $pricehotel + 7.00;
}

else if ($Food == 'Rojak Buah')
{
	$jumlah = $pricehotel + 6.00;
}

else if ($Food == 'Mushroom Soup with Garlic Bread')
{
	$jumlah = $pricehotel + 9.00;
}

else if ($Food == 'Royale Waffle with Ice Cream')
{
	$jumlah = $pricehotel + 12.00;
}

else if ($Food == 'No Food')
{
	$jumlah = $pricehotel + 0.00;
}

else
{
	echo "Please pick your food";
}

if($button1 == 'No')
{
	$payment = $jumlah;
}

else 
{
	$payment = $jumlah + 30.00; 
}

		echo 
			"<div class='error1'>
				<p><h2> Your Destination : $Destination </h2></p>
			</div>"
		;

		print 
			"<div class='error2'>
				<p><h2>Date of Check in : $in </h2></p>
			</div>"
		;

		print 
			"<div class='error3'>
				<p><h2>Date of Check out : $out </h2></p>
			</div>"
		;
		echo 
			"<div class='error4'>
				<p><h2> Ride with GRAB : $button1 </h2></p>
			</div"
		;
		print 
			"<p><h2> Food : $Food </h2></p>"
		;
		print("<h2>Total payment : RM $payment <br></h2>"); 

?>


<p><button onclick="myFunction()">Print your receipt for future reference</button>

<script>
function myFunction() {
    window.print();
}
</script></p>

<div class='error5'>
	<p><h2>Payment method :  </h2></p>
</div>

<div class="container">
	
	<img src="paypal-topic.png" alt="Avatar" class="image">

	<div class="overlay">
		<a href="https://www.paypal.com/my/signin"> 
			<div class="text">
				Paypal
            </div>
		</a>
	<div>
</div>

<div class="box2">
	
	<img src="how-13.png" alt="Avatar2" class="image2">

	<div class="overlay2">
		<a href="https://www.maybank2u.com.my/home/m2u/common/login.do"> 
			<div class="text2">
				Maybank 2U
            </div>
		</a>
	<div>
</div>

</div>
</div>
</div>
</body>
</html>