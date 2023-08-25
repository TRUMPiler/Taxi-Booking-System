<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="styles_login.css">
    <script src="js/loader.js"></script>
    <title>Forgot Password</title>
    
</head>
<body>

    <div class="container-fluid">
    <!-- <img src="cab-removebg-preview.png" alt=""> 
        <h1>Register: </h1><hr>
        <form action="#" method="post" onsubmit="loading()">
        <div class='form-group'>
        <label for='OTP'>Enter OTP</label><br><br>
        <input type='text' class='form-control' name="otp" id='' placeholder='Enter your OTP'><br><br>
        <button type='submit' class='btn btn-success' name='submit_Otp'>Submit</button><br><br><br> -->
        <div class="side"><h1>Forgot Password</h1></div>
        
        <div class="container">
            <div class="circle">
                <img src="images/cab2.png" alt="Not Found">
            </div>
            <br>
            <form action="#"  method="POST" onsubmit="loading()">
            <div class="form">
                <input type="text" name="otp" autocomplete="off" required>
                <label for="OTP" class="label-name"><span class="content-name">Enter OTP</span></label>
            </div><br>
            <button type="submit" class="btn btn-success" name="submit_Otp">Submit</button>
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
