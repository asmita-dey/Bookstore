<?php
// the shopping cart needs sessions, to start one
/*
		Array of session(
			cart => array (
				book_isbn (get from $_POST['book_isbn']) => number of books
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
require_once "./functions/cart_functions.php";

// book_isbn got from form post method, change this place later.
if (isset($_POST['bookisbn'])) {
	$book_isbn = $_POST['bookisbn'];
}

if (isset($book_isbn)) {
	// new iem selected
	if (!isset($_SESSION['cart'])) {
		// $_SESSION['cart'] is associative array that bookisbn => qty
		$_SESSION['cart'] = array();

		$_SESSION['total_items'] = 0;
		$_SESSION['total_price'] = '0.00';
	}

	if (!isset($_SESSION['cart'][$book_isbn])) {
		$_SESSION['cart'][$book_isbn] = 1;
	} elseif (isset($_POST['cart'])) {
		$_SESSION['cart'][$book_isbn]++;
		unset($_POST);
	}
}

// if save change button is clicked , change the qty of each bookisbn
if (isset($_POST['save_change'])) {
	foreach ($_SESSION['cart'] as $isbn => $qty) {
		if(!is_numeric($_POST["$isbn"])){
			echo '<script>alert("Quantity must have numeric value!!");
			window.location = "cart.php";
			</script>';
		}
		else if ($_POST["$isbn"] == '0' || $_POST["$isbn"] == null) {
			unset($_SESSION['cart']["$isbn"]);
		} 
		else if($_POST["$isbn"]<0){
			echo '<script>alert("Quantity cannot be negative!!");
			window.location = "cart.php";
			</script>';
		}
		else {
			$_SESSION['cart']["$isbn"] = $_POST["$isbn"];
		}
	}
}

// print out header here
$title = "Your shopping cart";
require "./template/header.php";

if (isset($_SESSION['cart']) && (array_count_values($_SESSION['cart']))) {
	$_SESSION['total_price'] = total_price($_SESSION['cart']);
	$_SESSION['total_items'] = total_items($_SESSION['cart']);
?>
<head><link rel="stylesheet" href="bootstrap/css/style.css"></head>
	<form action="cart.php" method="post"><br>
		<table class="table">
			<tr>
				<th>&nbsp;</th>
				<th>Item</th>
				<th>Image</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Action</th>
				<th>Total</th>
			</tr>
			<?php
			foreach ($_SESSION['cart'] as $isbn => $qty) {
				$conn = db_connect();
				$book = mysqli_fetch_assoc(getBookByIsbn($conn, $isbn));
			?>
				<tr>
					<td>&nbsp;</td>
					<td><?php echo $book['book_title'] . " by " . $book['book_author']; ?></td>
					<td><img class="img-responsive img-thumbnail" src="http://localhost/bookstore/bootstrap/img/<?php echo $book['book_image']; ?>" /></td>
					<td><?php echo "Rs" . $book['book_price']; ?></td>
					<td><input type="number" value="<?php echo $qty; ?>" size="2" name="<?php echo $isbn; ?>"></td>
					<td><input type="submit" class="button1" style="padding:10px 14px; font-size: 14px" name="save_change" value="Update"></td>
					<td><?php echo "Rs" . $qty * $book['book_price']; ?></td>
				</tr>
			<?php } ?>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td><b><?php echo $_SESSION['total_items']; ?></b></td>
				<td>&nbsp;</td>
				<td>&nbsp;&nbsp;<b><?php echo "Rs" . $_SESSION['total_price']; ?></b></td>
			</tr>
		</table>
	</form>
	<br /><br />
	<a href="checkout.php" class="button" style="padding: 12px 15px;font-size: 18px; margin-left: 40px;">Purchase</a>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="book_fetch.php" style="padding: 12px 15px;font-size: 18px"
	class="button">Continue Shopping</a>
<?php
} else {
	echo "<br><h4><p class=\"text-warning\"><center>Your cart is empty! Please make sure you add some books in it!</center></p></h4>";
}
if (isset($conn)) {
	mysqli_close($conn);
}
require_once "./template/footer3.php";
?>