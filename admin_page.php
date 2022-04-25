<?php
  session_start();
  $title = "Admin";
  require_once "./template/header1.php";
  require_once "./functions/database_functions.php";
  $conn = db_connect();
?>
<p class="lead">Hello Admin!</p>
<?php
  if(isset($conn)) {mysqli_close($conn);}
  require_once "./template/footer1.php";
?>
