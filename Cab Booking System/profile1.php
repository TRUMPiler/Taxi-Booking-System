<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="profile.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>   
  <script src="js/loader.js"></script>
    <title>Profile</title>
</head>
<body>
<div class="banner" >
    <div class="navbar" data-aos="fade-down-left" data-aos-duration="1000">
        <div class="circle">
                <img src="images/naishal.jpg" alt="Not Found" class="logo" >
        </div>
      <!-- <ul>
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
      </ul> -->
    </div>
    <hr>
    <div class="container">
       <form action="#" method="POST">
            <h2 style="text-align:left">Personal Details:</h2> 
            <div class="form-group">  
                <label for="First name">First name: </label><br><br>
                <input type="text" name="fname" id="" class="form-control" placeholder="Enter your First name" readonly><br>
            </div>
            <div class="form-group">
                <label for="Last name">Last name: </label><br><br>
                <input type="text" class="form-control" name="lname" id="" placeholder="Enter your Last name" readonly><br><br>
            </div>
            <div class="form-group">
                <label for="Age">Birth Date:</label><br><br>
                <input type="text" class="form-control" name="dob" id="" maxlength="3" readonly><br><br>
            </div>
            <div class="form-group">  
                <label for="First name">Gender: </label><br><br>
                <input type="text" name="fname" id="" class="form-control" placeholder="Enter your First name" readonly><br>
            </div>
            <div class="form-group">
                <label for="Address">Address:</label><br><br>
                <textarea name="address" class="form-control" id="" cols="30" rows="4" placeholder="Enter your Address" readonly></textarea><br><br>
            </div>
            <hr>
            <h2 style="text-align:left">Contact Details:</h2>
            <div class="form-group">
                <label for="Email">Email ID: </label><br>
                <input type="email" class="form-control" name="email" id="" placeholder="Enter your Email" readonly><br>
                
            </div><br>
            <div class="form-group">
                <label for="Contact">Contact:</label><br><br>
                <input type="tel" class="form-control" id="" name="contact" placeholder="Enter your contact number" maxlength="10" readonly><br><br>
            </div>
            <button type="submit" class="btn btn-success" name="submit"> Log out</button>
            <button type="submit" class="btn btn-success" name="update">  Update</button><br><br><br>
            <button type="submit" class="btn btn-success" name="changepwd"> Change password</button>
            <!-- <div class="form-group">
                <label for="">Upload Profile Picture:</label><br><br>
                <input type="file" class="form-control" name="file" id="" required><br><br>
            </div> -->
            <?php
            if(isset($_POST["submit"]))
            {
              session_destroy();
              session_unset();
              header("location:index.php");       
            }
            ?>
       </form>
    </div>
    <!-- <form  method="POST" action="#">
        <label for="">do you want to logout??</label>
        
        <input type="submit" value="YES" name="submit">
        <a href="index.php"><input type="reset" value="NO">
        
        </form> -->
</div>
        

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