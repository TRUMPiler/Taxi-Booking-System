
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.
0/css/bootstrap.min.css">
        <link rel="stylesheet" href="Styles098.css"> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.
js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.m
in.js"></script>
<script src="js/loader.js"></script>
        <style>
            .form-horizontal{
    border: 1px solid;
  margin: auto;
  width: 50%;
  padding: 10px;
}
#formdesign{
    font-family: fantasy;
    font-size: 15px;
    background-color: yellow;
}
        </style>
    </head>
    <body>
         <form class="form-horizontal" id="formdesign" action="/action_page.php">
            <div class="form-group">
                <label class="control-label col-sm-4" for="oldpasswrd">Old Password:</label>
                <div class="col-sm-3">
                     <input type="password" class="form-control" id="oldpwd" placeholder="enter old password">
                 </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4" for="newpasswrd">New Password:</label>
                <div class="col-sm-3">
                     <input type="password" class="form-control" id="newpwd" placeholder="enter new password">
                 </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4" for="confirmpasswrd">Confirm Password:</label>
                <div class="col-sm-3">
                     <input type="password" class="form-control" id="confirmpwd" placeholder="re-enter new password">
                 </div>
            </div>      
         </form>
        <?php
            
        ?>
          <script>
        window.addEventListener("load",function(){HH();})
        loading();
    </script>
    </body>
</html>