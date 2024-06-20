<?php 
session_start();

include "ajax_files/checkrr.php";
include "connection.php";

// Fetch the driver
$driverQuery = "SELECT * FROM `driver` WHERE id=?";
$driverStmt = $conn->prepare($driverQuery);
$driverStmt->bind_param("i", $_SESSION["id"]);
$driverStmt->execute();
$driverResult = $driverStmt->get_result();

if ($driverResult->num_rows > 0 && $_SESSION["rrveri"] == true) {
    $driverRow = $driverResult->fetch_array();
    
    // Fetch vehicle using driver.id
    $vehicleQuery = "SELECT id FROM vehicle WHERE driver_id=?";
    $vehicleStmt = $conn->prepare($vehicleQuery);
    $vehicleStmt->bind_param("i", $driverRow["id"]);
    $vehicleStmt->execute();
    $vehicleResult = $vehicleStmt->get_result();
    if(!isset($_POST["cost_estimation"])){
        echo false;
        exit();
    }
    if ($vehicleResult->num_rows > 0) {
        $vehicleRow = $vehicleResult->fetch_assoc();
        
        // Insert into tbl_interest with the updated foreign key
        $insertQuery = "INSERT INTO tbl_interest(RequestID, vehicle_id, Cost, date_of_request) VALUES (?, ?, ?, CURRENT_TIMESTAMP)";
        $insertStmt = $conn->prepare($insertQuery);
    
        $insertStmt->bind_param("iis", $_SESSION["RequestID"], $vehicleRow["id"], $_POST["cost_estimation"]);
        
        if ($insertStmt->execute()) {
            echo true;
        } else {
            echo "Error: " . $insertStmt->error;
        }
        
        $insertStmt->close();
    } else {
        echo "Vehicle not found for driver_id = ".$driverRow["id"];
    }
    $vehicleStmt->close();
} else {
    echo "Driver not found or verification failed.";
}
$driverStmt->close();
?>
