<?php
	$book_isbn = $_GET['bookisbn'];

	require_once "./functions/database_functions.php";
	$conn = db_connect();

	$query = "DELETE FROM books WHERE book_isbn = '$book_isbn'";
	$query1 = "DELETE FROM category WHERE book_isbn = '$book_isbn'";

	$result = mysqli_query($conn, $query);
	$result1 = mysqli_query($conn, $query1);
	if(!$result){
		echo "delete data unsuccessfully " . mysqli_error($conn);
		exit;
	}
	if(!$result1){
		echo "delete data unsuccessfully " . mysqli_error($conn);
		exit;
	}
	header("Location: admin_book.php");
?>