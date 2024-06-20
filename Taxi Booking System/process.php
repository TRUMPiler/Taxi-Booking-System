<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="Images/Taxibooking.png" rel="icon">
    <script src="js/loader.js"></script>
    <title>Register</title>
    <style>
        #preloader {
            background: transparent url("images/loading.gif") no-repeat center;
            backdrop-filter: blur(10px);
            background-size: 13%;
            height: 100vh;
            width: 100%;
            position: fixed;
            z-index: 100;
        }

        .error span {
            color: red;

        }

        span.error {
            color: red;
            border-radius: 2px solid red;
        }

        body {
            background-image: url('Images/Background.jpg');
            /* Set the URL of your background image */
            background-size: cover;
            /* Cover the entire viewport with the image */
            background-repeat: no-repeat;
            /* Prevent image repetition */
            color: rgb(255, 174, 0);
            /* Set text color to white for better visibility */
        }

        .container {
            /* background: rgba(255, 255, 255, 0.8); */
            border-radius: 10px;
            padding: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            border-radius: 20px;
            width: 700px;
            height: 250px;
        }

        .custom-button {
            background: white;
            /* White background */
            color: rgb(255, 174, 0);
            /* Text color */
            border: 2px solid rgb(255, 174, 0);
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }

        /* Button hover effect using Bootstrap classes */
        .custom-button:hover {
            background: rgb(255, 174, 0);
            /* Background color on hover */
            color: white;
            /* Text color on hover */
        }

        .form-control:focus {
            border-color: rgb(255, 174, 0);
            /* Border color when focused */
        }
    </style>
</head>
<body>
<div class="container">
        <div class="row justify-content-start">
            <div class="col-md-8">
                <div class="card">
                    <h1 class="card-header text-center">Verification</h1>
                    <div class="card-body">
                        <form id="myform" onsubmit="loading()" method="post">
                            <section class="registration-section" id="personal-info-section">
                                <div class="form-group">
                                    <label for="email"><h6>Enter OTP:</h6></label><br>
                                    <input type="number" class="form-control" id="email" name="otp" placeholder="Enter the OTP you recieved on your email...." required>
                                    <span class="error" id="fname_err"> </span>
                                </div><br>
                                <div class="d-flex justify-content-end">
                                    <!-- <a href="profile"><button type="button" class="btn custom-button">Back to Profile</button></a> -->
                                    <button type="submit" name="submit_Otp" class="btn custom-button">Submit</button>
                                </div>
                            </section>
                            <?php
                            if (isset($_POST["submit_Otp"])) {
                                if ($_SESSION["otp"] == $_POST["otp"]) {
                                    $_SESSION["verified"] = true;
                                    $url = $_SESSION["url"];
                                    header("location:./$url");
                                }
                            }
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.addEventListener("load",function(){HH();})
        loading();
    </script>
</body>
</html>
<!-- <div class="container-fluid">
    <img src="cab-removebg-preview.png" alt=""> 
        <h1>Register: </h1><hr>
        <form action="#" method="post" onsubmit="loading()">
        <div class='form-group'>
        
        <label for='OTP'>Enter OTP</label><br><br>
        <input type='text' class='form-control' name="otp" id='' placeholder='Enter your OTP'><br><br>
        <button type='submit' class='btn btn-success' name='submit_Otp'>Submit</button><br><br><br>
        </div>
            <?php
                
                    //  if(isset($_POST["submit_Otp"]))
                    //  {
                    //     if($_SESSION["otp"]==$_POST["otp"])
                    //     {
                    //         $_SESSION["verified"]=true;
                    //         $url=$_SESSION["url"];
                    //         header("location:$url");

                    //     }
                    //     else
                    //     {
                    //         echo "<script>alert('Entered otp is incorrect \nPlease enter the correct otp')</script>";
                    //     }
                    //  } 
            ?>
        </form>
    </div> -->