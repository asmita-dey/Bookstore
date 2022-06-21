<?php
	session_start();
	if(!$_SESSION['inputName'])
  	{
    header("Location: admin.php");
  	}
	$title = "Customers";
	require_once "./template/header3.php";
	require_once "./functions/database_functions.php";
	$conn = db_connect();

	$query1 = "SELECT order_items.book_isbn, order_items.quantity, orders.customerid, orders.amount, orders.date,
    orders.ship_name, orders.ship_address, orders.ship_city, orders.ship_zip_code, orders.ship_country FROM order_items INNER JOIN orders ON 
    order_items.orderid = orders.orderid";
	$result1 = mysqli_query($conn, $query1);

	if(!$result1){
		echo "Empty!";
		exit;
	}
?>
   <head>  
   <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="search.css">
   <link rel="stylesheet" href="bootstrap/css/style.css"> 
   <style>
	.table{
		width: 100%;
		border:3px black;
		padding-right:50px;
		padding: 100px 100px 100px 100px;
		margin-left: 18px;
		border-spacing: 30px;
		text-align: center;
		background-color: white;
		box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
		justify-content: justify;
	}
	tr{
		text-align: center;
	}
	td{
		text-align: center;
	}
	th{
		text-align: center;
		font-size: 1.7rem;
	}
	
	</style>
	</head>

   <br>
   <div class="search" style="width: 60%;padding:20px;font-size:1.8rem">
   <form action="customer_search.php" method = "POST">
   <input type="text" placeholder=" Search....."  name="search"/>
   <button>   
   <i class="fa fa-search"  style="font-size: 18px;"> </i>
   </button>   
   </form>   
   </div>
	<table class="table" style="margin-top: 20px">
		<tr>
			<td></td>
		</tr>
		<tr>
			<th>Book ISBN</th>
            <th>Quantity</th>
			<th>Customer Id</th>
			<th>Amount</th>
			<th>Date</th>
			<th>Name</th>
			<th>Address</th>
			<th>City</th>
			<th>Pincode</th>
            <th>Country</th>
		</tr>
		<?php while($row1 = mysqli_fetch_assoc($result1)){ ?>
		<tr>
			<td><?php echo $row1['book_isbn']; ?></td>
            <td><?php echo $row1['quantity']; ?></td>
			<td><?php echo $row1['customerid']; ?></td>
            <td>Rs. <?php echo $row1['amount']; ?></td>
			<td><?php echo $row1['date']; ?></td>
            <td><?php echo $row1['ship_name']; ?></td>
            <td><?php echo $row1['ship_address']; ?></td>
            <td><?php echo $row1['ship_city']; ?></td>
            <td><?php echo $row1['ship_zip_code']; ?></td>
            <td><?php echo $row1['ship_country']; ?></td>
        </tr>
		<?php } ?>
		<tr>
		<td><td></td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
		</tr>
	</table>
<?php
	if(isset($conn)) {mysqli_close($conn);}
?>