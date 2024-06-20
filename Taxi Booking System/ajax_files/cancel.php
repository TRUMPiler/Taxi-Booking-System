<?php 
include "../connection.php";
$driveremail="";
$passemail= "";
$passname= "";
$drivername=""; 
$query="update tbl_booked set RideStatus='Ride Cancelled' where Booked_ID=".$_POST["booked_id"]."";
$result=mysqli_query($conn,$query);
if($result> 0){

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
where tbl_booked.Booked_id=".$_POST["booked_id"]."";
$result=mysqli_query($conn,$query);
if($result->num_rows > 0)
{
    while($row=$result->fetch_array())
    {
        $driveremail=$row["driveremail"];
        $driveremail=$row["driveremail"];
        $passemail=$row["passemail"];
        $passname=$row["passengerfName"]." ".$row["passengerlname"];
        $drivername=$row["driverfname"]." ".$row["driverlname"];
    }
    $to_email = $driveremail;
$subject = "Ride Cancelled❌";
$body = "
Message from the TAXI MANAGEMENT SYSTEM\n
hello $$drivername This email is sent for letting you know that\n
Your ride with $passname is cancelled\n
";
$headers = "From: dashtaxigg@gmail.com";
if (mail($to_email, $subject, $body, $headers))
{
    echo "true";
}

}
else
{
    echo "false";
}
}
?>