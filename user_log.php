<?php
  session_start();
  $email= $_POST['email'];
  $pass= $_POST['pass'];
  $title = "Login";
  require_once "./functions/database_functions.php";
  $conn = db_connect();

  $select="SELECT email, password FROM users WHERE email ='$email' AND password = '$pass'";
  $result1=mysqli_query($conn,$select);
  if(!$result1){
    echo "Can't retrieve data " . mysqli_error($conn);
    exit;
  }
  if(!mysqli_fetch_array($result1)){
    echo '<script>alert("User not found!!Please register.");
    window.location = "register.php";
    </script>';
        exit;
    }
    else{
       header("Location: books.php");
       $_SESSION['email']=$email;
       exit;
    }
?>
