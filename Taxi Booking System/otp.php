<?php
session_start();
if(isset($_SESSION["verified"]))
{
    if($_SESSION["verified"]==true)
    {
        header("location:index");
    }
}
if(isset($_SESSION["email"]))
{
    $otp=random_int(10000,99999);
    $to_email = $_SESSION["email"];
    $subject = "OTP VERIFICATION";
    $body = "
    Hey welcome to taxi management system \n
    we hope you are enjoying your experience\n
    your otp is $otp\n 
    please insert it for further completion of the process";
    $headers = "From: dashtaxigg@gmail.com";
    echo "HELLO";
    if (mail($to_email, $subject, $body, $headers)) {
        $_SESSION["otp"]=$otp;
        header("location:process");
        
    } 
    else 
    {
        echo "GG";
       header("error.php");
    }
}
else
{
    header("location:index");
}

?>
