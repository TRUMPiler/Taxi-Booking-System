
<?php
session_start();
if(isset($_SESSION["fname"]))
{
  if($_SESSION["fname"]!="")
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
    <link rel="stylesheet" href="style.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> 
  <script src="js/loader.js"></script>  
    <title>Document</title>
</head>
<body>
<div class="banner">
    <div class="navbar" data-aos="fade-down-left"   data-aos-duration="1000">
    <div class="bgimg"><h1>Register</h1></div> 
      <ul>  
        <li><a href="index">Home</a></li>
        <li><a href="service">services</a></li>
        <?php
        if(isset($_SESSION["verified"]))
        {
            if(isset($_SESSION["fname"]))
            {
              $id=$_SESSION["fname"];
              echo "<li><a href='logout.php'>$id</a></li>";
            }
            else
            {
              echo "<li><a href='login'>Login</a></li>"; 
            }
        }
        else
          {
            echo "<li><a href='login'>Login</a></li>"; 
          }
        ?>
      </ul>
    </div>
    <div data-aos="fade-down-left" data-aos-duration="1000" data-aos-delay="500">
    <a href="register_customer"><button class="button-28" role="button" onclick="loading()">Register as Passenger</button></a>
    <a href="register_driver"><button class="button-28" role="button">Register as Driver</button></a>
  </div>
    <script>
        window.addEventListener("load",function(){HH();})
        loading();
    </script>
    <script>
    AOS.init();
  </script>
</body>
</html>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>   
    <script src="js/loader.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="navbar">
    <ul>
        <div class="bgimg"><h1>Register</h1></div> 
        <li><a href="#">Home</a></li>
        <li><a href="#">services</a></li>
      
        <?php
       if(isset($_SESSION["id"]))
       {
         $id=$_SESSION["id"];
         echo "<li><a href='logout.php'>$id</a></li>";
         
       }
       else
       {
         echo "<li><a href='Register.php'>Login</a></li>"; 
       }
        ?>
        </ul>
    </div>
    <div data-aos="fade-down-left" data-aos-duration="1000">
       HTML <a href="register_customer"><button class="button-28" role="button" onclick="loading()">Register as Passenger</button></a>
<button class="button-28" role="button">Register as Driver</button>
      
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