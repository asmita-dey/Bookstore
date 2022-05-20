<?php
	$title = "User";
	require_once "./template/header2.php";
?>
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="./bootstrap/css/jumbotron.css" rel="stylesheet">
    <link href="./bootstrap/css/background.css" rel="stylesheet">
    <link href="./bootstrap/css/search.css" rel="stylesheet">
    <br>
    <section class="Form my-4 mx-5" >
        <div class="container">
            <div class="row g-0">
                <div class="col-lg-5">
                    <img src="https://i.pinimg.com/originals/06/a7/db/06a7db4db4ec8491ba1b1443d4f8c15a.png" class="img-responsive" alt=""
                    height = 300px width = 500px>
                </div>
                <div class="col-lg-7 px-5 pt-5">
                    <br><br><h4><b>Sign in to your account :</b></h4>
                    
                    <form action = "user_log.php" method = "POST">
                        <div class="form-row">
                            <div class="col-lg-7">
                                <br><input type="email" placeholder="Enter your email-address" class="form-control mt-4 my-3 p-3" name = "email" required/>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <br><input type="password" placeholder="Password" class="form-control my-3 p-3" name = "pass" required/>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <br><br><input type="submit" class="btn1 mt-4 mb-5" value = "Login"><br><br>
                            </div>
                    </div>
                    </form>
                </div>
                <p>Don't have an account?<a href="register.php">Register here</a></p>
            </div>
        </div>  
</section>
    <hr>