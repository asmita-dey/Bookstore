<?php
@include 'user_config.php';
session_start();

if(isset($_POST['submit'])){
    $name=mysqli_real_escape_string($conn,$_POST['name']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $pass=md5($_POST['password']);
    $cpass=md5($_POST['cpassword']);

    $select="SELECT * FROM users WHERE email='$email' && password='$pass'";

    $result=mysqli_query($conn,$select);

    if(mysqli_num_rows($result)>0){

        $row=mysqli_fetch_array($result);

        $_SESSION['user_name']=$row['name'];
        header('location:.php');
    }elseif()
    
}
?>






<!DOCTYPE html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>User login</title>
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body{
            background: rgba(127, 204, 219, 0.783) ;
        }
        .row{
            background: white;
            border-radius: 30px;
            box-shadow: 12px 12px 22px rgb(81, 155, 170);
            
        }
        img{
            border-top-left-radius: 30px;
            border-bottom-left-radius: 30px;
        }
        .btn1{
            border: none;
            outline: none;
            height: 50px;
            width: 100%;
            background-color: black;
            color: white;
            border-radius: 4px;
            font-weight: bold;

        }
        .btn1:hover{
            background: white;
            border: 1px solid;
            color: black;
        }
    </style>
  </head>
  <body>
    <section class="Form my-4 mx-5" >
        <div class="container">
            <div class="row g-0">
                <div class="col-lg-5">
                    <img src="C:\xampp\htdocs\bookstore\book1.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-7 px-5 pt-5">
                    <h4><b>Sign in to your account :</b></h4>
                    
                    <form>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <input type="email" placeholder="Enter your email-address" class="form-control mt-4 my-3 p-3">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <input type="password" placeholder="Password" class="form-control my-3 p-3">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <button type="button" class="btn1 mt-4 mb-5">Login </button>
                            </div>
                        </div>
                        <a href="#">Forgot password?</a>
                        <p>Don't have an account?<a href="#">Register here</a></p>
                    </form>

                </div>
            </div>

        </div>
    
    
    
    
    
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  
  </body>
</html>