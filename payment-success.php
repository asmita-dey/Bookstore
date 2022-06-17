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
<<<<<<< HEAD
    $name = $_GET['name'];
	$address = $_GET['address'];
	$city = $_GET['city'];
	$zip_code = $_GET['zip_code'];
	$country = $_GET['country'];
=======
	var_dump($_GET);
    extract($_SESSION['ship']);
>>>>>>> 6c09f02396f364b75a7197459c10f2eeb969cfdf
   
   if(isset($_SESSION['cart']) && (array_count_values($_SESSION['cart']))){
    $customerid = getCustomerId($name, $address, $city, $zip_code, $country);
	if($customerid == null) {
		// insert customer into database and return customerid
		$customerid = setCustomerId($name, $address, $city, $zip_code, $country);
	}
	$date = date("Y-m-d H:i:s");
    $_SESSION['total_price'] = total_price($_SESSION['cart']);
	$amount=$_SESSION['total_price'];
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
        text-align: center;
		justify-content: center;
    }
</style>
</head>
<body>
<div class = "pay">
<p>Do not refresh this page</p> 
<img src = "https://freepngimg.com/thumb/green_tick/27894-7-green-tick-transparent-background-thumb.png">
<h3 style="color: green;"><b>Payment Successfull!!</b></h3>
<p class="lead text-success">Your order has been placed sucessfully!!!!!Your Customer ID is <?php echo "$customerid"; ?></p>
<table class="table">
         <tr>
			 <td>Order_ID: <?php echo "$orderid"; ?></td>
			 <td>Book_ISBN: <?php echo "$isbn"; ?></td>
			 <td>Amount: Rs.<?php echo "$amount"; ?></td> 	
</table>	
</div>
<p>Save this for future reference.</p>
<?php
    if(isset($conn)){
        mysqli_close($conn);
    }
	require_once "./template/footer3.php";
?>