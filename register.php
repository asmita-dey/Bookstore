<?php
	$title = "Register";
	require_once "./template/header2.php";
?>
<head>
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="./bootstrap/css/jumbotron.css" rel="stylesheet">
    <link href="./bootstrap/css/background.css" rel="stylesheet">
    <link href="./bootstrap/css/search.css" rel="stylesheet">
</head>
<body>
    <br>
    <section class="Form my-4 mx-5" >
        <div class="container">
            <div class="row g-0">
                <div class="col-lg-5">
                    <img src="http://denovati.com/wp-content/uploads/2014/08/Curriculum-Design-and-Review.png" class="img-responsive" alt=""
                    height = 300px width = 500px>
                </div>
                <div class="col-lg-7 px-5 pt-5">
                    <br><br><h4><b>Register Now :</b></h4>
                    <form action = "registration.php" method = "POST">
                        <div class="form-row">
                            <div class="col-lg-7">
                                <br><input type="text" name="name" placeholder="Enter your User name" class="form-control mt-4 my-3 p-3" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <br><input type="email" name="email" placeholder="Enter your Email-address" class="form-control mt-4 my-3 p-3" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <br><input type="password" name="pass" placeholder="Password" class="form-control my-3 p-3" required>
                            </div>
                            <div class="form-row">
                                <div class="col-lg-7">
                                    <br><input type="password" name="cpass" placeholder="Confirm Password" class="form-control mt-4 my-3 p-3" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <br><br><input type="submit" class="btn1 mt-4 mb-5" value = "Register"/>
                            </div>
                        </div>
                    </form>
                    </div>
            </div>
        </div>  
</section>
</body>
<?php
require_once "./template/footer3.php";
?>
       
                   