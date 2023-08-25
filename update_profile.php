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
    <title>Update Profile</title>
</head>
<body>
<div class="container-fluid">
    <!-- <img src="cab-removebg-preview.png" alt=""> -->
    <div class="side"><h1>Update Details: </h1></div><br>
        <!-- <h1>Update Details: </h1><hr> -->
        <form action="#" method="post" onsubmit="loading()" enctype="multipart/form-data">
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
                        exit();
                    }
                    else
                    {
                      
                        $_SESSION["emailver"]=true;
                    }
                }
               
                
                ?>
            <!-- <div class="form-group">
                
                <label for="First name">First name: </label><br><br>
                <input type="text" name="fname" id="" class="form-control" placeholder="Enter your First name" required><br>
            </div>
            <div class="form-group">
                <label for="Last name">Last name: </label><br><br>
                <input type="text" class="form-control" name="lname" id="" placeholder="Enter your Last name" required><br><br>
            </div> -->
            <!-- <div class="form-group">
                <label for="First name">Password: </label><br><br>
                <input type="password" name="password" id="" class="form-control" placeholder="Enter your password" required><br>
            </div>
            <div class="form-group">
                <label for="First name">Confirm Password: </label><br><br>
                <input type="password" name="confirmPass" id="" class="form-control" placeholder="Rewrite your password" required><br>
            </div> -->
            <div class="form-group">
                <label for="Email">Email ID: </label><br>
                <input type="email" class="form-control" name="email" id="" placeholder="Enter your Email" required><br>
                
            </div><br>
            <div class="form-group">
                <label for="Contact">Contact:</label><br><br>
                <input type="tel" class="form-control" id="" name="contact" placeholder="Enter your contact number" maxlength="10" required><br><br>
            </div>
            <!-- <div class="form-group">
                <label for="Age">Date:</label><br><br>
                <input type="date" class="form-control" name="dob" id="" maxlength="3" placeholder="0"required><br><br>
            </div> -->
            <!-- <label for="Gender">Gender:</label><br><br>
            <label class="radio-inline"><input type="radio" name="gender" value="Male" checked> Male</label>
            <label class="radio-inline"><input type="radio" name="gender" value="Female"> Female </label><br><br> -->
            <div class="form-group">
                <label for="Address">Address:</label><br><br>
                <textarea name="address" class="form-control" id="" cols="30" rows="4" placeholder="Enter your Address" required></textarea><br><br>
            </div>
            <div class="form-group">
                <label for="">Upload Profile Picture:</label><br><br>
                <input type="file" class="form-control" name="file" id="" required><br><br>
            </div>  
            <button type="submit" class="btn btn-success" name="submit">Submit</button><br><br><br>
            <?php
                   
                    if(isset($_POST["submit"]) and $veri=="" and isset($_SESSION["emailver"]))
                    {
                        // if($_POST["password"]==$_POST["confirmPass"] and $_SESSION["emailver"]==true)
                        // {
                            $_SESSION["city"]=101;
                            
                            $_SESSION["contact"]=$_POST["contact"];
                            $_SESSION["address"]=$_POST["address"];
                            $_SESSION["email"]=$_POST["email"];
                            
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
                                        require_once("connection.php");
                                        $_SESSION["filename"]=$fileName;
                                        $sql="update ".$_SESSION["role"]." set CityGG=".$_SESSION["city"].",contact=".$_SESSION["contact"].",email='".$email."'";
                                        $ret=mysqli_query($conn,$sql);
                                        if($ret->num_rows>0)
                                        {
                                            echo "<script>windows.location='otp'</script>";
                                        }       
                                    }
                                }
                                else
                                {
                                    echo 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
                                }
                        
                               
                            
                        }
                                               
                }
                        
                       
            ?>
        </form>
    </div>
</body>
</html>