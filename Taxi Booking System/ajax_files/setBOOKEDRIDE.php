<?php 
include "../connection.php";
session_start();
$query="insert into tbl_booked(InterestID,RideStatus) values(".$_POST["interestid"].",'Ride Booked')";
$result=mysqli_query($conn,$query);
if($result>0)
{
    $query="DELETE FROM tbl_interest WHERE NOT InterestID=".$_POST["interestid"]." and  RequestID=".$_POST["requestid"]."";
    $results=mysqli_query($conn,$query);
    if($results > 0)
    {
        echo "true";
    }
}
$booked_id=0;
$query="select Booked_ID from tbl_booked where InterestID='".$_POST["interestid"]."' limit 1";
$result=mysqli_query($conn,$query);
if($result->num_rows > 0)
{
    while($row=$result->fetch_array())
    {
        $booked_id= $row["Booked_ID"];
        $query= "select `From`,`To` from tbl_request_ride where Request_id=".$_POST["requestid"]."";
        $results=mysqli_query($conn,$query);
        if($results->num_rows>0)
        {
            while($rows=$results->fetch_array())
            {
                $query="insert into tbl_schdule(From_date,To_date,booked_ID,Driver_id) values('".$rows["From"]."','".$rows["To"]."',".$booked_id.",".$_POST["driverid"].")";
                $resultss=mysqli_query($conn,$query);
                if($resultss>0)
                {
                    echo "true";
                }
                else
                {
                    echo "false";
                }
            }
        }
    }
}
?>