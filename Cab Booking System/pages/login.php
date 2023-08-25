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
    </style>
</head>
<body>
    <div class="line"></div>
    <div class="right">
        <h1>Login: </h1><br>
        <form action="">
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
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
</body>
</html>