<?php
  session_start();
  $count = 0;
  // connecto database
  require_once "./functions/database_functions.php";
  $conn = db_connect();

  $image = $_POST['filter'];
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
  <link rel="stylesheet" href="search.css"> 
  <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
       *{
           box-sizing:border-box;
       }
       .column1{
           float: left;
           width: 50%;
           padding:0px;
       }
       .column2{
           float: left;
           width: 45%;
           padding:0px;
       }
       .column3{
           float: left;
           width: 5%;
           padding:6px;
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
  </div>  
  <br>   
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
          <h5><b><p style = "color: green;">Price : Rs.<?php echo $query_row['book_price']; ?></p></b></h5>
          <h5><i><p>Free delivery within 3 days.</p></i></h5>
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

