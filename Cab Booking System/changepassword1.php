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
else
{
    header("location:login2");
}
if(isset($_SESSION["verified"]))
{
    if(isset($_SESSION["passwordVerified"]))
    {
        if($_SESSION["passwordVerified"]==true)
        {
            header("location:index");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="style_login2.css">
    <script src="js/loader.js"></script>
    <title>ChangePwd</title>
</head>
<body>

<div id="preloader"></div>
<div class="logo"></div>
<div class="login-block">
<img src="images/login.gif" alt="" height="50%" width="50%" style="margin-left:25%">
    <h1>Login</h1>
    <form action="#" method="POST" onsubmit="loading()">
    <input type="password" name="newpassword" placeholder="Enter New Password" id="password" autocomplete="off">
    <input type="password" name="confirmpassword" placeholder="Rewrite your Password" id="password" />
    
    <?php
    if(isset($_POST["newpassword"]))
    {
        if($_POST["newpassword"]!=$_POST["confirmpassword"])
        {
            echo "password does not match";
        }
    }
     
    ?>
    <button name="submit">Submit</button>
    </form>
    <?php
        if(isset($_POST["submit"]))
        {
            if($_POST["newpassword"]==$_POST["confirmpassword"])
            {
                $tbname=$_SESSION["role"];
                $email=$_SESSION["email"];
                require_once "connection.php";
                $query="UPDATE `passenger` SET `PASSWORD`='".$_POST["newpassword"]."'$email'";
                $ret=mysqli_query($conn,$query);
                
                if($ret==true)
                {
                    $_SESSION["passwordVerified"]=true;
                    header("location:index");
                }
                else
                {
                    header("location:error.php");
                }
            }
        }
        else
        {

        }
        
    ?>
        
</div>
<script>
    window.addEventListener("load",function(){HH();})
    loading();
</script>    
</body>
</html>
