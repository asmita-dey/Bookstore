<?php
  session_start();
  $count = 0;
  // connecto database
  require_once "./functions/database_functions.php";
  $conn = db_connect();

  $image = $_POST['search'];
  $query = "SELECT book_isbn, book_image,  book_title,  book_author,  book_price FROM books WHERE book_title LIKE '%$image%' OR book_author LIKE '%$image%'";
  
  $result = mysqli_query($conn, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($conn);
    exit;
  }

  $title = "Books Search";
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
  <br>
  
  <section class="products">

    <div class="box-container">

   <?php  if(!mysqli_num_rows($result)){
            echo '<p class = "lead text-warning">Result not Found!!!</div>';
            exit;}
            
            
              for($i = 0; $i < mysqli_num_rows($result); $i++){ ?>
                
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
                    
                    
                    } ?> 
                </div>
                <br>
  </div>
</section>
      <br>
<?php
      }
  if(isset($conn)) { mysqli_close($conn); }
  require_once "./template/footer3.php";
?>

