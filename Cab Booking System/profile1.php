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
    <title>Document</title>
</head>
<body>
<div class="banner" >
    <div class="navbar" data-aos="fade-down-left" data-aos-duration="1000">
        
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
        <?php
            require_once("connection.php");
            $sql="select * from ".$_SESSION["role"]." where fname='".$_SESSION["fname"]."' and password='".$_SESSION ["password"]."' limit 1";
            $result=mysqli_query($conn,$sql);
            if($result->num_rows>0)
            {
                while($row=$result->fetch_array())
                {

                    echo "<div class='circle'>
                    <img src='images/".$row["image"]."' alt='Not Found' class='logo' >
            </div>
                    <h2 style='text-align:left'>Personal Details:</h2> 
                    <div class='form-group'>  
                        <label for='First name'><h3>First name:</h3></label>
                        <input type='text' name='fname' id='' class='' placeholder='Enter your First name' 
                        value=".$row["fname"]."
                        disabled><br><br>
                    </div>
                    <div class='form-group'>
                        <label for='Last name'><h3>Last name:</h3></label>
                        <input type='text'  name='lname' id='' placeholder='Enter your Last name' value=".$row["lname"]." disabled><br><br>
                    </div>
                    <div class='form-group'>
                        <label for='Age'><h3>Birth Date:</h3></label>
                        <input type='text'  name='dob' id='' maxlength='3'value=".$row["dob"]." disabled><br><br>
                    </div>
                    <div class='form-group'>  
                        <label for='First name'><h3>Gender:</h3> </label>
                        <input type='text' name='fname' id=''  value=".$row["gender"]." placeholder='Enter your First name' disabled><br>
                    </div>
                    <div class='form-group'>
                        <label for='Address'><h3>Addresss:</h3></label><br>
                        <textarea name='address' class='' id='' cols='10' rows='3' placeholder='Enter your Address' disabled>".$row["address"]."</textarea><br><br>
                    </div>
                    <hr>
                    <h1 style='text-align:left'>Contact Details:</h1><br><br>
                    <div class='form-group'>
                        <label for='Email'><h3>Email ID:</h3> </label>
                        <input type='email'  name='email' id='' value=".$row["email"]." placeholder='Enter your Email' disabled><br>
                        
                    </div><br>
                    <div class=form-group'>
                        <label for='Contact'><h3>Contact:</h3></label>
                        <input type='tel' class='' id=''  value=".$row["contact"]." placeholder='Enter your contact number' maxlength='10' disabled><br><br>
                    </div>
                    <button type='submit' class='btn btn-success' name='submit'> Log out</button>
                    <a href='update_profile'><button type='submit' class='btn btn-success' name='update'>  Update</button><br><br><br></a>
                    <a href='changepassword.php'> <button type='submit' class='btn btn-success' name='changepwd'> Change password</button></a>
        ";
                }
            }
        ?>
            
            <!-- <div class="form-group">
                <label for="">Upload Profile Picture:</label><br><br>
                <input type="file" class="form-control" name="file" id="" required><br><br>
            </div> -->
            <?php
            if(isset($_POST["submit"]))
            {
              session_destroy();
              session_unset();
              header("location:index");       
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