<?php
	session_start();
	require_once "./functions/admin.php";
	$title = "Edit book";
	require_once "./template/header3.php";
	require_once "./functions/database_functions.php";
	$conn = db_connect();

	if(isset($_GET['bookisbn'])){
		$book_isbn = $_GET['bookisbn'];
	} else {
		echo "Empty query!";
		exit;
	}

	if(!isset($book_isbn)){
		echo "Empty isbn! check again!";
		exit;
	}

	// get book data
	$query = "SELECT books.book_isbn, books.book_title,  books.book_author,  books.book_image,  books.book_descr, books.book_price,
	books.publisherid, category.category, category.genre FROM books INNER JOIN category WHERE books.book_isbn = '$book_isbn' AND books.book_isbn = category.book_isbn";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Can't retrieve data " . mysqli_error($conn);
		exit;
	}
	$row = mysqli_fetch_assoc($result);
?>

<head>
  <link rel="stylesheet" href="bootstrap/css/style.css">
  <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="search.css"> 


  <style>
	.button0{
    background-color: rgb(73, 160, 44);
    border: none;
    color: white;
    font-size: 1.8rem;
    text-align: center;
    padding: 7px 20px;
    border-radius: 4px;
	}
	.button0:hover{
    background-color: white;
    color: black;

	}
	.box-table{
		width: 100%;
		border:3px black;
		padding: 10px 10px 30px;
		margin-left: 13px;
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
		font-size: 2rem;
	}
	</style>
</head>


<body>
	<br>
	<br>
	<div class="box-table">
	<b><center><h3 class="lead" style="font-size:3rem;margin-left: 0;">EDIT BOOK</h3></b></center>
		<br>
		<br>
		<form method="post" action="edit_book.php" enctype="multipart/form-data">
		<table class="table">
			<tr>
				<th>ISBN</th>
				<td><input type="text" name="isbn" value="<?php echo $row['book_isbn'];?>" readOnly="true"></td>
			</tr>
			<tr>
				<th>Title</th>
				<td><input type="text" name="title" value="<?php echo $row['book_title'];?>" required></td>
			</tr>
			<tr>
				<th>Author</th>
				<td><input type="text" name="author" value="<?php echo $row['book_author'];?>" required></td>
			</tr>
			<tr>
				<th>Image</th>
				<td><center><input type="file" class="txt-img" style="margin-left:86px;" name="image"></center></td>
			</tr>
			<tr>
				<th>Description</th>
				<td><textarea name="descr" cols="40" rows="5"><?php echo $row['book_descr'];?></textarea>
			</tr>
			<tr>
				<th>Price</th>
				<td><input type="text" name="price" value="<?php echo $row['book_price'];?>" required></td>
			</tr>
			<tr>
				<th>Publisher</th>
				<td><input type="text" name="publisher" value="<?php echo getPubName($conn, $row['publisherid']); ?>" required></td>
			</tr>
			<tr>
				<th>Category</th>
				<td><input type="text" name="category" value="<?php echo $row['category'];?>" required></td>
			</tr>
			<tr>
				<th>Genre</th>
				<td><input type="text" name="genre" value="<?php echo $row['genre'];?>" required></td>
			</tr>
		</table>
		<input type="submit" name="save_change" value=" Save Changes" class="button" style="padding: 10px 12px 10px;font-size:1.5rem;">
		<input type="reset" value="Reset" class="button1" style="padding: 10px 15px 10px;font-size:1.5rem;">
	</form>
	<br/>
	<a href="admin_book.php" class="button0" style="padding: 10px 14px 10px;font-size:1.6rem;">Confirm</a>
	<br>
	</div>
</body>
<?php
	if(isset($conn)) {mysqli_close($conn);}
?>