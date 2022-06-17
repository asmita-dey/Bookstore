<?php
    session_start();
	$title = "Login";
?>
<!DOCTYPE html>
<head>

    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="./bootstrap/css/jumbotron.css" rel="stylesheet">
    <link href="./bootstrap/css/background.css" rel="stylesheet">
    <link href="./bootstrap/css/search.css" rel="stylesheet">

    <link rel="stylesheet" href="bootstrap/css/style.css">
    </head>
    <body>
   <br>
    
    <section class="Form my-4 mx-5" >
        <div class="container">
            <div class="row g-0">
                <div class="col-lg-5">
                    <img src="register.svg" class="img-responsive" alt=""
                    height = 300px width = 500px>
                </div>
                <div class="col-lg-7 px-5 pt-5">
                    <br><br><h3><b>&nbsp;&nbsp;Sign In To Your Account :</b></h3>
                    
                    <form action = "user_log.php" method = "POST">
                        <div class="form-row">
                            <div class="col-lg-7">
                                <br><input type="email" placeholder="Enter your email-address" class="form-control mt-3 my-3 p-4" name = "email" required/>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <br><input type="password" placeholder="Password" class="form-control my-3 p-3" name = "pass" required/>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <br><br><input type="submit" class="button2" value = "Login"><br><br>
                            </div>
                    </div>
                    </form>
                </div>
                <h4><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Don't have an account?<a href="register.php"> Register here</a></p></h4>
            </div>
        </div>  
</section>
<br>
<br>
<br>
<br>
</body>
</html>
<?php
require_once "./template/footer3.php";
?>