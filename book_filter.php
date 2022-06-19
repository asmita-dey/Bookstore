<?php
  session_start();
  $count = 0;
  // connecto database
  require_once "./functions/database_functions.php";
  $conn = db_connect();

  $image = $_POST['filter'];
  if($image=="select"){
    echo '<script>
			window.location = "book_fetch.php";
			</script>';
  }
  $query = "SELECT books.book_isbn, books.book_image,  books.book_title,  books.book_author,  books.book_price, 
  category.category FROM books  INNER JOIN category WHERE category.category = '$image' AND books.book_isbn = category.book_isbn";
  
  $result = mysqli_query($conn, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($conn);
    exit;
  }

  $title = "Books Filter";
  require_once "./template/header.php";
?> 
  <head>
  <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<<<<<<< HEAD
  <link rel="stylesheet" href="search.css">
  <link rel="stylesheet" href="bootstrap/css/style.css">
   <style>
      *{
          box-sizing:border-box;
      }
      .column1{
          float: left;
          width: 25%;
          padding:10px;
      }
      .column2{
          float: left;
          width: 32.5%;
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
=======
  <link rel="stylesheet" href="bootstrap/css/style.css">

<style>
     *{
         box-sizing:border-box;
     }
    .search{
    font-size: 18px;
    
    } 
    .search .search-txt{
      border-radius: 5px;
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
  <br>

  
  <center><div class="search">
      <form action="book_search.php" method = "POST">
        <input class="search-txt" type="text" placeholder=" Search....."  name="search"/>
          <button>   
          <i class="fa fa-search"  style="font-size: 18px;"> </i>
          </button>   
      </form>   
    </div></center>
  </div>

  
</div> 
</body>
<br>
  <br> 
<section class="products">

  <div class="box-container">
  
>>>>>>> 373fc3697d06780e877a48bc71ca83f89197b722
   <?php for($i = 0; $i < mysqli_num_rows($result); $i++){ ?>
      
        <?php while($query_row = mysqli_fetch_assoc($result)){ ?>
          

        <div class="box">
              <form action="" method="post" >
              <a href="book.php?bookisbn=<?php echo $query_row['book_isbn']; ?>">
       
                <img class="img" src="./bootstrap/img/<?php echo $query_row['book_image']; ?>"></a>
                <br>
                <br>
                <div class="name"><?php echo $query_row['book_title']; ?></div> 
                <div class="author"><i><b><?php echo $query_row['book_author']; ?></i></b></div>   
                <div class="price"><b>Rs <?php echo$query_row['book_price']; ?> /- </b></div>
                <input type="hidden" name="product_name" value="<?php echo $query_row['book_title']; ?>">
                <input type="hidden" name="product_price" value="<?php echo $query_row['book_price']; ?>">
                <input type="hidden" name="product_image" value="<?php echo $query_row['book_image']; ?>">
                
                <a href="book.php?bookisbn=<?php echo $query_row['book_isbn'];?>" class="button">Get Details</a>   
              </form>
        </div>

        <?php
          $count++;
          if($count >= 4){
              $count = 0;
              break;
            }
          } ?> 
      </div>
      <br>
  </div>
</section>
<?php
      }
  if(isset($conn)) { mysqli_close($conn); }
  require_once "./template/footer3.php";
?>

