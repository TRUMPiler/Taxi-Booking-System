<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="assets/js/loader.js"></script>
    <script src="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.js"></script>
    <link type="text/css" rel="stylesheet" href="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Register</title>
    <style>
        body {
            background-image: url('Images/Background.jpg');
            background-size: cover;
            background-repeat: no-repeat;
        }
        .card-body {
            width: 500px; /* Adjust the width as needed */
            height: 250px; /* Adjust the height as needed */
        }
        a{
            text-decoration: none;
            color: rgb(255, 174, 0);
        }
    </style>
</head>
<body>
    <div id="preloader"></div>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Email already exists!</h5><br><br>
                <a href="login" class="card-link"><h3>Click to go to the login page</h3></a>
            </div>
        </div>
    </div>
    <script>
        HH();
        loading();
    </script>
    
</body>
</html>

<!-- <!DOCTYPE html>
<html lang="en">

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="styles_customer.css">
    <script src="assets/js/loader.js"></script>
    <script src="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.js"></script>
    <link type="text/css" rel="stylesheet" href="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>
    <title>Register</title>
    <style>
        label {
            font: message-box;
        }

        img {
            height: 150px;
        }
    </style>
</head>

<body>
    <?php

    ?>

    <div id="preloader"></div>
    <?php
    echo "<h5>Email already exits</h5>";
    echo "<div class='GG'><a href='login'>click to go to login page</a></div>";
    echo "<script>
                                        HH();
                                        </script>";
    ?>
    
</body>

</html> -->
