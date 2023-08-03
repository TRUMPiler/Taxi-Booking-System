<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="styles_customer.css">
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
    <div class="container-fluid">
    <img src="cab-removebg-preview.png" alt=""> 
        <h1>Register: </h1><hr>
        <form action="#" method="post" >
            <div class="form-group">
                <label for="First name">First name: </label><br><br>
                <input type="text" name="fname" id="" class="form-control" placeholder="Enter your First name"><br>
            </div>
            <div class="form-group">
                <label for="Last name">Last name: </label><br><br>
                <input type="text" class="form-control" name="lname" id="" placeholder="Enter your Last name"><br><br>
            </div>
            <div class="form-group">
                <label for="Email">Email ID: </label><br><br>
                <input type="email" class="form-control" name="email" id="" placeholder="Enter your Email"><br><br>
            </div>
            <div class="form-group">
                <label for="Contact">Contact:</label><br><br>
                <input type="tel" class="form-control" id="" name="contact" placeholder="Enter your contact number" maxlength="10" ><br><br>
            </div>
            <div class="form-group">
                <label for="Age">Date:</label><br><br>
                <input type="date" class="form-control" name="dob" id="" maxlength="3" placeholder="0"><br><br>
            </div>
            <label for="Gender">Gender:</label><br><br>
            <label class="radio-inline"><input type="radio" name="gender" value="Male" checked> Male</label>
            <label class="radio-inline"><input type="radio" name="gender" value="Female"> Female </label><br><br>
            <div class="form-group">
                <label for="Address">Address:</label><br><br>
                <textarea name="address" class="form-control" id="" cols="30" rows="4" placeholder="Enter your Address"></textarea><br><br>
            </div>  
            <button type="submit" class="btn btn-success" name="submit">Submit</button><br><br><br>
            <?php
                    if(isset($_POST["submit"]))
                    {
                        $_SESSION["fname"]=$_POST["fname"];
                        $_SESSION["lname"]=$_POST["lname"];
                        $_SESSION["dob"]=$_POST["dob"];
                        $_SESSION["gender"]=$_POST["gender"];
                        $_SESSION["contact"]=$_POST["contact"];
                        $_SESSION["address"]=$_POST["address"];
                        $_SESSION["email"]=$_POST["email"];
                        header("location:otp");                             
                    }
            ?>
        </form>
    </div>
</body>
</html>