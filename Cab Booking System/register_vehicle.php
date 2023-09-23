<?php
session_start();
$veri="";
if(isset($_SESSION["verified"]))
{
    $veri=$_SESSION["verified"];
}
if(isset($_SESSION["vehiclenumber"]) and isset($_SESSION["vehiclename"]))
{
    if($veri==true)
    {
    header("location:index");
    } 
    else
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
    <?php
    
    ?>
    
<div id="preloader"></div>

    <div class="container-fluid">
    <!-- <img src="cab-removebg-preview.png" alt="">  -->
        <h1>&nbspRegister:</h1><hr>
        <h2>Vehicle Details:</h2><hr>
        <form action="#" method="post" onsubmit="loading()">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Company">Company: </label><br><br>
                    <input type="text" name="company" id="" class="form-control" placeholder="Enter your First name" required><br>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Vehicle Name">Name: </label><br><br>
                    <input type="text" name="vehiclename" id="" class="form-control" placeholder="Enter your First name" required><br>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="Registration no">Registration no: </label><br><br>
                    <input type="text" name="vehiclenumber" id="" class="form-control" placeholder="Enter your First name" required><br>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <!-- <button type="submit" class="btn btn-success" name="submit">Submit</button><br><br><br>     -->
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <button type="submit" class="btn btn-success" name="submit">Submit</button><br><br><br>    
                </div>
            </div>  
            <!-- <button type="submit" class="btn btn-success" name="submit">Submit</button><br><br><br> -->
            <?php
                    if(isset($_POST["submit"]) and $veri=="")
                    {
                        
                            $_SESSION["vehiclenumber"]=$_POST["vehiclenumber"];
                            $_SESSION["vehiclename"]=$_POST["vehiclename"];
                            $_SESSION["company"]=$_POST["company"];
                            $_SESSION["url"]="insertion.php";
                            header("location:otp");        
                        
                    }
            ?>
        </div>
        </form>
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