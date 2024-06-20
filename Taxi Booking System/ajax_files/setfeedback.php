<?php 
session_start();
include "checkfeedback.php"; 
$query="insert into tbl_feedback(description,booked_id) values('".$_POST["description"]."',".$_POST["booked_id"].")";
$result=mysqli_query($conn,$query);
if($result)
{
    
    echo "true";
}
else
{
    echo "error occured";
}
?>