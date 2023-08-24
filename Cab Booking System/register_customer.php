<?php
session_start();
$veri="";
if(isset($_SESSION["verified"]))
{
    $veri=$_SESSION["verified"];
}
if(isset($_SESSION["email"]) and isset($_SESSION["fname"]) and isset($_SESSION["emailver"]))
{
    if($veri==true)
    {
         header("location:index");
    } 
    if($_SESSION["emailver"]==false)
    {
        header("location:process");
    }
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="styles_customer.css">
    <script src="js/loader.js"></script>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    <title>Register</title>
    <style>
       
        label{
            font: message-box;
        }
        img{
            height: 150px;
        }
    </style>
</head>
<body>
    
<!-- <div id="preloader"></div> -->

    <div class="container"> 
        <h1>Register: </h1><hr>
        <form action="#" method="post" onsubmit="" enctype="multipart/form-data">
        <?php

                require_once "connection.php";
                if(isset($_POST["email"]))
                {
                    $query="select email from passenger where email='".$_POST["email"]."'";
                    $ret=mysqli_execute_query($conn,$query);
                    if($ret==true)
                    {
                        $_SESSION["emailver"]=="false";
                        echo "<h5>Email already exits</h5>";
                        echo "<div class='GG'><a href='login2'>click to go to login page</a></div>";
                        exit();
                    }
                    
                }
                else
                {
                  
                    $_SESSION["emailver"]=true;
                }
                
                ?>
                <!-- <div class="container">
  <h1>Grid</h1>
  <p>This example demonstrates a 50%/50% split on small, medium and large devices. On extra small devices, it will stack (100% width).</p>      
  <p>Resize the browser window to see the effect.</p>      
  <div class="row">
    <div class="col-sm-6" style="background-color:yellow;">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<br>
      Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
    </div>
    <div class="col-sm-6" style="background-color:pink;">
      Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto.    
    </div>
  </div>
</div>
 -->
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="First name">First name: </label><br><br>
                    <input type="text" name="fname" id="" class="form-control" placeholder="Enter your First name" required><br>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Last name">Last name: </label><br><br>
                    <input type="text" class="form-control" name="lname" id="" placeholder="Enter your Last name" required><br><br>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Email">Email ID: </label><br>
                    <input type="email" class="form-control" name="email" id="" placeholder="Enter your Email" required><br>
                </div><br>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Contact">Contact:</label><br><br>
                    <input type="tel" class="form-control" id="" name="contact" placeholder="Enter your contact number" maxlength="10" required><br><br>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="First name">Password: </label><br><br>
                    <input type="password" name="password" id="" class="form-control" placeholder="Enter your password" required><br>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="First name">Confirm Password: </label><br><br>
                    <input type="password" name="confirmPass" id="" class="form-control" placeholder="Rewrite your password" required><br>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Age">Date:</label><br><br>
                    <input type="date" class="form-control" name="dob" id="" maxlength="3" placeholder="0"required><br><br>
                </div>
            </div>
        </div>
            
            <label for="Gender">Gender:</label><br><br>
            <label class="radio-inline"><input type="radio" name="gender" value="Male" checked> Male</label>
            <label class="radio-inline"><input type="radio" name="gender" value="Female"> Female </label><br><br>
            <div class="form-group">
                <label for="Address">Address:</label><br><br>
                <textarea name="address" class="form-control" id="" cols="10" rows="4" placeholder="Enter your Address" required></textarea><br><br>
            </div>
            <div class="form-group">
                <label for="">Upload Profile Picture:</label><br><br>
                <input type="file" class="form-control" name="file" id="" required><br><br>
            </div>  
            <button type="submit" class="btn btn-success" name="submit">Submit</button><br><br><br>
            <?php
                    if($_SESSION["emailver"]==false)
                    {
                        sleep(10);
                        header("location:login2");
                        exit();    
                    }
                    if(isset($_POST["submit"]) and $veri=="" and isset($_SESSION["emailver"]))
                    {
                        if($_POST["password"]==$_POST["confirmPass"] and $_SESSION["emailver"]==true)
                        {
                            $_SESSION["fname"]=$_POST["fname"];
                            $_SESSION["lname"]=$_POST["lname"];
                            $_SESSION["password"]=$_POST["password"];
                           $_SESSION["dob"]=$_POST["dob"];
                           $_SESSION["gender"]=$_POST["gender"];
                            $_SESSION["contact"]=$_POST["contact"];
                            $_SESSION["address"]=$_POST["address"];
                            $_SESSION["email"]=$_POST["email"];
                            $_SESSION["role"]="passenger";
                            $_SESSION["url"]="insertion.php";
                            $targetDir = "images/";
                            $fileName = basename($_FILES["file"]["name"]);
                            $targetFilePath = $targetDir . $fileName;
                            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

                            if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
                                // Allow certain file formats
                                $allowTypes = array('jpg','png','jpeg','gif','pdf');
                                if(in_array($fileType, $allowTypes))
                                {
                                    // Upload file to server
                                    if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath))
                                    {
                                        // Insert image file name into database
                                        $_SESSION["filename"]=$fileName;
                                        header("location:otp");       
                                    }
                                }
                                else
                                {
                                    echo 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
                                }
                        }
                               
                            
                        }
                                               
                }
                        
                       
            ?>
        </form>
    </div>
    <script>
        // window.addEventListener("load",function(){HH();})
        // loading();
    </script>
     <script>
    AOS.init();
  </script>
</body>
</html>