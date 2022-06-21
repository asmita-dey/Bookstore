<?php
  session_start();
  $title = "Admin";
  require_once "./template/header1.php";
  require_once "./functions/database_functions.php";
  $conn = db_connect();
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="bootstrap/css/style.css">
  <style>
    .admin-content{
      width: 100%;
		  border:3px black;
      text-align: center;
		  background-color: white;
		  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);

    }



  </style>
</head>
<body>
 
<section class="home">
  <div class="content">
    <h1>Welcome to TechHub</h1>
    <p>Enhance your Tech-knowledge!
      <br>
      We deliver handpicked book to your door
    </p>
  </div>
</section>
<br>
<br>
<br>

<center><h1 class="admin-txt" style="font-size:5rem;color: purple;">Hello Admin!</h1></center>


<center><img src = "computer-user-icon.png"></center>









<div class = "position">

</div>
<?php
  if(isset($conn)) {mysqli_close($conn);}
  require_once "./template/footer3.php";
?>
