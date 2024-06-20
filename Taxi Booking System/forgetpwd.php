<?php
session_start();
error_reporting(0);
if (isset($_SESSION["role"])) {
    if ($_SESSION["role"] == "") {
        header("location:login2");
    }
}
if (isset($_SESSION["passwordVerified"])) {
    if ($_SESSION["passwordVerified"] == true) {
        header("location:index");
    }
    $_SESSION["url"] = "";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style_login2.css">
    <script src="assets/js/loader.js"></script>
    <title>Change Paasswd</title>
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
            padding: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            border-radius: 20px;
            width: 700px;
            height: 300px;
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
                    <h1 class="card-header text-center">Change Password</h1>
                    <div class="card-body">
                        <form id="myform" onsubmit="loading()" method="POST" action="#">
                            <section class="registration-section" id="personal-info-section">
                                <div class="form-group">
                                    <label for="email">Email ID:</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email...." required>
                                    <span class="error" id="fname_err"> </span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <a href="profile"><button type="button" class="btn custom-button">Back to Profile</button></a>
                                    <button type="submit" name="submit" class="btn custom-button">Submit</button>
                                </div>
                            </section>
                            <?php
                            if (isset($_POST["submit"])) {
                                $_SESSION["url"] = "";
                                $_SESSION["url"] = "changepassword1";
                                $_SESSION["passwordVerified"] = false;
                                $_SESSION["email"] = $_POST["email"];
                                header("location:otp");
                            }

                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div id="preloader"></div>
<div class="logo"></div>
<div class="login-block">
<img src="images/login.gif" alt="" height="50%" width="50%" style="margin-left:25%">
    <h1>Change Password</h1>
    <form action="#" method="POST" onsubmit="loading()">
    <input type="email" name="email" placeholder="enter Your registered email" id="username" autocomplete="off">
    <button name="submit">Submit</button>
    </form> -->


    </div>
    <script>
        window.addEventListener("load", function() {
            HH();
        })
        loading();
    </script>
</body>

</html>