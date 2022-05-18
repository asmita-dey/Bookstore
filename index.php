<?php
  session_start();
  $count = 0;
  // connecto database
  
  $title = "Index";
  require_once "./template/header2.php";
  require_once "./functions/database_functions.php";
  $conn = db_connect();
  $row = select4LatestBook($conn);
?>
<link href="./bootstrap/css/search.css" rel="stylesheet">
<p class="lead text-center text-muted">Hello Readers!</p>
<div class = "lead">
<marquee dir ="left"><img src = "https://freepngimg.com/thumb/star/36977-7-gold-star-sticker-file.png" 
height = 30px width = 30px><i>Flat 10% off on a purchase of Rs.499 or above!!</i><img src = "https://freepngimg.com/thumb/star/36977-7-gold-star-sticker-file.png" 
height = 30px width = 30px></marquee><br>
</div>
<div class="row">
        <?php foreach($row as $book) { ?>
      	<div class="col-md-3">
           <img class="img-responsive img-thumbnail" src="./bootstrap/img/<?php echo $book['book_image']; ?>">
          </a>
      	</div>
        <?php } ?>
    </div>
<?php
  if(isset($conn)) {mysqli_close($conn);}
  require_once "./template/footer.php";
?>

<!-- Sayan is good -->
