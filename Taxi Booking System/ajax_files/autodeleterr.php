<?php 
include "connection.php";
$query="select requestCreation,Request_id from tbl_request_ride JOIN tbl_booked where requestCreation<= CURRENT_TIMESTAMP-1000000;";

$result=mysqli_query($conn,$query);
if($result->num_rows>0)
{
    while($row=$result->fetch_array())
    {
        $query="select tbl_request_ride.Request_id From tbl_request_ride JOIN tbl_interest JOIN tbl_booked WHERE tbl_request_ride.Request_id=".$row["Request_id"]." and tbl_interest.RequestID=tbl_request_ride.Request_id and tbl_booked.InterestID=tbl_booked.InterestID";
        $resultsss=mysqli_query($conn,$query);
        if($resultsss->num_rows> 0)
        {

        }
        else
        {
            $query="delete from tbl_interest where RequestID=".$row["Request_id"]."";
        $results=mysqli_query($conn,$query);
      
        $query="delete from tbl_request_ride where Request_id=".$row["Request_id"]."";
        $resultss=mysqli_query($conn,$query);
        }
        
        
        
    }
}
?>