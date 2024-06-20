<?php 
// session_start();
include "checkmail1.php";
$_SESSION["email2"]=$_POST["email"];
$_SESSION["fname"]=$_POST["fname"];
$_SESSION["mname"]=$_POST["mname"];
$_SESSION["lname"]=$_POST["lname"];
$_SESSION["contact"]=$_POST["contact"];
$_SESSION["address"]=$_POST["address"];
$_SESSION["dob"]=$_POST["dob"];
$_SESSION["gender"]=$_POST["gender"];
echo "true";
?>