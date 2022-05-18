<?php
  session_start();
  $title = "Admin";
  require_once "./template/header1.php";
  require_once "./functions/database_functions.php";
  $conn = db_connect();
?>
<div class="text-center"><h3>Hello Admin!</h3></div>
<div class = "position">
<img src = "https://www.freeiconspng.com/uploads/computer-user-icon-12.png">
</div>
<?php
  if(isset($conn)) {mysqli_close($conn);}
  require_once "./template/footer1.php";
?>
