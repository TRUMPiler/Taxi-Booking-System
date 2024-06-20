<?php 
include "checkvehicle.php";
if($_POST["vehiclenumber"]!="")
{
    $_SESSION["company"]=$_POST["company"];
    $_SESSION["vehiclenumber"]=$_POST["vehiclenumber"];
    $_SESSION["model"]=$_POST["model"];
    $_SESSION["mileage"]=$_POST["mileage"];
    $_SESSION["Fuel-type"]=$_POST["Fuel-type"];
    $_SESSION["PassCapacity"]=$_POST["PassCapacity"];
    $targetDir = "../images/";
    $fileName = basename($_FILES["vehiclepermit"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    if(!empty($_FILES["vehiclepermit"]["name"])){
                                
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes))
    {
                                                         
        // Upload file to server
        if(move_uploaded_file($_FILES["vehiclepermit"]["tmp_name"], $targetFilePath))
        {
                                       
            // Insert image file name into database
            $_SESSION["vehiclepermit"]=$fileName;
            $fileName1 = basename($_FILES["vehicleinsurance"]["name"]);
    $targetFilePath = $targetDir . $fileName1;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    if(!empty($_FILES["vehicleinsurance"]["name"])){
                                
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes))
    {
                                                         
        // Upload file to server
        if(move_uploaded_file($_FILES["vehicleinsurance"]["tmp_name"], $targetFilePath))
        {
                                       
            // Insert image file name into database
            $_SESSION["vehicleinsurance"]=$fileName1;
            echo "true";  
        }
    }
    else
    {
        echo 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
        exit();
    }
    }  
        }
    }
    else
    {
        echo 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
        exit() ;
    }
    }
    
    
    
}
?>