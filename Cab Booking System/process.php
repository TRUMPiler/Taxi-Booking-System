<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="styles_customer.css">
    <script src="js/loader.js"></script>
    <title>Register</title>
    <style>
        label{
            font: message-box;
        }
        img{
            height: 150px;
        }
    </style>
</head>
<body>

    <div class="container-fluid">
    <img src="cab-removebg-preview.png" alt=""> 
        <h1>Register: </h1><hr>
        <form action="#" method="post" onsubmit="loading()">
        <div class='form-group'>
        <label for='OTP'>Enter OTP</label><br><br>
        <input type='text' class='form-control' name="otp" id='' placeholder='Enter your OTP'><br><br>
        <button type='submit' class='btn btn-success' name='submit_Otp'>Submit</button><br><br><br>
        </div>
            <?php
                
                     if(isset($_POST["submit_Otp"]))
                     {
                        if($_SESSION["otp"]==$_POST["otp"])
                        {
                            $_SESSION["verified"]=true;
                            $url=$_SESSION["url"];
                            header("location:$url");

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
