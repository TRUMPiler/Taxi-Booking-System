<?php 

include "connection.php"; 
$query="SELECT 
tbl_interest.RequestID,
driver.id AS driver_id
FROM 
tbl_interest
JOIN 
driver ON driver.id = tbl_interest.vehicle_id  -- Updated foreign key to vehicle_id
JOIN 
vehicle ON tbl_interest.vehicle_id = vehicle.id
JOIN 
tbl_booked ON tbl_booked.Booked_ID = tbl_interest.interestID
WHERE 
driver.id = ".$_SESSION["id"]." 
AND NOT tbl_booked.RideStatus IN ('Ride Completed','Ride Cancelled');

";
// echo $query;
$result=mysqli_query($conn,$query);
if($result->num_rows>0)
{
    $_SESSION["rrveri"]=false;
}
else
{
    $_SESSION["rrveri"]=true;
}
?>