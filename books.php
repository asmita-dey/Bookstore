<?php
  session_start();
  $count = 0;
  $email= $_POST['email'];
  $pass= $_POST['pass'];
  $title = "Catalogs of Books";
  require_once "./template/header.php";
  require_once "./functions/database_functions.php";
  $conn = db_connect();

  $query = "SELECT book_isbn, book_image FROM books";
  $select="SELECT email, password FROM users WHERE email ='$email' AND password = '$pass'";
  $result = mysqli_query($conn, $query);
  $result1=mysqli_query($conn,$select);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($conn);
    exit;
  }
  if(!$result1){
    echo "Can't retrieve data " . mysqli_error($conn);
    exit;
  }
  if(!mysqli_fetch_array($result1)){
        echo '<script>alert("User not found!!Please register.");
        window.location = "register.php";
        </script>';
		    exit;
  }
?>
  <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="search.css"> 
  <br>
  <div class="search">
  <form action="book_search.php" method = "POST">
   <input type="text" placeholder=" Search....."  name="search"/>
   <button>   
   <i class="fa fa-search"  style="font-size: 18px;"> </i>
   </button>   
   </form>   
   </div>
   <br>   
   <p class="lead text-center text-muted">Catalogs Of Books</p>     
    <?php for($i = 0; $i < mysqli_num_rows($result); $i++){ ?>
      <div class="row">
        <?php while($query_row = mysqli_fetch_assoc($result)){ ?>
          <div class="col-md-3">
            <a href="book.php?bookisbn=<?php echo $query_row['book_isbn']; ?>">
              <img class="img-responsive img-thumbnail" src="./bootstrap/img/<?php echo $query_row['book_image']; ?>">
            </a>
          </div>
        <?php
          $count++;
          if($count >= 4){
              $count = 0;
              break;
            }
          } ?> 
      </div>
<?php
      }
  if(isset($conn)) { mysqli_close($conn); }
  require_once "./template/footer.php";
?>
