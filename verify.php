<?php
	$email = $_POST['inputEmail'];
	$pswd = $_POST['inputPasswd'];

	require_once "./functions/database_functions.php";
	$conn = db_connect();
	if(!$conn){
		echo "Cannot connecto to database " . mysqli_connect_error($conn);
		exit;
	}

	$query = "SELECT name, pass FROM admin";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Empty!";
		exit;
	}

	while ($row = mysqli_fetch_assoc($result)){
		if($email != $row['name'] && $pswd != $row['pass']){
			echo "Wrong username or password!!";
			break;
		}
	}
?>