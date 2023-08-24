<?php
session_start();

?>
<!DOCTYPE html>
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
          if(isset($_SESSION["id"]))
          {
            $id=$_SESSION["id"];
            echo "<li><a href='login.php'>$id</a></li>";
            
          }
          else
          {
            echo "<li><a href='Register.php'>Login</a></li>"; 
          }
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
</html>