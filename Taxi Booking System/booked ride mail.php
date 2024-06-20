<?php 
session_start();
include "connection.php";
$driveremail="";
$passemail= "";
$passname= "";
$drivername=""; 
$query="select passenger.email As passemail,
driver.email as driveremail,
Booked_ID,
tbl_interest.interestID, 
passenger.fname as passengerfName, 
passenger.lname as passengerlname, 
driver.fname as driverfname,
driver.lname as driverlname 
FROM tbl_booked 
JOIN tbl_interest 
JOIN tbl_request_ride 
JOIN passenger 
JOIN driver 
JOIN vehicle
where tbl_request_ride.passengerId=".$_SESSION["id"]."
and tbl_interest.interestID=tbl_booked.InterestID 
and tbl_booked.InterestID=tbl_interest.interestID 
and vehicle.id=tbl_interest.vehicle_id
and driver.id=vehicle.driver_id 
and passenger.id=tbl_request_ride.passengerId;";
$result=mysqli_query($conn,$query);
if($result->num_rows > 0)
{
    while($row=$result->fetch_array())
    {
        $driveremail=$row["driveremail"];
        $passemail=$row["passemail"];
        $passname=$row["passengerfName"]." ".$row["passengerlname"];
        $drivername=$row["driverfname"]." ".$row["driverlname"];
    } 
}
else
{
    echo "issue";
}
$to_email = $passemail;
$subject = "Ride Booked✅";
$body = "
Message from the TAXI MANAGEMENT SYSTEM\n
hello $passname This email is sent for letting you know that\n
Your ride with $drivername is booked successfully\n
";
$headers = "From: dashtaxigg@gmail.com";

if (mail($to_email, $subject, $body, $headers)) {
    $to_email = $driveremail;
$subject = "Ride Confirmed✅";
$body = "
Message from the TAXI MANAGEMENT SYSTEM\n
hello $drivername This email is sent for letting you know that\n
You ride interest with $passname is accepted successfully\n
";
$headers = "From: dashtaxigg@gmail.com";

if (mail($to_email, $subject, $body, $headers)) {
echo "<script>alert('Booking Done')</script>";
echo "<script>window.location='index'</script>";    
} 
 
} 

?>
