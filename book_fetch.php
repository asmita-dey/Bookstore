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


<head>
 
 <link rel="stylesheet" href="bootstrap/css/style.css">
   <style>
      *{
          box-sizing:border-box;
      }
      .column1{
          float: left;
          width: 40%;
          padding:10px;
          
      }
      .column2{
          float: left;
          width: 20%;
          padding:10px;
      }
      .column3{
          float: left;
          width: 5%;
          padding:13px;
      }
      .row1:after{
           content:"";
           display:table;
           clear:both;
      }
   </style>
 </head>
 <body>
 <br>
 <h2 ><b><center>PRODUCTS</center></b></h2>
 <br>

 <div class = "row1">
   <div class = "column1">
     <div class="search">
       <form action="book_search.php" method = "POST">
         <input type="text" placeholder=" Search....."  name="search"/>
           <button>   
           <i class="fa fa-search"  style="font-size: 18px;"> </i>
           </button>   
       </form>   
     </div>
   </div>

   <div class = "column2">
      <form action="book_filter.php" method="POST">
         <div class="dropdown" >
           <select class="form-control" name="filter" placeholder="Choose Category.....">
           <option value="select">Choose Category.....</option>
           <option value="Best seller">Best Seller</option>
           <option value="Recommended">Recommended</option>
           <option value="Limited edition">Limited Edition</option>
           </select>
         </div>
     </div>
     <div class = "column3">
     <button>   
     <i class="fa fa-filter"  style="font-size: 18px;"> </i>
     </button> 
       </form>
    </div>

    <div class = "column2">
      <form action="book_genre.php" method="POST">
         <div class="dropdown" >
           <select class="form-control" name="filter" placeholder="Choose Genres.....">
           <option value="select">Choose Genre.....</option>
           <option value="Web/App development">Web/App Development</option>
           <option value="Coding">Coding</option>
           <option value="Machine learning">Machine Learning</option>
           <option value="Hardware/Networking">Hardware and Networking</option>
           <option value="Others">Others</option>
           </select>
         </div>
     </div>
     <div class = "column3">
     <button>   
     <i class="fa fa-filter"  style="font-size: 18px;"> </i>
     </button> 
       </form>
    </div>
 </div> 
    
  
   
   
       
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
                
                <a href="book.php?bookisbn=<?php echo $fetch_products['book_isbn'];?>" class="button">Get Details</a>   
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