<?php
	session_start();
	$name = $_POST['inputName'];
	$pswd = $_POST['inputPasswd'];
	$title = "Admin Login";
    if(!preg_match("/^[a-zA-Z-']*$/",$name)){
        echo '<script>alert("Invalid username!!");
        window.location = "admin_login.php";
        </script>';
      }
    else{
    require_once "./functions/database_functions.php";
	$conn = db_connect();
	
	$query = "SELECT name, pass FROM admin WHERE name = '$name' AND pass = '$pswd'";
    $result = mysqli_query($conn,$query);
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
        echo '<script>alert("Username or Password is incorrect!!");
        window.location = "admin_login.php";
        </script>';
            exit;
        }
    }
?>