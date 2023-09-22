<?php
session_start();
error_reporting(0);
if(isset($_SESSION["role"]))
{
    if($_SESSION["role"]=="")
    {
        header("location:login2");
    }
}
if(isset($_SESSION["passwordVerified"]))
{
    if($_SESSION["passwordVerified"]==true)
    {
        header("location:index");
    }
    $_SESSION["url"]="";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="styles_login.css">
    <script src="js/loader.js"></script>
    <title>Forgot Password</title>
</head>
<body>

<div id="preloader"></div>
<!-- <div class="logo"></div>
<div class="login-block">
<img src="images/login.gif" alt="" height="50%" width="50%" style="margin-left:25%">
    <h1>Change Password</h1>
    <form action="#" method="POST" onsubmit="loading()">
    <input type="email" name="email" placeholder="enter Your registered email" id="username" autocomplete="off">
    <button name="submit">Submit</button>
    </form> -->
    <div class="side"><h1>Forgot Password</h1></div>
        
        <div class="container">
            <div class="circle">
                <img src="images/cab2.png" alt="Not Found">
            </div>
            <br>
            <form action="#"  method="POST" onsubmit="loading()">
            <div class="form">
                <input type="email" name="email" autocomplete="off" required>
                <label for="email" class="label-name"><span class="content-name">Email</span></label>
            </div><br>
            <button type="submit" class="btn btn-success" name="submit">Submit</button>
            <?php
            if(isset($_POST["submit"]))
            {
                $_SESSION["url"]="";
                $_SESSION["url"]="changepassword1";
                $_SESSION["passwordVerified"]=false;
                $_SESSION["email"]=$_POST["email"];   
                header("location:otp");    
            }
            ?>
        
        </div>
<script>
    window.addEventListener("load",function(){HH();})
    loading();
</script>    
</body>
</html>
