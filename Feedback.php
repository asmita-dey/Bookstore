<?php
  session_start();
  $name=$_POST['name'];
  $email=$_POST['email'];
  $feedback=$_POST['feedback'];

  if((!preg_match("/^[a-zA-Z-']*$name"))&&(!filter_var($email,FILTER_VALIDATE_EMAIL))){
    echo '<script>alert("Invalid Name or Email!!");
    window.location = "contact.php";
    </script>';
  }
  else{
  require_once "./functions/database_functions.php";
  $conn = db_connect();

  $insert="INSERT INTO feedback(name,email,feedback)VALUES('$name','$email','$feedback')";
  if(mysqli_query($conn,$insert)){
      echo '<script>alert("Feedback submitted!!");
      window.location = "contact.php";</script>';
      exit;
  }
  else{
  echo "Can't add user" . mysqli_error($conn);
  exit;
  }
  }
?>