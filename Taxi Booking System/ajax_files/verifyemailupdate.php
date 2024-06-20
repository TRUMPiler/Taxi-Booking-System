<?php 
session_start();
include("../connection.php");
$query="update passenger set email='".$_SESSION["email2"]."', fname='".$_SESSION["fname"]."', lname='".$_SESSION["lname"]."', mname='".$_SESSION["mname"]."',address='".$_SESSION["address"]."',dob='".$_SESSION["dob"]."',gender='".$_SESSION["gender"]."',contact='".$_SESSION["contact"]."' where email='".$_SESSION["email"]."'";
$result=mysqli_query($conn,$query);
echo $query;
if($result>0)
{
    echo  true;
    $_SESSION["email"]=$_SESSION["email2"];
}
else
{
    echo false;
    include("../logoutGG.php");
}
?>