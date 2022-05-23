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
require_once "./functions/database_functions.php";
// print out header here
$title = "Checking out";
require "./template/header.php";

if (isset($_SESSION['cart']) && (array_count_values($_SESSION['cart']))) {
?>
	<table class="table">
		<tr>
			<th>Item</th>
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
				<td><?php echo $book['book_title'] . " by " . $book['book_author']; ?></td>
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
	<form method="post" action="pay.php" class="form-horizontal">
		<?php if (isset($_SESSION['err']) && $_SESSION['err'] == 1) { ?>
			<p class="text-danger">All fields have to be filled</p>
		<?php } ?>
		<div class="form-group">
			<label for="name" class="control-label col-md-4">Name</label>
			<div class="col-md-4">
				<input id="name" type="text" name="name" class="col-md-4" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label for="address" class="control-label col-md-4">Address</label>
			<div class="col-md-4">
				<input type="text" name="address" class="col-md-4" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label for="city" class="control-label col-md-4">City</label>
			<div class="col-md-4">
				<input type="text" name="city" class="col-md-4" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label for="zip_code" class="control-label col-md-4">Pin Code</label>
			<div class="col-md-4">
				<input type="text" name="zip_code" class="col-md-4" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label for="country" class="control-label col-md-4">Country</label>
			<div class="col-md-4">
				<input type="text" name="country" class="col-md-4" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<button id="rzp-button1" type="button" name="submit" value="Purchase" class="btn btn-primary">Purchase</button>
		</div>
	</form>
	<p class="lead">Please press Purchase to confirm your purchase!</p>
	<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
	<script>
		document.getElementById('rzp-button1').onclick = async function(e) {

			const rawResponse = await fetch('/pay.php?amt=<?php echo $_SESSION['total_price'] ?>', {
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
				"name": "Tanu and Asmita",
				"description": "Test Transaction",
				"order_id": content.id,
				"prefill": {
					"email": document.getElementById("name").value
				},
				"handler": function(response) {
					window.location.href = "/payment-success.php"
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
require_once "./template/footer.php";
?>