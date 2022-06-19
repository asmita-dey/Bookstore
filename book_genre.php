<?php
  session_start();
  $count = 0;
  // connecto database
  require_once "./functions/database_functions.php";
  $conn = db_connect();

  $image = $_POST['filter'];
  if($image=="select"){
    echo '<script>
			window.location = "books.php";
			</script>';
  }
  $query = "SELECT books.book_isbn, books.book_image,  books.book_title,  books.book_author,  books.book_price, 
  category.genre FROM books  INNER JOIN category WHERE category.genre = '$image' AND books.book_isbn = category.book_isbn";
  
  $result = mysqli_query($conn, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($conn);
    exit;
  }

  $title = "Books Genre";
  require_once "./template/header.php";
?> 
  <head>
  <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="search.css">
  <link rel="stylesheet" href="bootstrap/css/style.css">
       
    <style>
       *{
           box-sizing:border-box;
       }
       .column1{
           float: left;
           width: 50%;
           padding:0px;
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
    <link rel="stylesheet" href="bootstrap/css/style.css">
  </head>
  <body>
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

  <br>
 <br> 
 
 <section class="products">

    <div class="box-container">

      <?php for($i = 0; $i < mysqli_num_rows($result); $i++){ ?>
          
             <?php while($query_row = mysqli_fetch_assoc($result)){ ?>
              <div class="box">
                <a href="book.php?bookisbn=<?php echo $query_row['book_isbn']; ?>">
                <img class="img-responsive img-thumbnail" src="./bootstrap/img/<?php echo $query_row['book_image']; ?>">
                </a>
                <br>
                <br>
                <div class="name"><?php echo $query_row['book_title']; ?></div> 
                <div class="author"><i><b><?php echo $query_row['book_author']; ?></i></b></div>   
                <div class="price"><b>Rs <?php echo$query_row['book_price']; ?> /- </b></div>
               
                <a href="book.php?bookisbn=<?php echo $query_row['book_isbn'];?>" class="button">Get Details</a>
             </div>
        <?php
          
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

