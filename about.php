<?php
$title = "About";
require_once "./template/header2.php";
require_once "./functions/database_functions.php";
$conn = db_connect();
?>

<!DOCTYPE html>
<title>about us</title>
<head><link rel="stylesheet" href="bootstrap/css/style.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>                      
<script src="https://kit.fontawesome.com/de0466861c.js" crossorigin="anonymous"></script>
</head>
<body>
<section class="choose">
  <div class="content">
    <h1>ABOUT US</h1>
    <p>Enhance your Tech-knowledge!
      <br>
      We deliver handpicked book to your door
    </p>
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
    <div class="content-box">
      <h2><b>WHY CHOOSE US?</b></h2>
      <p><b><i>TechHub deliver handpicked books to your door. We provide a wide range of CS books of varied genres that is
        from Web Development to coding, from Hardware to Machine Learning etc. We took 2-3 days delivery span without charging any extra cost. 
        Also one can check books even without creating an account. TechHub helps you collect latest books of reputed publishers....</b></i><p>
      <p><b><i>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
      Deleniti ratione dicta reprehenderit laborum fugit, qui a nesciunt explicabo alias expedita.</b></i>
     </p>
    </div>
  </div>
</section>
<br>
<br>
<br>

<center><h1 class="title" style="font-size: 5rem"><b>CLIENT'S REVIEWS<b></h1></center>
<br>
<br>

<section class="reviews">

<div class="box-container">

  <?php
    $select_products=mysqli_query($conn,"SELECT * FROM `feedback` , `customers` WHERE feedback.name=customers.name LIMIT 5") or die('query failed');
    if(mysqli_num_rows($select_products)>0)
    {
      while($fetch_products=mysqli_fetch_assoc($select_products))
      {    
 ?>
          <div class="box">
            <form  method="post" >
              
              <div class="feedback"><p><b><?php echo $fetch_products['feedback']; ?></p></b></div> 
              <div class="name"><h3><?php echo $fetch_products['name']; ?></h3></div>
              <br>
              <i class="fa-solid fa-map-pin"><div class="city"><p><?php echo $fetch_products['city'] ," , ", $fetch_products['country']; ?></p></div></i>
              
              <input type="hidden" name="feedback" value="<?php echo $fetch_products['feedback'];?>">
              <input type="hidden" name="name" value="<?php echo $fetch_products['name']; ?>">
              <input type="hidden" name="city" value=" <?php echo $fetch_products['city'] , $fetch_products['country']; ?>">
              
            </form>
          </div>
  <?php
      }
    }
       else
   {
     echo '<h2 align="center" class="empty"> No Reviews! </h2>';
   }
  ?>
</div>
<br>
<br>
</section>





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

<?php
      
  if(isset($conn)) { mysqli_close($conn); }
  require_once "./template/footer3.php";
?>
