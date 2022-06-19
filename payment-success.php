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
    $name = $_GET['name'];
	$address = $_GET['address'];
	$city = $_GET['city'];
	$zip_code = $_GET['zip_code'];
	$country = $_GET['country'];
   
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
	<link rel="stylesheet" href="bootstrap/css/style.css">

</head>
<body>
<div class = "pay">
<p><h4>Do not refresh this page</h4></p> 
<img src = "https://freepngimg.com/thumb/green_tick/27894-7-green-tick-transparent-background-thumb.png">
<h3 style="color: green;"><b>Payment Successfull!!</b></h3>
<p class="lead text-success">Your order has been placed sucessfully!! Your Customer ID is <?php echo "$customerid"; ?></p>
<table class="table" style="font-size: 1.8rem;">
         <tr>
			 <td>Order_ID: <?php echo "$orderid"; ?></td>
			 <td>Customer Name: <?php echo "$name"; ?></td>
			 <td>Customer Address: <?php echo "$address"; ?></td>
			 <td>Amount: Rs.<?php echo "$amount"; ?></td> 	
</table>	
</div>
<p><h4>&nbsp;&nbsp;&nbsp;Save this for future reference.</p></h4>
<br>
<br>
<center><a href="book_fetch.php" class="button" style="font-size: 1.6rem;padding:11px 18px">Continue Shopping</a></center>
<?php
    if(isset($conn)){
        mysqli_close($conn);
    }
	require_once "./template/footer3.php";
?>