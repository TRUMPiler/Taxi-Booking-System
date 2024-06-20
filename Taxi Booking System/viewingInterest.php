<?php

if(isset($_SESSION["fname"]))
{
    if($_SESSION["fname"]=="")
    {
        echo "<script>window.location='login.php'</script>";
    }
}

include "connection.php";
$query="SELECT 
rr.interestID, 
rr.RequestID, 
driver.id AS DriverID,
driver.fname AS DriverName, 
vehicle.company_name AS VehicleCompany, 
vehicle.model AS Model, 
rr.Cost AS Cost, 
COALESCE(tbl_booked.RideStatus, 'Not Booked') AS RideStatus, 
driver.image AS Image 
FROM 
tbl_interest AS rr 
JOIN 
tbl_request_ride AS trr ON rr.RequestID = trr.Request_id 
JOIN 
vehicle ON rr.vehicle_id = vehicle.id
JOIN 
driver ON vehicle.driver_id = driver.id
LEFT JOIN 
tbl_booked ON rr.interestID = tbl_booked.InterestID 
WHERE 
trr.passengerId = ".$_SESSION["id"]." AND 
(tbl_booked.RideStatus IS NULL OR tbl_booked.RideStatus NOT IN ('Ride Completed', 'Ride Booked','Ride Cancelled'));
";
$result=mysqli_query($conn,$query);
// echo $query;
?>