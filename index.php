<?php
  session_start();
  $count = 0;
  // connecto database
  
  $title = "Index";
  require_once "./template/header1.php";
  require_once "./functions/database_functions.php";
  $conn = db_connect();
?>
<p class="lead">Hello Readers!</p>
<?php
  if(isset($conn)) {mysqli_close($conn);}
  require_once "./template/footer.php";
?>