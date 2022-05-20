<?php
  session_start();
  $count = 0;
  // connecto database
  require_once "./functions/database_functions.php";
  $conn = db_connect();

  $image = $_POST['search'];
  $query = "SELECT book_isbn, book_image,  book_title,  book_author,  book_price FROM books WHERE book_title LIKE '%$image%'";
  $result = mysqli_query($conn, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($conn);
    exit;
  }

  $title = "Books Search";
  require_once "./template/header.php";
?> 
   <?php for($i = 0; $i < mysqli_num_rows($result); $i++){ ?>
      <div class="row">
        <?php while($query_row = mysqli_fetch_assoc($result)){ ?>
          <div class="col-md-3">
            <a href="book.php?bookisbn=<?php echo $query_row['book_isbn']; ?>">
              <img class="img-responsive img-thumbnail" src="./bootstrap/img/<?php echo $query_row['book_image']; ?>">
            </a>
          </div>
          <div class="col-md-6">
          <h4><b><p><?php echo $query_row['book_title']; ?></p></b></h4>
          <h4><i><p><?php echo $query_row['book_author']; ?></p></i></h4>
          <h5><b><p>Price : Rs.<?php echo $query_row['book_price']; ?></p></b></h5>
          <a href="book.php?bookisbn=<?php echo $query_row['book_isbn'];?>" class="btn btn-primary">Get Details</a>
        </div>
        <?php
          $count++;
          if($count >= 1){
              $count = 0;
              break;
            }
          } ?> 
      </div>
      <br>
<?php
      }
  if(isset($conn)) { mysqli_close($conn); }
?>

