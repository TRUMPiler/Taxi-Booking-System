<?php
session_start();
include "../connection.php"; 
$query="select * from vehicle where driver_id='".$_SESSION["id"]."'";
$result=$result=mysqli_query($conn,$query);
if($result->num_rows > 0){
while($row=$result->fetch_assoc())
{
    $query="select * from vehicle where `vehicle-number`='".$_POST["platenumber"]."' and not `vehicle-number`='".$row["vehicle-number"]."'";
$results=mysqli_query($conn,$query);
if($results->num_rows>0){
    echo "vehicle exists";
    exit();
}

}
}
?>