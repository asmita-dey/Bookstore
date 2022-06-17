<?php
  session_start();
  $count = 0;
  $title = "Catalogs of Books";
  require_once "./template/header.php";
  require_once "./functions/database_functions.php";
  $conn = db_connect();

  $query = "SELECT book_isbn, book_image, book_title, book_author, book_price FROM books";
  $result = mysqli_query($conn, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($conn);
    exit;
  }
?>


<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="bootstrap/css/style.css">
</head>
<body>
    <br>
    
    
    <h2><b><font size="8"><center> PRODUCTS<center></font></b></h2>
<br>
<br>
<br>

<section class="products">

  <div class="box-container">

    <?php
      $select_products=mysqli_query($conn,"SELECT * FROM `books`") or die('query failed');
      if(mysqli_num_rows($select_products)>0)
      {
        while($fetch_products=mysqli_fetch_assoc($select_products))
        {    
   ?>
            <div class="box">
              <form action="" method="post" >
       
                <img class="img" src="./bootstrap/img/<?php echo $fetch_products['book_image']; ?>">
                <br>
                <br>
                <div class="name"><?php echo $fetch_products['book_title']; ?></div> 
                <div class="author"><i><b><?php echo $fetch_products['book_author']; ?></i></b></div>   
                <div class="price"><b>Rs <?php echo $fetch_products['book_price']; ?> /- </b></div>
                <input type="hidden" name="product_name" value="<?php echo $fetch_products['book_title']; ?>">
                <input type="hidden" name="product_price" value="<?php echo $fetch_products['book_price']; ?>">
                <input type="hidden" name="product_image" value="<?php echo $fetch_products['book_image']; ?>">
                
                <a href="book.php" class="button">Get Details</a>   
              </form>
            </div>
    <?php
        }
      }
         else
     {
       echo '<p class="empty"> No Products Added </p>';
     }
    ?>
  </div>
  <br>
  <br>
 
</section>
</body>
</html>

<?php
      
  if(isset($conn)) { mysqli_close($conn); }
  require_once "./template/footer3.php";
?>