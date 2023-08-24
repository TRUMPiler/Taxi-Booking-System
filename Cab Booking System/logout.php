<?php
session_start();

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
<div class="banner" >
    <div class="navbar" data-aos="fade-down-left" data-aos-duration="1000">
     <a href="index.php"><img src="images/image.png" class="logo"></a>
      <ul>
        <li><a href="index">Home</a></li>
        <li><a href="service">services</a></li>
        <?php
       if(isset($_SESSION["id"]))
       {
         $id=$_SESSION["id"];
         echo "<li><a href='Register.php'>$id</a></li>";
         echo "<li><a href='changepwd.php'>logout</a></li>";
         
       }
       else
       {
         echo "<li><a href='Register.php'>Login</a></li>"; 
       }
        ?>
      </ul>
    </div>
    <div data-aos="fade-down-left" data-aos-duration="1000">
      
    </div>

        <form  method="POST" action="#">
        <label for="">do you want to logout??</label>
        
        <input type="submit" value="YES" name="submit">
        <a href="index.php"><input type="reset" value="NO">
        <?php
        if(isset($_POST["submit"]))
        {
            session_destroy();
            session_unset();
            header("location:index.php");       
        }
        ?>
        </form>

        <?php
            #SQL Section:
        //     $username="Pranav";
        //     $password="pranav1122";
        //     $host="localhost";
        //     $database="test123";
        //     $mysql=mysqli_connect($host,$username,$password,$database);
        //     $query="insert into tbl_cust values(1,'Pranav')";
        //     mysqli_execute_query($mysql,$query);
        // 
        ?>


    <script>
    AOS.init();
  </script>
    <script>
        window.addEventListener("load",function(){HH();})
        loading();
    </script>
</body>
</html>