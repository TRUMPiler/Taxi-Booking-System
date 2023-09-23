<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> 
  <script src="js/loader.js"></script>  
    <title>Document</title>
</head>
<body>
<div class="banner">
    <div class="navbar" data-aos="fade-down-left"   data-aos-duration="1000">
     <a href="index.php"><img src="images/cab2.png" class="logo"></a>
      <ul>  
        <li><a href="index">Home</a></li>
        <li><a href="service">services</a></li>
        <?php
        if(isset($_SESSION["verified"]))
        {
            if(isset($_SESSION["fname"]))
            {
              $id=$_SESSION["fname"];
              echo "<li><a href='profile1'>$id</a></li>";
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
      <h2>Welcome to TAXDAS</h2>
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