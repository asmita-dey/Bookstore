<?php
	session_start();
	$name = $_POST['inputName'];
	$pswd = $_POST['inputPasswd'];
	$title = "List Book";
	require_once "./template/header.php";
	require_once "./functions/database_functions.php";
	$conn = db_connect();
	
	$query = "SELECT name, pass FROM admin";
	$query1 = "SELECT * FROM books";
	$result = mysqli_query($conn, $query);
	$result1 = mysqli_query($conn, $query1);
	if(!$result){
		echo "Empty!";
		exit;
	}
	if(!$result1){
		echo "Empty!";
		exit;
	}
	$row = mysqli_fetch_assoc($result);
	if(($name != $row['name'] || $pswd != $row['pass'])||($name == null || $pswd == null)){
		echo "<p class=\"text-warning\">Wrong username or password!!</p>";
		exit;
	}
?>
	<p class="lead"><a href="admin_add.php">Add new book</a></p>
	<a href="admin_signout.php" class="btn btn-primary">Sign out!</a>
	<table class="table" style="margin-top: 20px">
		<tr>
			<th>ISBN</th>
			<th>Title</th>
			<th>Author</th>
			<th>Image</th>
			<th>Description</th>
			<th>Price</th>
			<th>Publisher</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
		<?php while($row1 = mysqli_fetch_assoc($result1)){ ?>
		<tr>
			<td><?php echo $row1['book_isbn']; ?></td>
			<td><?php echo $row1['book_title']; ?></td>
			<td><?php echo $row1['book_author']; ?></td>
			<td><img class="img-responsive img-thumbnail" src="./bootstrap/img/<?php echo $row1['book_image']; ?>"/></td>
			<td><?php echo $row1['book_descr']; ?></td>
			<td><?php echo $row1['book_price']; ?></td>
			<td><?php echo getPubName($conn, $row1['publisherid']); ?></td>
			<td><a href="admin_edit.php?bookisbn=<?php echo $row1['book_isbn']; ?>">Edit</a></td>
			<td><a href="admin_delete.php?bookisbn=<?php echo $row1['book_isbn']; ?>">Delete</a></td>
		</tr>
		<?php } ?>
	</table>
<?php
	if(isset($conn)) {mysqli_close($conn);}
	require_once "./template/footer.php";
?>
