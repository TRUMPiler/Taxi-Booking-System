<?php 
 
include "../connection.php";
$query="update tbl_booked set RideStatus='Ride Ended' where Booked_ID=".$_POST["booked_id"]."";
// echo $query;
$result=mysqli_query($conn,$query);
if($result>0)
{
    echo "true";
}
else
{
    echo "false";
}

?>