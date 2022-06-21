<?php
	session_start();
	require_once "./functions/admin.php";
	$title = "Add new book";
	require "./template/header3.php";
	require "./functions/database_functions.php";
	$conn = db_connect();

	if(isset($_POST['add'])){
		$isbn = trim($_POST['isbn']);
		$isbn = mysqli_real_escape_string($conn, $isbn);
		
		$title = trim($_POST['title']);
		$title = mysqli_real_escape_string($conn, $title);

		$author = trim($_POST['author']);
		$author = mysqli_real_escape_string($conn, $author);
		
		$descr = trim($_POST['descr']);
		$descr = mysqli_real_escape_string($conn, $descr);
		
		$price = floatval(trim($_POST['price']));
		$price = mysqli_real_escape_string($conn, $price);
		
		$publisher = trim($_POST['publisher']);
		$publisher = mysqli_real_escape_string($conn, $publisher);

		$category = trim($_POST['category']);
		$category = mysqli_real_escape_string($conn, $category);

		$genre = trim($_POST['genre']);
		$genre = mysqli_real_escape_string($conn, $genre);

		// add image
		if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){
			$image = $_FILES['image']['name'];
			$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
			$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "bootstrap/img/";
			$uploadDirectory .= $image;
			move_uploaded_file($_FILES['image']['tmp_name'], $uploadDirectory);
		}

		// find publisher and return pubid
		// if publisher is not in db, create new
		$findPub = "SELECT * FROM publisher WHERE publisher_name = '$publisher'";
		$findResult = mysqli_query($conn, $findPub);
		if(!$findResult){
			// insert into publisher table and return id
			$insertPub = "INSERT INTO publisher(publisher_name) VALUES ('$publisher')";
			$insertResult = mysqli_query($conn, $insertPub);
			if(!$insertResult){
				echo "Can't add new publisher " . mysqli_error($conn);
				exit;
			}
			$publisherid = mysql_insert_id($conn);
		} else {
			$row = mysqli_fetch_assoc($findResult);
			$publisherid = $row['publisherid'];
		}


		$query = "INSERT INTO books VALUES ('" . $isbn . "', '" . $title . "', '" . $author . "', '" . $image . "', '" . $descr . "', '" . $price . "', '" . $publisherid . "')";
		$query1= "INSERT INTO category VALUES('$isbn','$category','$genre')";
		$result = mysqli_query($conn, $query);
		$result1 = mysqli_query($conn, $query1);
		if(!$result){
			echo "Can't add new data " . mysqli_error($conn);
			exit;
		}
		if(!$result1){
			echo "Can't add new data " . mysqli_error($conn);
			exit;
		} else {
			header("Location: admin_book.php");
		}
	}
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
		padding: 10px 10px 10px;
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
	<b><h3 class="lead" style="font-size:3rem;">ADD NEW BOOK</h3></b>
		<br>
		<br>
	<form method="post" action="admin_add.php" enctype="multipart/form-data">
		<table class="table">
			<tr>
				<th>ISBN</th>
				<td><input type="text" name="isbn" required></td>
			</tr>
			<tr>
				<th>Title</th>
				<td><input type="text" name="title" required></td>
			</tr>
			<tr>
				<th>Author</th>
				<td><input type="text"  name="author" required></td>
			</tr>
			<tr>
				<th>Image</th>
				<td><center><input type="file" class="txt-img" style="margin-left:86px;" name="image" required></td></center>
			</tr>
			<tr>
				<th>Description</th>
				<td><textarea name="descr" cols="40" rows="5"></textarea></td>
			</tr>
			<tr>
				<th>Price</th>
				<td><input type="text" name="price" required></td>
			</tr>
			<tr>
				<th>Publisher</th>
				<td><input type="text" name="publisher" required></td>
			</tr>
			<tr>
				<th>Category</th>
				<td><input type="text" name="category" required></td>
			</tr>
			<tr>
				<th>Genre</th>
				<td><input type="text" name="genre" required></td>
			</tr>
		</table>
		<input type="submit" name="add" value="Add new book" class="button" style="padding: 10px 12px 10px;font-size:1.5rem;">
		<input type="reset" value="Reset" class="button1" style="padding: 10px 15px 10px;font-size:1.5rem;">
	</form>
	<br/>
	<a href = "admin_book.php" class="button0" style="padding: 10px 14px 10px;font-size:1.6rem;">Cancel</a>
	</div>
</body>


<?php
	if(isset($conn)) {mysqli_close($conn);}
?>