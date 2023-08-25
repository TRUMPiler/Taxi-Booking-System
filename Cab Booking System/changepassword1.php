<?php
session_start();
error_reporting(0);
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
    <h1>Login</h1>
    <form action="#" method="POST" onsubmit="loading()">
    <input type="password" name="newpassword" placeholder="Enter New Password" id="password" autocomplete="off">
    <input type="password" name="confirmpassword" placeholder="Rewrite your Password" id="password" /> -->
    <div class="side"><h1>Forgot Password</h1></div>
        
        <div class="container">
            <div class="circle">
                <img src="images/cab2.png" alt="Not Found">
            </div>
            <br>
            <form action="#"  method="POST" onsubmit="loading()">
            <div class="form">
                <input type="password" name="newpassword" autocomplete="off" required>
                <label for="OTP" class="label-name"><span class="content-name">Enter Password</span></label>
            </div><br>
            <div class="form">
                <input type="password" name="confirmpassword" autocomplete="off" required>
                <label for="OTP" class="label-name"><span class="content-name">Re-Enter Password</span></label>
            </div><br>
    <?php
    if(isset($_POST["newpassword"]))
    {
        if($_POST["newpassword"]!=$_POST["confirmpassword"])
        {
            echo "password does not match";
        }
    }
     
    ?>
    <button type="submit" class="btn btn-success" name="submit">Submit</button>    
    </form>
    <?php
        if(isset($_POST["submit"]))
        {
            if($_POST["newpassword"]==$_POST["confirmpassword"])
            {
                $email=$_SESSION["email"];
                require("connection.php");
                $sql="select email from passenger where email='".$email."'";
                $ret=mysqli_query($conn,$sql);
                if($ret->num_rows>0)
                {
                    require("connection.php");
                    echo "passenger called";
                    echo "$email";
                    $sqls="UPDATE `passenger` SET `password`='".$_POST["newpassword"]."' WHERE email='".$email."'";
                    $rets=mysqli_query($conn,$sqls);
                    if($ret->num_rows>0)
                    {
                        echo "$email";
                        $sql = "SELECT * FROM passenger where email='".$email."' limit 1";
                        $ret=mysqli_query($conn,$sql);
                        if($ret->num_rows>0)
                            while($row=$ret->fetch_array())
                            {
                               
                                echo "function called";
                                $_SESSION["fname"]=$row["fname"];
                            $_SESSION["lname"]=$row["lname"];
                            $_SESSION["dob"]=$row["dob"];
                            $_SESSION["gender"]=$row["gender"];
                            $_SESSION["contact"]=$row["contact"];
                            $_SESSION["address"]=$row["address"];
                            $_SESSION["email"]=$row["email"];
                            $_SESSION["password"]=$row["password"];
                            $_SESSION["role"]="passenger";
                            $_SESSION["verified"]=true;
                            header("location:index");
                            }
                            
                    }
                    
                }
                else{
                    $sql="select email from admin where email='".$email."'";
                        $ret=mysqli_query($conn,$sql);
                        if($ret->num_rows>0)
                        {
                            $sql = "SELECT * FROM adminr where email='".$_POST["email"]."' limit 1";
                            $_SESSION["fname"]=$row["fname"];
                            $_SESSION["lname"]=$row["lname"];
                            $_SESSION["dob"]=$row["dob"];
                            $_SESSION["gender"]=$row["gender"];
                            $_SESSION["contact"]=$row["contact"];
                            $_SESSION["address"]=$row["address"];
                            $_SESSION["email"]=$row["email"];
                            $_SESSION["password"]=$row["password"];
                            $_SESSION["role"]="passenger";
                            $_SESSION["verified"]=true;
                            header("location:index");
                    }
                }
            }
           
        }
        
    ?>
        
</div>
<script>
    window.addEventListener("load",function(){HH();})
    loading();
</script>    
</body>
</html>
