<?php
	session_start();
	$title = "Customers";
	require_once "./template/header3.php";
	require_once "./functions/database_functions.php";
	$conn = db_connect();

    $image = $_POST['search'];
	$query1 = "SELECT order_items.book_isbn, order_items.quantity, orders.customerid, orders.amount, orders.date,
    orders.ship_name, orders.ship_address, orders.ship_city, orders.ship_zip_code, orders.ship_country FROM order_items INNER JOIN orders ON 
    order_items.orderid = orders.orderid WHERE orders.ship_name LIKE '%$image%' OR orders.ship_address LIKE '%$image%' OR orders.ship_city LIKE '%$image%'";
	$result1 = mysqli_query($conn, $query1);

	if(!$result1){
		echo "Empty!";
		exit;
	}
?>
   <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="search.css">
   <br>
   <div class="search">
   <form action="customer_search.php" method = "POST">
   <input type="text" placeholder=" Search....."  name="search"/>
   <button>   
   <i class="fa fa-search"  style="font-size: 18px;"> </i>
   </button>   
   </form>   
   </div>
	<table class="table" style="margin-top: 20px">
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
	</table>
<?php
	if(isset($conn)) {mysqli_close($conn);}
?>