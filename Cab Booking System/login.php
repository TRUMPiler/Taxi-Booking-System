<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="styles_login.css">
    <title>Login</title>
    <style>
        a{
            text-decoration: none;

        }
        .line{
            box-shadow: -3px -9px 8px 2px black;
        }
        img{
            position: absolute;
            right:55%;
            top: 20%;
            transform: scaleX(-1);
            height: 29em;
        }
    </style>
</head>
<body>
<img src="images/cab-removebg-preview.png" alt="">
    <!-- <div class="nobg" id="noback"> -->
        <!-- <img src="cab.png" alt=""> -->
    <!-- </div> -->
    <div class="line"></div>
    <div class="right">
        <h1>Login: </h1><br>
        <form  method="post">
            <div class="form-group">
                <label for="email">Email ID:</label>
                <input type="email" class="form-control" placeholder="Enter your Email">
            </div><br>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" placeholder="Enter your Password">
            </div><br>
            <div class="checkbox">
                <label><a href="">Forgot Password?</a></label>
            </div><br>
            <button type="submit" class="btn btn-success" name="submit">Submit</button>
            <?php
            if(isset($_POST["submit"]))
            {
                header("location:index.php");
            } 
            ?>
        </form>
    </div>
</body>
</html>