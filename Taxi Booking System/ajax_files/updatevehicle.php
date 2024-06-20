<?php 
include "checkvehicle1.php";


    $query="update vehicle set company_name='".$_POST["company"]."',model='".$_POST["vname"]."',`vehicle-number`='".$_POST["platenumber"]."'";
    $result=mysqli_query($conn,$query);
    if($result>0)
    {
    //     $query="update vehicle set company_name='".$_POST["company_name"]."',model='".$_POST["model"]."',vehicle-number='".$_POST["vehicle-number"]."' where driver_id=".$_SESSION["id"]."";
    // $results=mysqli_query($conn,$query);
    //     if($results>0)
        // {
            echo "true";
        // }
    }
    else
    {
        echo "false";
    }


?>
