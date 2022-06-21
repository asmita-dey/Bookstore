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
          <a class="navbar-brand" href="admin_page.php"><img src="logo.png" 
          height = 35px width = 60px></a>
          <b><a class="navbar-brand" href="admin_page.php">TechHub</a></b>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
    
          <li><a href="admin_login.php"><span class="glyphicon glyphicon-user"></span>&nbsp; Login</a></li>   
          </ul>
        </div>
      </div>     
    </nav>

    <?php
      if(isset($title) && ($title == "Admin"|| $title == "Index"))
    ?>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    
      
 