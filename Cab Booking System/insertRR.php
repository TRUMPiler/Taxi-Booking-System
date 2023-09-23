<?php
session_start(); 

if($_SERVER["REQUEST_METHOD"]="POST")
{
    $passid=0;
    include "connection.php";
    $query="select id from passenger where fname='".$_SESSION["fname"]."' and lname='".$_SESSION["lname"]."'";
    $result=mysqli_query($conn,$query);
    if($result->num_rows>0)
    {
        while($row=$result->fetch_array())
        {
            $passid=$row["id"];        
        }
    }
    $conn->close();
    $connect=mysqli_connect("localhost","root","","cms");
    $query="INSERT INTO `tbl_request_ride`(`SourceAddress`, `DestinationAddress`, `SourceCity`, `DestinationCity`, `From`, `To`, `passengerId`) VALUES ('".$_POST["source_address"]."','".$_POST["daddress"]."','".$_POST["city"]."','".$_POST["dcity"]."','".$_POST["from-dt"]."','".$_POST["to-dt"]."',".$passid.")";
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