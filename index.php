<?php
  session_start();
  $count = 0;
  // connect to database
  
  $title = "Index";
  require_once "./template/header4.php";
  require_once "./functions/database_functions.php";
  $conn = db_connect();
  $row = select4LatestBook($conn);
?>
<link href="./bootstrap/css/search.css" rel="stylesheet">
<br><p class="lead text-center text-muted">Hello Readers!</p>
<div class="row">
        <?php foreach($row as $book) { ?>
      	<div class="col-md-3">
           <img class="img-responsive img-thumbnail" src="./bootstrap/img/<?php echo $book['book_image']; ?>">
      	</div>
        <?php } ?>
    </div>
<?php
  if(isset($conn)) {mysqli_close($conn);}
  require_once "./template/footer.php";
  require_once "./template/footer3.php";
?>


