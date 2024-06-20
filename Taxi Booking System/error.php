<?php
session_start();

?>
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
            width: 500px; 
            height: 250px;
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
                <h5 class="card-title">ERROR!: Server Connection Failed ☹️</h5>
                <h5 class="card-title">Please try again.</h5><br><br>
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>   
    <script src="js/loader.js"></script>
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <style>
      h2
{
  margin: auto;
  padding: 10%;
  color: white;
}
    </style>
</head>
<body>
<div class="banner" >
    <div class="navbar" data-aos="fade-down-left"   data-aos-duration="1000">
     <a href="index.php"><img src="images/image.png" class="logo"></a>
      <ul>  
        <li><a href="#">Home</a></li>
        <li><a href="#">services</a></li>
        <?php
          // if(isset($_SESSION["id"]))
          // {
          //   $id=$_SESSION["id"];
          //   echo "<li><a href='login.php'>$id</a></li>";
            
          // }
          // else
          // {
          //   echo "<li><a href='Register.php'>Login</a></li>"; 
          // }
        ?>
      </ul>
    </div>
    <div>
      <h2>ERROR SERVER CONNECTION FAILED</h2>
    </div>
    <script>
        window.addEventListener("load",function(){HH();})
        loading();
    </script>
    <script>
    AOS.init();
  </script>
</body>
</html> -->
