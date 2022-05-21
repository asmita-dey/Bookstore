<?php
	session_start();
	$name = $_POST['inputName'];
	$pswd = $_POST['inputPasswd'];
	$title = "Admin Login";
    require_once "./functions/database_functions.php";
	$conn = db_connect();
	
	$query = "SELECT name, pass FROM admin WHERE name = '$name' AND pass = '$pswd'";
    $result = mysqli_query($conn, $query);
    if(!$result){
        echo "Can't retrieve data " . mysqli_error($conn);
        exit;
	}
    if(mysqli_fetch_array($result)){
        header("Location: admin_book.php");
        $_SESSION['inputName']=$name;
        exit;
     }
    if(!mysqli_fetch_array($result)){
        echo '<script>alert("Email or Password is incorrect!!");
        window.location = "admin.php";
        </script>';
            exit;
        }
   
?>