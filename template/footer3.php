<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php echo $title; ?></title>

    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="./bootstrap/css/jumbotron.css" rel="stylesheet">
    <link href="./bootstrap/css/background.css" rel="stylesheet">
    <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
       *{
           box-sizing:border-box;
       }
       .column{
           float: left;
           width: 20%;
           padding:10px;
           height:150px;
           font-size: 1.8rem;
           text-align: center;
           justify-content: center;
       }
       .row1:after{
            content:"";
            display:table;
            clear:both;
       }
    </style>
</head>

  <body>
    <hr>
    <nav class="navbar navbar-bottom">
        <div class="row1">
          <div class="column">
				<h3><b>TECHHUB</b></h3>
				<p>
					<a href="index.php" class="link-1">Home </a>|
					<a href="about.php">About </a>|
					<a href="contact.php">Contact</a>
                </p>
				<p>TechHub © 2022</p>
            </div>

            <div class="column">
                <br><p><b>OTHER LINKS</b></p>
                <a href="#">Privacy Policy</a><br>
                <a href="#">Terms and Conditions</a><br>
                <a href="#">News and Updates</a>
            </div>

            <div class="column">
                <br><p><b>HELP</b></p>
                <a href="#">Returns and Refunds</a><br>
                <a href="#">Shipping Cost</a><br>
                <a href="#">Track Orders</a>
            </div>

          <div class="column">
				<br><p><b>GET IN TOUCH</b></p>
                <div>
					<i class="fa fa-map-marker"></i><span>
					6,Wood St,Kankaria Estates,Kolkata,India</span>
				</div>
				<div>
					<i class="fa fa-phone"></i>
					+91 7843752901
				</div>
				<div>
					<i class="fa fa-envelope"></i>
					<a href="mailto:techhub1234@gmail.com">techhub1234@gmail.com</a>
				</div>
			</div>

            <div class="column">
				<br><p>
					<b>TO KNOW MORE.....</b><br>
					One stop destination for all CS books... 
				</p>
				<div>
					<a href="https://m.facebook.com" target="_blank"><i class="fa fa-facebook"></i></a>
					<a href="https://twitter.com" target="_blank"><i class="fa fa-twitter"></i></a>
					<a href="https://in.linkedin.com" target="_blank"><i class="fa fa-linkedin"></i></a>
					<a href="https://github.com" target="_blank"><i class="fa fa-github"></i></a>
				</div>
			</div>
         </div>
</nav>
