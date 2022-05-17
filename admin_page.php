<?php
  session_start();
  $title = "Admin";
  require_once "./template/header1.php";
  require_once "./functions/database_functions.php";
  $conn = db_connect();
?>
<div class = "position">
<p class="lead">Hello Admin!</p>
<img src = "https://tse3.mm.bing.net/th?id=OIP.3b-jaj-uVz_CaqJf7sDDjwAAAA&pid=Api&P=0&w=200&h=164">
</div>
<?php
  if(isset($conn)) {mysqli_close($conn);}
  require_once "./template/footer1.php";
?>
