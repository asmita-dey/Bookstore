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
<section class="reviews">
    
    <br>
    <br>
    <br>

    <div class="box-container">
        <div class="box">

            <img src="pic1.webp" alt="">
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
           Consectetur delectus exercitationem sit nulla, officia ipsum totam maxime,
           iusto nesciunt laboriosam vero error porro aliquid? Nemo alias molestiae quos minus incidunt!</p>
          
           <div class="stars">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-half-empty"></i>
            <i class="fa fa-star-o"></i>
            </div>
            <h3>John Deo</h3>
        </div>
    
        <div class="box">

            <img src="pic2.jpg" alt="">
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
           Consectetur delectus exercitationem sit nulla, officia ipsum totam maxime,
           iusto nesciunt laboriosam vero error porro aliquid? Nemo alias molestiae quos minus incidunt!</p>
           <div class="stars">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-half-empty"></i>
            </div>
            <h3>Dustin Williams</h3>
        </div>
    
        <div class="box">

            <img src="pic2.webp" alt="">
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
           Consectetur delectus exercitationem sit nulla, officia ipsum totam maxime,
           iusto nesciunt laboriosam vero error porro aliquid? Nemo alias molestiae quos minus incidunt!</p>
           <div class="stars">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-o"></i>
            </div>
            <h3>Sandra Swanson</h3>
        </div>
    
        <div class="box">

            <img src="pic4.webp" alt="">
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
           Consectetur delectus exercitationem sit nulla, officia ipsum totam maxime,
           iusto nesciunt laboriosam vero error porro aliquid? Nemo alias molestiae quos minus incidunt!</p>
           <div class="stars">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-o"></i>
            </div>
            <h3>Tyler Martin</h3>
        </div>
    
        <div class="box">

            <img src="pic5.jpg" alt="">
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
           Consectetur delectus exercitationem sit nulla, officia ipsum totam maxime,
           iusto nesciunt laboriosam vero error porro aliquid? Nemo alias molestiae quos minus incidunt!</p>
           <div class="stars">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-half-empty"></i>
            </div>
            <h3>Natasha Walsh</h3>
        </div>
    </div>
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
