<?php
	$title = "Register";
	require_once "./template/header2.php";
?>
<!--@include 'user_config.php';

if(isset($_POST['submit'])){
    $name=mysqli_real_escape_string($conn,$_POST['name']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $pass=md5($_POST['password']);
    $cpass=md5($_POST['cpassword']);

    $select="SELECT * FROM users WHERE email='$email' && password='$pass'";

    $result=mysqli_query($conn,$select);

    if(mysqli_num_rows($result)>0){

        $error[]='User already exists!';

    }else{

        if($pass !=$cpass){
            $error[]='Password not matched!';
        }else{
            $insert="INSERT INTO users(Name,Email,Password)VALUES('$name','$email','$pass');
            mysqli_query($conn,$insert);
            header('location:user_login.php');
        }
    }
    
}
 if(isset($error )){
    foreach($error as $error){
    echo'<span class="error-msg">'.$error.'</span>';
    }
   };-->
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
                    <img src="http://denovati.com/wp-content/uploads/2014/08/Curriculum-Design-and-Review.png" class="img-responsive" alt=""
                    height = 300px width = 500px>
                </div>
                <div class="col-lg-7 px-5 pt-5">
                    <br><br><h4><b>Register Now :</b></h4>
                    <form>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <br><input type="text" name="name" placeholder="Enter your User name" class="form-control mt-4 my-3 p-3">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <br><input type="email" name="email" placeholder="Enter your Email-address" class="form-control mt-4 my-3 p-3">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <br><input type="password" name="password" placeholder="Password" class="form-control my-3 p-3">
                            </div>
                            <div class="form-row">
                                <div class="col-lg-7">
                                    <br><input type="password" name="cpassword" placeholder="Confirm Password" class="form-control mt-4 my-3 p-3">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <br><br><button type="button" class="btn1 mt-4 mb-5">Register </button>
                            </div>
                        </div>
                    </form>
                    </div>
            </div>
        </div>  
</section>
    <hr>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
       
                   