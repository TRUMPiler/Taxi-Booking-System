<?php 
session_start();
$query="select id from driver where fname='".$_SESSION["fname"]."' and email='".$_SESSION["email"]."'";
include "connection.php";
$result=mysqli_query($conn,$query);
if($result->num_rows>0)
{
    while($row=$result->fetch_array())
    {
        $query="insert into tbl_interest(RequestID,DriverID,Cost,date_of_request) values(".$_SESSION["RequestID"].",".$row["id"].",'".$_POST["cost_estimation"]."','".date('Y-m-d')."')";
        $results=mysqli_query($conn,$query);
       
    }
}
?>