<?php 
session_start();
include "../connection.php";
echo $_SESSION["booked_id"];
$transcation=date('Y').random_int(1000,9999);
$query="insert into tbl_payment(`Transactionid`, `BookedID`) values(".$transcation.",".$_SESSION["booked_id"].")";
$result=mysqli_query($conn,$query);
if($result>0)
{
    $query="update tbl_booked set RideStatus='Payment Done' where Booked_ID=".$_SESSION["booked_id"]."";
$results=mysqli_query($conn,$query);
if($results>0)
{
    echo "<script>window.location='../index'</script>";
}
else
{
    echo "false";
}
}
else
{
    echo "false";
}

?>