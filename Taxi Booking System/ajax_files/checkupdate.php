<?php 
session_start();
include "../connection.php";
if($_SESSION["emailver"]=="true")
{
    $query="update passenger set fname='".$_SESSION["fname"]."',mname='".$_SESSION["mname"]."',lname='".$_SESSION["lname"]."',contact=".$_SESSION["contact"].",address='".$_SESSION["address"]."',dob='".$_SESSION["dob"]."',gender='".$_SESSION["gender"]."',email='".$_SESSION["email"]."' where id=".$_SESSION["id"]."";
    $result=mysqli_query($conn,$query);
    if($result>0)
    {
        echo "<script>alert('updation done')</script>";
        echo "<script>window.location='../index'</script>";
    }
    else
    {
        echo "false";
    }
}
?>