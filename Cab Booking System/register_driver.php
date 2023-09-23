<?php
session_start();
$veri="";
if(isset($_SESSION["verified"]))
{
    if($_SESSION["verified"]==true)
    {
        header("location:index");
    }
    else
    {
        $veri=$_SESSION["verified"];
    }
}
if(isset($_SESSION["email"]) and isset($_SESSION["fname"]))
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
    <script src="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.js"></script>
    <link type="text/css" rel="stylesheet" href="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.css"/>

    <script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>
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
    <img src="cab-removebg-preview.png" alt=""> 
        <h1>Register: </h1><hr>
        <form action="#" method="post" onsubmit="loading()" class=".myForm" enctype="multipart/form-data">
        <?php

require_once "connection.php";
if(isset($_POST["email"]))
{
    $query="select email from passenger where email='".$_POST["email"]."'";
    $ret=mysqli_query($conn,$query);
    if($ret->num_rows>0)
    {
        $_SESSION["emailver"]="false";
        echo "<h5>Email already exits</h5>";
        echo "<div class='GG'><a href='login2'>click to go to login page</a></div>";
        echo "<script>
                                        HH();
                                        </script>";
        exit();
    }
    else
    {
      
        $query="select email from driver where email='".$_POST["email"]."'";
        $ret=mysqli_query($conn,$query);
        if($ret->num_rows>0)
        {
            $_SESSION["emailver"]="false";
            echo "<h5>Email already exits</h5>";
            echo "<div class='GG'><a href='login2'>click to go to login page</a></div>";
            echo "<script>
                                        HH();
                                        </script>";
            exit();
        }
        else
        {
          
            $query="select email from admin where email='".$_POST["email"]."'";
            $ret=mysqli_query($conn,$query);
            if($ret->num_rows>0)
            {
                $_SESSION["emailver"]="false";
                echo "<h5>Email already exits</h5>";
                echo "<div class='GG'><a href='login2'>click to go to login page</a></div>";
                echo "<script>
                                        HH();
                                        </script>";
                exit();
            }
            else
            {
              
                $_SESSION["emailver"]=true;
            }
        }
    }
}


?>
            <div class="form-group">
                <label for="First name">First name: </label><br><br>
                <input type="text" name="fname" id="" class="form-control" placeholder="Enter your First name" required><br>
            </div>
            <div class="form-group">
                <label for="Last name">Last name: </label><br><br>
                <input type="text" class="form-control" name="lname" id="" placeholder="Enter your Last name" required><br><br>
            </div>
            <div class="form-group">
                <label for="First name">Password: </label><br><br>
                <input type="password" name="password" id="" class="form-control" placeholder="Enter your password" required><br>
            </div>
            <div class="form-group">
                <label for="First name">Confirm Password: </label><br><br>
                <input type="password" name="confirmPass" id="" class="form-control" placeholder="Rewrite your password" required><br>
            </div>
            <div class="form-group">
                <label for="Email">Email ID: </label><br><br>
                <input type="email" class="form-control" name="email" id="" placeholder="Enter your Email" required><br><br>
            </div>
            <div class="form-group">
                <label for="Contact">Contact:</label><br><br>
                <input type="tel" class="form-control" id="" name="contact" placeholder="Enter your contact number" maxlength="10" required><br><br>
            </div>
            <div class="form-group">
                <label for="Age">Date:</label><br><br>
                <input type="date" class="form-control" name="dob" id="" maxlength="3" placeholder="0"required><br><br>
            </div>
            <label for="Gender">Gender:</label><br><br>
            <label class="radio-inline"><input type="radio" name="gender" value="Male" checked> Male</label>
            <label class="radio-inline"><input type="radio" name="gender" value="Female"> Female </label><br><br>
            <div class="form-group">
                <label for="Address">Address:</label><br><br>
                <textarea name="address" class="form-control" id="address" cols="30" rows="4" placeholder="Enter your Address" required onchange="overloading()"></textarea><br><br>
            </div>
            <div class="form-group">
                <label for="">Upload Profile Picture:</label><br><br>
                <input type="file" class="form-control" name="file" id="" required><br><br>
            </div>  
            <div>
                <label for="">Select City:</label><br><br>
               
               
               <?php 
                    $connect=mysqli_connect("localhost","root","","cms");
                    $sql = "SELECT CityID,City_Name FROM tbl_city where stateid=12";
                    $result = mysqli_query($connect, $sql);
                    if(mysqli_num_rows($result)>0){
                        
                        echo '<select name="city" id="dcity" class="form-control">';
                        echo '<option value="">--Select Country--</option>';
                        $num_results = mysqli_num_rows($result);
                        for ($i = 0; $i < $num_results; $i++) {
                            $row = mysqli_fetch_array($result);
                            $name = $row['City_Name'];
                            echo "<option value=".$row["CityID"].">" . $name . "</option>";
                            //echo '<option value="' . $name . '">' . $name . '</option>';
                        }
                        echo '</select>';
                        
                    }
                    
                ?>
               </select><br><br>
            </div>    
            <button type="submit" class="btn btn-success" name="submit">Submit</button><br><br><br>
            <?php
                   
                    if(isset($_POST["submit"]) and $veri=="" and isset($_SESSION["emailver"]))
                    {
                        echo "1";
                        if($_POST["password"]==$_POST["confirmPass"])
                        {
                            echo "2";
                            $_SESSION["city"]=$_POST["city"];
                            $_SESSION["fname"]=$_POST["fname"];
                            $_SESSION["lname"]=$_POST["lname"];
                            $_SESSION["password"]=$_POST["password"];
                           $_SESSION["dob"]=$_POST["dob"];
                           $_SESSION["gender"]=$_POST["gender"];
                            $_SESSION["contact"]=$_POST["contact"];
                            $_SESSION["address"]=$_POST["address"];
                            $_SESSION["email"]=$_POST["email"];
                            $_SESSION["role"]="driver";
                            $_SESSION["url"]="insertion.php";
                            $targetDir = "images/";
                            $fileName = basename($_FILES["file"]["name"]);
                            $targetFilePath = $targetDir . $fileName;
                            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

                            if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
                                echo "3";
                                // Allow certain file formats
                                $allowTypes = array('jpg','png','jpeg','gif','pdf');
                                if(in_array($fileType, $allowTypes))
                                {
                                    echo "4";
                                    // Upload file to server
                                    if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath))
                                    {
                                        echo "5";
                                        // Insert image file name into database
                                        $_SESSION["filename"]=$fileName;
                                        echo "<script>window.location='register_vehicle'</script>";       
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
        
    </div>
    <script>


        $(document).ready(function(){
            HH();
        })
        function overloading()
        {
            var daddress=document.getElementById("address").value; 
            console.log(daddress);   
            const settings = {

            async: true,
            crossDomain: true,
            url: 'https://trueway-geocoding.p.rapidapi.com/Geocode?address='+daddress+'&language=en',
            method: 'GET',
            headers: {
            'X-RapidAPI-Key': '39bebf8c65msh3c5431b6e89763ap1093ddjsn2d7d1e854615',
            'X-RapidAPI-Host': 'trueway-geocoding.p.rapidapi.com'
            }
            };

            $.ajax(settings).done(function (responses) {
            var city=responses.results[0].locality;
            console.log(city);
            var dropdown=document.getElementById("dcity");
            for(var i=0;i<dropdown.options.length;i++)
            {
                if(dropdown.options[i].text===city)
                {
                    dropdown.options[i].selected=true;
                    break;
                }
            }

            });
        }
        loading();
    </script>
     <script>
    AOS.init();
  </script>
  </form>
</body>
</html>