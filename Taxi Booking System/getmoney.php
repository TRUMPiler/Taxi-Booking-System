<?php 
session_start();
include "connection.php";
$distance=$_POST["distance"];
// echo $_SESSION["id"];
$query="select * from vehicle where driver_id=".$_SESSION["id"]."";
$result=mysqli_query($conn,$query);
if($result->num_rows > 0)
{
    while($row=$result->fetch_assoc())
    {
        $query="select * from tbl_fuel_registery  where `Fuel-type`='".$row["Fuel-type"]."'";
        $results=mysqli_query($conn,$query);
        while($rows=$results->fetch_assoc())
        {
            echo round(($distance/$row["mileage"])*$rows["price_per_mileage"]);
        }
    }
}
?>