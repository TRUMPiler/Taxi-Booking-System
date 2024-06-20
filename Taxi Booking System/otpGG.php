<?php
if(isset($_POST["email"]))
{
    $otp=random_int(10000,99999);
    $to_email = $_POST["email"];
    $subject = "OTP VERIFICATION";
    $body = "
    
    your otp is $otp\n 
    please insert it in the ".$_POST["emailtype"]." textbox of your page";
    $headers = "From: dashtaxigg@gmail.com";
    // echo "HELLO";
    if (mail($to_email, $subject, $body, $headers)) {
        echo $otp;
        
    } 
    else 
    {
        echo "false";
       
    }
}


?>
