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
				<h3><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TECHHUB</b></h3>
				<p>&nbsp;&nbsp;
					<a href="#" class="link-1">Home</a>|
					<a href="#">About</a>|
					<a href="#">Faq</a>|
					<a href="#">Contact</a>
                </p>
				<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    TechHub © 2022</p>
            </div>

            <div class="column">
                <br><p><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OTHER LINKS</b></p>
                <a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Privacy Policy</a><br>
                <a href="#">&nbsp;&nbsp;&nbsp;&nbsp;Terms and Conditions</a><br>
                <a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;News and Updates</a>
            </div>

            <div class="column">
                <br><p><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HELP</b></p>
                <a href="#">&nbsp;&nbsp;Returns and Refunds</a><br>
                <a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Shipping Cost</a><br>
                <a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Track Orders</a>
            </div>

          <div class="column">
				<br><p><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GET IN TOUCH</b></p>
                <div>
					<i class="fa fa-map-marker"></i><span>
					444 S. Cedros Ave,Solana Beach, California</span>
				</div>
				<div>
					<i class="fa fa-phone"></i>
					+1.555.555.5555
				</div>
				<div>
					<i class="fa fa-envelope"></i>
					<a href="mailto:techhub1234@gmail.com">techhub1234@gmail.com</a>
				</div>
			</div>

            <div class="column">
				<br><p>
					<b>TO KNOW MORE.....</b><br>
					Lorem ipsum dolor sit amet, consectateur adispicing elit. 
				</p>
				<div>
					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-linkedin"></i></a>
					<a href="#"><i class="fa fa-github"></i></a>
				</div>
			</div>
         </div>
</nav>