<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php echo $title; ?></title>

    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="./bootstrap/css/jumbotron.css" rel="stylesheet">
    <link href="./bootstrap/css/background.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php"><img src="http://cdn.onlinewebfonts.com/svg/img_323457.png" 
          height = 35px width = 60px></a>
          <b><a class="navbar-brand" href="index.php">TechHub</a><b>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
              <li><a href="user_login.php"><span class="glyphicon glyphicon-user"></span>&nbsp; Login</a></li>
              <li><a href="register.php"><span class="glyphicon glyphicon-book"></span>&nbsp; Register</a></li>
              
          </ul>
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