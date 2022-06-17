<?php
  session_start();
  $count = 0;
  // connect to database
  
  $title = "Index";
  require_once "./template/header2.php";
  require_once "./functions/database_functions.php";
  $conn = db_connect();
  //$row = select4LatestBook($conn);
  ?>

  


<!--Tanu's part-->

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="bootstrap/css/style.css">
</head>
<body>
 
<section class="home">
  <div class="content">
    <h1>Welcome to TechHub</h1>
    <p>Enhance your Tech-knowledge!
      <br>
      We deliver handpicked book to your door
    </p>
    <a href="about.php" class="button">Discover More</a>
  </div>
</section>
<br>
<br>
<br>

<h1><b><font size="8"><center>LATEST PRODUCTS<center></font></b></h1>
<br>
<br>

<section class="products">

  <div class="box-container">

    <?php
      $select_products=mysqli_query($conn,"SELECT * FROM `books` LIMIT 8") or die('query failed');
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
                
                <a href="cart.php" class="button">Add To Cart</a>   
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
  <center><a href="books.php" class="button1">Load More</a></center>
</section>
<br>
<br>
<br>

<h1><b><font size="8"><center>FEATURED PRODUCTS<center></font></b></h1>
<br>
<br>
<section class="products">

  <div class="box-container">

    <?php
      $select_products=mysqli_query($conn,"SELECT books.book_isbn, books.book_title,
      books.book_author,books.book_price, books.book_image, category.category FROM `books` JOIN `category` 
      WHERE books.book_isbn = category.book_isbn AND category.category NOT LIKE 'None' LIMIT 9") or die('query failed');
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
                <div class="category"><?php echo $fetch_products['category']; ?></div>
                <input type="hidden" name="product_name" value="<?php echo $fetch_products['book_title']; ?>">
                <input type="hidden" name="product_price" value="<?php echo $fetch_products['book_price']; ?>">
                <input type="hidden" name="product_image" value="<?php echo $fetch_products['book_image']; ?>">
                
                <a href="cart.php" class="button">Add To Cart</a>   
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
</section>
<br>
<br>
<br>

<section class="about">
  <div class="flex">
    <div class="image">
      <img src="cover.jpg" alt="">

    </div>
    <div class="content">
      <h2><b>ABOUT US</b></h2>
      <p><b><i>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
      Deleniti ratione dicta reprehenderit laborum fugit, qui a nesciunt explicabo alias expedita.</b></i>
    </p>
   
    <center><a href="about.php" class="button1">Read More</a></center>

    </div>
  </div>
</section>
<br>
<br>
<br>
<section class="home-contact">
  <div class="content">
    <br>
    
      <h3>HAVE ANY QUESTIONS?</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
          Corrupti consectetur quisquam sapiente aliquid error sequi commodi culpa, voluptas voluptatem nam!
        </p>
        <br>
        
        <a href="contact.php" class="button">Contact Us</a>
        <br>
        <br>
        <br>
  </div>
</section>

</body>
</html>




<!--Asmita part
<br><p class="lead text-center text-muted">Hello Readers!</p>
<div class="row">
        <?php foreach($row as $book) { ?>
      	<div class="col-md-3">
           <img class="img-responsive img-thumbnail" src="./bootstrap/img/<?php echo $book['book_image']; ?>">
      	</div>
        <?php } ?>
    </div>-->
<?php
  if(isset($conn)) {mysqli_close($conn);}
  require_once "./template/footer.php";
  require_once "./template/footer3.php";
?>


