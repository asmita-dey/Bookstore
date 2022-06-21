<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php echo $title; ?></title>

    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="./bootstrap/css/jumbotron.css" rel="stylesheet">
    <link href="./bootstrap/css/background.css" rel="stylesheet">
    <link rel="stylesheet" href="search.css"> 
    <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>

  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php"><img src="logo.png" 
          height = 35px width = 60px></a>
          <a class="navbar-brand" href="index.php">TechHub</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <div class="nav navbar-nav navbar-right">
          <div class="search">
         <form action="book_search.php" method = "POST">
        <input type="text" placeholder=" Search....."  name="search"/>
         <button>   
        <i class="fa fa-search" style="font-size: 18px;"> </i>
        </button>   
        </form>   
        </div>
</div>
    </div>
     </div>
 </nav>
    <?php
      if(isset($title) && ($title == "Admin"|| $title == "Index")){
    ?>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1><b>Welcome To TechHub</b></h1>
        <p class="lead">Happy Reading!</p>
      </div>
    </div>
    <?php } ?>
    <div class = "background1">
    <div class="container" id="main">