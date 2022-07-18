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
      <p><b><i>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores voluptatum quidem obcaecati! 
        Illo eos totam impedit soluta dolor tempora officiis nemo fugit nisi sapiente architecto, reprehenderit voluptas, nulla repellendus praesentium?</b></i><p>
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
    $select_products=mysqli_query($conn,"SELECT * FROM `feedback` LIMIT 5") or die('query failed');
    if(mysqli_num_rows($select_products)>0)
    {
      while($fetch_products=mysqli_fetch_assoc($select_products))
      {    
 ?>
          <div class="box">
            <form  method="post" >
              
              <div class="feedback"><p><b><?php echo $fetch_products['feedback']; ?></p></b></div> 
               
              <div class="name"><h3><?php echo $fetch_products['name']; ?></h3></div>
              
              <input type="hidden" name="feedback" value="<?php echo $fetch_products['feedback'];?>">
              <input type="hidden" name="name" value="<?php echo $fetch_products['name']; ?>">
              
            </form>
          </div>
  <?php
      }
    }
       else
   {
     echo '<p class="empty"> No Reviews </p>';
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
