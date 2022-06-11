<?php
	session_start();
	$_SESSION['err'] = 1;
	foreach($_POST as $key => $value){
		if(trim($value) == ''){
			$_SESSION['err'] = 0;
		}
		break;
	}

	if($_SESSION['err'] == 0){
		header("Location: checkout.php");
	} else {
		unset($_SESSION['err']);
	}
	require_once "./functions/database_functions.php";
    require_once "./functions/cart_functions.php";
	// print out header here
	$title = "Success";
	require "./template/header.php";
	// connect database
	$conn = db_connect();
    extract($_SESSION['ship']);
   
   if(isset($_SESSION['cart']) && (array_count_values($_SESSION['cart']))){
    $customerid = getCustomerId($name, $address, $city, $zip_code, $country);
	if($customerid == null) {
		// insert customer into database and return customerid
		$customerid = setCustomerId($name, $address, $city, $zip_code, $country);
	}
	$date = date("Y-m-d H:i:s");
    $_SESSION['total_price'] = total_price($_SESSION['cart']);
	insertIntoOrder($conn, $customerid, $_SESSION['total_price'], $date, $name, $address, $city, $zip_code, $country);

	// take orderid from order to insert order items
	$orderid = getOrderId($conn, $customerid);

	foreach($_SESSION['cart'] as $isbn => $qty){
		$bookprice = getbookprice($isbn);
		$query = "INSERT INTO order_items VALUES 
		('$orderid', '$isbn', '$bookprice', '$qty')";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Insert value false!" . mysqli_error($conn2);
			exit;
		}
	}
	unset($_SESSION['cart']);
    }
?>
<head>
    <style>
    .pay{
        padding-left: 430px;
    }
</style>
</head>
<body>
<div class = "pay">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src = "https://freepngimg.com/thumb/green_tick/27894-7-green-tick-transparent-background-thumb.png">
<h3 style="color: green;"><b>Payment Successfull!!</b></h3>
</div>
<p class="lead text-success">Your order has been placed sucessfully!!</p>
<?php
    if(isset($conn)){
        mysqli_close($conn);
    }
	require_once "./template/footer3.php";
?>