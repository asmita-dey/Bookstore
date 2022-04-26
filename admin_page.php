<?php
  session_start();
  $title = "Admin";
  require_once "./template/header1.php";
  require_once "./functions/database_functions.php";
  $conn = db_connect();
?>
<p class="lead">Hello Admin!</p>
<div class = "position">
<img src = "http://www.freeiconspng.com/uploads/login-icon-png-27.png">
</div>
<?php
  if(isset($conn)) {mysqli_close($conn);}
  require_once "./template/footer1.php";
?>
