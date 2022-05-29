<?php
  session_start();
  $name= $_POST['name'];
  $email= $_POST['email'];
  $pass= $_POST['pass'];
  $cpass= $_POST['cpass'];
  $title = "Register";

  if(!preg_match("/^[a-zA-Z-']*$/",$name)){
    echo '<script>alert("Invalid Name!!");
    window.location = "register.php";
    </script>';
  }
  else if($cpass!=$pass){
    echo '<script>alert("Password doesnot matched!!");
    window.location = "register.php";
    </script>';
    exit;
  }
  else{
  require_once "./functions/database_functions.php";
  $conn = db_connect();

  $select="SELECT * FROM users WHERE name = '$name' AND email = '$email'";
  $result1=mysqli_query($conn,$select);
  if(!$result1){
    echo "Can't retrieve data " . mysqli_error($conn);
    exit;
  }
  if(mysqli_fetch_array($result1)){
        echo '<script>alert("User already exists!!Please login.");
        window.location = "user_login.php";
        </script>';
        exit;
    }
    if(!mysqli_fetch_array($result1)){
    $insert="INSERT INTO users(name,email,password)VALUES('$name','$email','$pass')";
    if(mysqli_query($conn,$insert)){
        echo '<script>alert("New User registered!!Please login.");
        window.location = "user_login.php";
        </script>';
        exit;
    }
    else{
    echo "Can't add user" . mysqli_error($conn);
    exit;
    }
}
}
?>