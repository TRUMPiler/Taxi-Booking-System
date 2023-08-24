<?php
session_start();
if(isset($_SESSION["verified"]) and isset($_SESSION["email"]))
{
    header("location:index");
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="styles_login.css">
    <script src="js/loader.js"></script>
    <title>Login</title>
    <style>
        a{
            text-decoration: none;
            color: yellow;
        }
    </style>
</head>
<body>
    <!-- <div class="nobg" id="noback"> -->
        <!-- <img src="cab.png" alt=""> -->
        <!-- </div> -->
        <!-- <div class="line"></div> -->
        <!-- <img src="images/cab-removebg-preview.png" alt=""> -->
        <div class="side">
        <h1>Login</h1>
        </div>
        
        <div class="container">
            <div class="circle">
                <img src="images/cab2.png" alt="Not Found">
            </div>
            <br>
            <form action="#"  method="POST" onsubmit="loading()">
            <div class="form">
                <input type="email" name="email" required>
                <label for="email" class="label-name"><span class="content-name">Email</span></label>
            </div><br>
            <div class="form">
                <input type="password" name="password" required>
                <label for="pwd" class="label-name"><span class="content-name">Password</span></label>
            </div><br>
            <div class="checkbox">
                <label><a href="">Forgot Password?</a></label><br>
                <label>Don't Have Account?<a href="Register"> Register</a></label>
            </div><br>
            <button type="submit" class="btn btn-success" name="submit">Submit</button>
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
                            header("location:error");
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
        </form>
    </div>
    <script>
        window.addEventListener("load",function(){HH();})
        loading();
        </script>
</body>
</html>