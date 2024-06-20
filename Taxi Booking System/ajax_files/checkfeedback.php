<?php 

include "../connection.php"; 
$query="select * from tbl_feedback where booked_id=".$_POST["booked_id"]."";
$result=mysqli_query($conn,$query);
if($result->num_rows>0){
    echo "feedback exists";
    exit();
}
?>