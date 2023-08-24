<?php
session_start();
error_reporting(0);
if(isset($_SESSION["verified"]))
{
    if($_SESSION["verified"]==true)
    {
        header("location:index");
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
    <title>Document</title>
</head>
<body>

<div id="preloader"></div>
<div class="logo"></div>
<div class="login-block">
<img src="images/login.gif" alt="" height="50%" width="50%" style="margin-left:25%">
    <h1>Login</h1>
    <form action="#" method="POST" onsubmit="loading()">
    <input type="email" name="email" placeholder="Enter email" id="username" autocomplete="off">
    <input type="password" name="password" placeholder="Password" id="password" />
    <button name="submit">Submit</button>
    </form>
    <?php
            require_once("connection.php");
            if(isset($_POST["submit"]))
            {
                $sql = "SELECT * FROM passenger where email='".$_POST["email"]."' limit 1";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) 
                {
                // output data of each row
                    while($row = $result->fetch_assoc()) 
                    {
                        if($row["email"]==$_POST["email"] and $row["password"]==$_POST["password"])
                        {
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
                        else
                        {
                            header("location:error.php");
                        }
                    }
                } 
                else 
                {
                    $sql = "SELECT * FROM driver where email='".$_POST["email"]."' limit 1";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) 
                    {
                    // output data of each row
                        while($row = $result->fetch_assoc()) 
                        {
                            if($row["email"]==$_POST["email"] and $row["password"]==$_POST["password"])
                            {
                                $_SESSION["fname"]=$row["fname"];
                                $_SESSION["lname"]=$row["lname"];
                                $_SESSION["dob"]=$row["dob"];
                                $_SESSION["gender"]=$row["gender"];
                                $_SESSION["contact"]=$row["contact"];
                                $_SESSION["address"]=$row["address"];
                                $_SESSION["email"]=$row["email"];
                                $_SESSION["password"]=$row["password"];
                                $_SESSION["role"]="driver";
                                $_SESSION["verified"]=true;
                                $_SESSION["filename"]=$row["image"];
                                header("location:index.php");
                            }
                            else
                            {
                                header("location:error.php");
                            }
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
