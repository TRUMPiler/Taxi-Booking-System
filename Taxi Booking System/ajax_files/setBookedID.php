<?php 
session_start();
$_SESSION["booked_id"]=$_POST["booked_id"];
echo "true";
// echo $_SESSION["booked_id"];
?>