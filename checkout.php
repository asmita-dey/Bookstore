<?php
// the shopping cart needs sessions, to start one
/*
		Array of session(
			cart => array (
				book_isbn (get from $_GET['book_isbn']) => number of books
			),
			items => 0,
			total_price => '0.00'
		)
	*/
session_start();
if(!$_SESSION['email'])
{
  header("Location: user_login.php");
}
require_once "./functions/database_functions.php";
// print out header here
$title = "Checking out";
require "./template/header.php";

if (isset($_SESSION['cart']) && (array_count_values($_SESSION['cart']))) {
?>
<head><link rel="stylesheet" href="bootstrap/css/style.css"></head>
	<br><table class="table">
		<tr>
			<th>&nbsp;&nbsp;&nbsp;&nbsp;Item</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Total</th>
		</tr>
		<?php
		foreach ($_SESSION['cart'] as $isbn => $qty) {
			$conn = db_connect();
			$book = mysqli_fetch_assoc(getBookByIsbn($conn, $isbn));
		?>
			<tr>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $book['book_title'] . " by " . $book['book_author']; ?></td>
				<td><?php echo "Rs" . $book['book_price']; ?></td>
				<td><?php echo $qty; ?></td>
				<td><?php echo "Rs" . $qty * $book['book_price']; ?></td>
			</tr>
		<?php } ?>
		<tr>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th><?php echo $_SESSION['total_items']; ?></th>
			<th><?php echo "Rs" . $_SESSION['total_price']; ?></th>
		</tr>
	</table>
	<br>
	<form method="post" action="pay.php" class="form-horizontal">
		<?php if (isset($_SESSION['err']) && $_SESSION['err'] == 1) { ?>
			<p class="text-danger">All fields have to be filled</p>
		<?php } ?>
		<div class="form-group">
			<label for="name" class="control-label col-md-4">Name</label>
			<div class="col-lg-6">
				<input type="text" id="name" name="name" class="col-md-4" class="form-control" onkeypress = "press(event)">
			</div>
		</div>
		
		<div class="form-group">
			<label for="address" class="control-label col-md-4">Address</label>
			<div class="col-lg-6">
				<input type="text" id="address", name="address" class="col-md-4" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label for="city" class="control-label col-md-4">City</label>
			<div class="col-lg-6">
				<input type="text" id="city", name="city" class="col-md-4" class="form-control" onkeypress = "press(event)">
			</div>
		</div>
		<div class="form-group">
			<label for="zip_code" class="control-label col-md-4">Pin Code</label>
			<div class="col-lg-6">
				<input type="text" id="zip_code", name="zip_code" class="col-md-4" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label for="country" class="control-label col-md-4">Country</label>
			<div class="col-lg-6">
				<input type="text" id="country", name="country"  class="col-md-4" class="form-control" onkeypress = "press(event)">
			</div>
		</div>
		
		<br>
		<br>
		<div class="form-group">
			<button id="rzp-button1" style="font-size: 1.7rem;margin-left:57px; padding:8px 16px;" type="button" name="submit" value="Purchase" class="button">Purchase</button>
		</div>
		
	</form>
	<a href="cart.php" style="font-size: 1.8rem;margin-left:40px; padding:10px 24px;" class="button1">Cancel</a>
	<br>

	<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
	<script>
		function press(event){
			if(!(event.keyCode>64 && event.keyCode<91)&&!(event.keyCode>96 && event.keyCode<123)&&!(event.keyCode == 32))
			{
				alert("Can only use letters for name.");
			}
		}
		document.getElementById('rzp-button1').onclick = async function(e) {

			const rawResponse = await fetch('http://localhost/bookstore/pay.php?amt=<?php echo $_SESSION['total_price'] ?>', {
				method: 'GET',
				headers: {
					'Accept': 'application/json',
					'Content-Type': 'application/json'
				},
			});
			const content = await rawResponse.json();

			var options = {
				"key": "rzp_test_TZZFBpHc7KQlbn", // Enter the Key ID generated from the Dashboard
				"amount": <?php echo $_SESSION['total_price'] * 100 ?>, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
				"currency": "INR",
				"name": "TechHub",
				"description": "Transaction",
				"order_id": content.id,
				"handler": function(response) {
					window.location.href = `http://localhost/bookstore/payment-success.php?name=${document.getElementById("name").value}&address=${document.getElementById("address").value}
					&city=${document.getElementById("city").value}&zip_code=${document.getElementById("zip_code").value}&country=${document.getElementById("country").value}`
				},
			};
			var rzp1 = new Razorpay(options);
			rzp1.on('payment.failed', function(response) {
				alert("Payment failed");
			});

			rzp1.open();
			e.preventDefault();
		}
	</script>
<?php
} else {
	echo "<p class=\"text-warning\">Your cart is empty! Please make sure you add some books in it!</p>";
}
if (isset($conn)) {
	mysqli_close($conn);
}
require_once "./template/footer3.php";
?>
       