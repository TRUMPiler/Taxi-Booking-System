<?php
session_start(); 

if($_SERVER["REQUEST_METHOD"]="POST")
{
    $passid=0;
    include "connection.php";
   
    $connect=mysqli_connect("localhost","root","","cms");
    $query="INSERT INTO `tbl_request_ride`(`SourceAddress`, `DestinationAddress`, `SourceCity`, `DestinationCity`, `From`, `To`,`PassCount`, `passengerId`) VALUES ('".$_POST["source_address"]."','".$_POST["daddress"]."','".$_POST["city"]."','".$_POST["dcity"]."','".$_POST["from-dt"]."','".$_POST["to-dt"]."','".$_POST["noofpassengers"]."',".$_SESSION["id"].")";
    $result=mysqli_query($connect,$query);
    if(mysqli_affected_rows($connect))
    {
        echo "success";
    }
    else
    {
        echo "fail";
    }
}
else
{
    echo "failed";
}
?>