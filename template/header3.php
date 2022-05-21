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
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="admin_page.php"><img src="http://cdn.onlinewebfonts.com/svg/img_323457.png" 
          height = 35px width = 60px></a>
          <a class="navbar-brand" href="admin_page.php">TechHub</a>
        </div>

        <!--/.navbar-collapse -->
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
              <li><a href="publisher_list.php"><span class="glyphicon glyphicon-paperclip"></span>&nbsp; Publisher</a></li>
              <li><a href="admin_book.php"><span class="glyphicon glyphicon-book"></span>&nbsp; Books</a></li>
              <li><a href="customer.php"><span class="glyphicon glyphicon-user"></span>&nbsp; Customers</a></li>
              <li><a href="feed.php"><span class="glyphicon glyphicon-envelope"></span>&nbsp; Feedbacks</a></li>
              <li><a href="signout.php"><span class="glyphicon glyphicon-off"></span>&nbsp; Signout</a></li>
            </ul>
        </div>
      </div>
    </nav>
    <?php
     if(isset($title) && ($title == "Admin"|| $title == "Index")){
    ?>
    <div class="jumbotron">
      <div class="container">
        <h1><b>Welcome To TechHub</b></h1>
        <p class="lead">Happy Reading!</p>
      </div>
    </div>
    <?php } ?>
    
    <div class = "background1">
    <div class="container" id="main">