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
rr.Request_id, 
rr.SourceAddress, 
rr.DestinationAddress, 
rr.From, 
rr.To, 
passenger.fname AS passengername, 
source_city.City_name AS source_city_name, 
destination_city.City_name AS destination_city_name, 
rr.PassCount 
FROM 
tbl_request_ride AS rr 
JOIN 
tbl_city AS source_city ON rr.SourceCity = source_city.CityID 
JOIN 
tbl_city AS destination_city ON rr.DestinationCity = destination_city.CityID 
JOIN 
passenger ON rr.passengerId = passenger.id 
LEFT JOIN 
tbl_interest ON tbl_interest.RequestID = rr.Request_id 
LEFT JOIN 
tbl_booked ON tbl_booked.InterestID = tbl_interest.InterestID 
LEFT JOIN 
vehicle ON tbl_interest.vehicle_id = vehicle.id  -- Updated foreign key to vehicle.id
WHERE 
rr.SourceCity = ".$_SESSION["city"]." AND (tbl_interest.RequestID IS NULL OR tbl_booked.InterestID IS NULL);

";
$result=mysqli_query($conn,$query);

?>
