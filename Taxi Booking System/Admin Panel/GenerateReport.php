<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js" integrity="sha512-pdCVFUWsxl1A4g0uV6fyJ3nrnTGeWnZN2Tl/56j45UvZ1OMdm9CIbctuIHj+yBIRTUUyv6I9+OivXj4i0LPEYA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Generate Report</title>
    <style>
        .table-rounded {
            border-radius: 10px;
            overflow: hidden;
        }
        h5,th{
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>

<body>
    <div id="aj">
    <?php

    require('assets/mpdf/vendor/autoload.php');
    include "../connection.php";
    
    $query = "SELECT `id`, `fname`, `mname`, `lname`, `password`, `dob`, `gender`, `contact`, `address`, tbl_city.City_Name, `email`, `image`, `account_creation` from `passenger` join tbl_city on tbl_city.CityID=passenger.CityGG where account_creation>=CURRENT_TIMESTAMP-1000000 and account_creation<=CURRENT_TIMESTAMP();";
    $result = mysqli_query($conn, $query);
    if ($result->num_rows > 0) { 
    ?>
    <div class="container">
        <h5>New Passengers Registered: </h5>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-rounded">
                        <thead style="background-color: rgb(255, 174, 0);">
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Last Name</th>
                                <th>Password</th>
                                <th>Date of Birth</th>
                                <th>Gender</th>
                                <th>Contact</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>Email</th>
                                <th>Image</th>
                                <th>Account Creation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $result->fetch_assoc()) { 
                            ?>
                            <tr>
                                <td><?php echo $row["id"]; 
                                    ?></td>
                                <td><?php echo $row["fname"]; 
                                    ?></td>
                                <td><?php echo $row["mname"]; 
                                    ?></td>
                                <td><?php echo $row["lname"]; 
                                    ?></td>
                                <td><?php echo $row["password"]; 
                                    ?></td>
                                <td><?php echo $row["dob"]; 
                                    ?></td>
                                <td><?php echo $row["gender"]; 
                                    ?></td>
                                <td><?php echo $row["contact"]; 
                                    ?></td>
                                <td><?php echo $row["address"]; 
                                    ?></td>
                                <td><?php echo $row["City_Name"]; 
                                    ?></td>
                                <td><?php echo $row["email"]; 
                                    ?></td>
                                <td><img src="../Images/<?php echo $row['image']; 
                                                        ?>" style="width:100px"></td>
                                <td><?php echo $row["account_creation"]; 
                                    ?></td>
                            </tr>
                            <?php } 
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php
        } else { 
        ?>
        <h5>No new passenger registered today</h5>
        <?php }
        $query = "SELECT `id`, `fname`, `mname`, `lname`, `password`, `dob`, `gender`, `contact`, `address`, tbl_city.City_Name, `email`, `image`, `account_creation` from `driver` join tbl_city on tbl_city.CityID=driver.CityGG where account_creation>=CURRENT_TIMESTAMP-1000000 and account_creation<=CURRENT_TIMESTAMP();";
        $driverResult = mysqli_query($conn, $query);

        if ($driverResult->num_rows > 0) {
        $driverIds = []; 
        ?>

        <h5>New Drivers Registered(in the Last 24 Hours):</h5>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-rounded">
                        <thead style="background-color: rgb(255, 174, 0);">
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Last Name</th>
                                <th>Password</th>
                                <th>Date of Birth</th>
                                <th>Gender</th>
                                <th>Contact</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>Email</th>
                                <th>Image</th>
                                <th>Account Creation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                             while ($driverRow = $driverResult->fetch_assoc()) {
                            $driverIds[] = $driverRow["id"]; 
                            ?>

                            <!-- // Generate HTML rows for driver details -->
                            <tr>
                                <td><?php echo "". $driverRow['id'] ."";
                                    ?></td>
                                <td><?php echo "".  $driverRow["fname"] ."";
                                    ?></td>
                                <td><?php echo "". $driverRow["mname"] ."";
                                    ?></td>
                                <td><?php echo "". $driverRow["lname"] ."";
                                    ?></td>
                                <td><?php echo "". $driverRow["password"] ."";
                                    ?></td>
                                <td><?php echo "". $driverRow["dob"] ."";
                                    ?></td>
                                <td><?php echo "". $driverRow["gender"] ."";
                                    ?></td>
                                <td><?php echo "". $driverRow["contact"] ."";
                                    ?></td>
                                <td><?php echo "". $driverRow["address"] ."";
                                    ?></td>
                                <td><?php echo "". $driverRow["City_Name"] ."";
                                    ?></td>
                                <td><?php echo "". $driverRow["email"] ."";
                                    ?></td>
                                <td><img src="../Images/<?php echo $driverRow['image']
                                                        ?>" style="width:100px"></td>
                                <td><?php echo "". $driverRow["account_creation"]  ."";
                                    ?></td>
                            </tr>
                            <?php    } 
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- // Display vehicle information for each driver -->
        <?php foreach ($driverIds as $driverId) {
         $vehicleQuery = "SELECT `id`, `company_name`, `model`, `vehicle-number`, `vehiclepermit`, `vehicleinsurance`, `driver_id` FROM `vehicle` WHERE driver_id = $driverId;";

         $vehicleResult = mysqli_query($conn, $vehicleQuery);

        if ($vehicleResult->num_rows > 0) { 
        ?>
        <!-- // Generate HTML for displaying vehicle details -->
        <h5>Vehicle Information for Driver ID $driverId</h5><br>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-rounded">
                        <thead style="background-color: rgb(255, 174, 0);">
                            <tr>
                                <th>ID</th>
                                <th>Company Name</th>
                                <th>Model</th>
                                <th>Vehicle Permit</th>
                                <th>Vehicle Insurance</th>
                                <th>Driver ID</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php while ($vehicleRow = $vehicleResult->fetch_assoc()) { 
                            ?>
                            <!-- // Generate HTML rows for vehicle details -->
                            <tr>
                                <td><?php echo "" . $vehicleRow["id"] ."";
                                    ?></td>
                                <td><?php echo "" . $vehicleRow["company_name"] ."";
                                    ?></td>
                                <td><?php echo "" . $vehicleRow["model"] ."";
                                    ?></td>
                                <td><img src="../Images/<?php echo $vehicleRow['vehiclepermit']; ?>" style="width:150px"></td>
                                <td><img src="../Images/<?php echo $vehicleRow['vehicleinsurance'];?>" style="width:150px"></td>
                                <td><?php echo "" . $vehicleRow["driver_id"]  ."";
                                    ?></td>
                            </tr>
                            <?php  } 
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php }
         }
        } else { 
        ?>
        <h5>No new Driver Registered in the Last 24 Hours</h5>
        <?php }
        $query = "Select `interestID`, `RequestID`, `vehicle_id`, `Cost`, `date_of_request` FROM `tbl_interest`WHERE date_of_request>=CURRENT_TIMESTAMP-1000000 and date_of_request<=CURRENT_TIMESTAMP();";
        $result = mysqli_query($conn, $query);
        if ($result->num_rows > 0) { 
        ?>
        <h5>New interest Registered today</h5><br>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-rounded">
                        <thead style="background-color: rgb(255, 174, 0);">
                            <tr>
                                <th>Interest ID</th>
                                <th>Request ID</th>
                                <th>Driver ID</th>
                                <th>Cost</th>
                                <th>Date of Request</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $result->fetch_assoc()) { 
                            ?>
                            <tr>
                                <td><?php echo "". $row["interestID"] . ""; ?></td>
                                <td><?php echo "". $row["RequestID"] .  ""; ?></td>
                                <td><?php echo "". $row["vehicle_id"] . ""; ?></td>
                                <td><?php echo "". $row["Cost"] . ""; ?></td>
                                <td><?php echo "". $row["date_of_request"] . ""; ?></td>
                            </tr>
                            <?php   } 
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php } else { 
        ?>
        <h5>No new interest registered today</h5>
        <?php }
        $query = "SELECT `Booked_ID`, `InterestID`, `RideStatus` FROM `tbl_booked`";
        $result = mysqli_query($conn, $query);
        if ($result->num_rows > 0) { 
        ?>
        <h5>ALL Booked Ride updates</h5><br>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-rounded">
                        <thead style="background-color: rgb(255, 174, 0);">
                            <tr>
                                <th>Booked ID</th>
                                <th>Interest ID</th>
                                <th>Ride Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  while ($row = $result->fetch_assoc()) { 
                            ?>
                            <tr>
                                <td><?php echo "". $row["Booked_ID"] . ""; ?></td>
                                <td><?php echo "". $row["InterestID"] . ""; ?></td>
                                <td><?php echo "". $row["RideStatus"] . "";?></td>
                            </tr>
                            <?php   } 
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php } else { 
        ?>
        <h5>no Booked Rides</h5>
        <?php }
        $query = "SELECT `feedbackid`, `date-of-feedback`, `description`, `booked_id` FROM `tbl_feedback` WHERE `date-of-feedback`>=CURRENT_TIMESTAMP-1000000 and `date-of-feedback`<=CURRENT_TIMESTAMP();";
        $result = mysqli_query($conn, $query);
        if ($result->num_rows > 0) { 
        ?>
        <h5>Feedbacks Given Today</h5><br>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-rounded">
                        <thead style="background-color: rgb(255, 174, 0);">
                            <tr>
                                <th>Feeback ID</th>
                                <th>Feedback Given</th>
                                <th>Feedback Description</th>
                                <th>Booked ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $result->fetch_assoc()) { 
                            ?>
                            <tr>
                                <td><?php echo "" . $row["feedbackid"] . ""; ?></td>
                                <td><?php echo "" . $row["feedbackid"] . ""; ?></td>
                                <td><?php echo"" .$row["description"] . ""; ?></td>
                                <td><?php echo "" . $row["booked_id"] . ""; ?></td>
                            </tr>
                            <?php    } 
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php } else { 
        ?>
        <h5>no Feedback given yet</h5>
        <?php }

        
        $query = "SELECT `Payment_ID`, `Transactionid`, `BookedID`, `date` FROM `tbl_payment` WHERE `date`>=CURRENT_TIMESTAMP-1000000 and `date`<=CURRENT_TIMESTAMP();";
        $result = mysqli_query($conn, $query);
        if ($result->num_rows > 0) { 
        ?>
        <h5>Feedbacks Given Today</h5>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-rounded">
                        <thead style="background-color: rgb(255, 174, 0);">
                            <tr>
                                <th>Payment ID</th>
                                <th>Transcation ID</th>
                                <th>Booked ID</th>
                                <th>Date of Transcation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $result->fetch_assoc()) { 
                            ?>
                            <tr>
                                <td><?php echo "". $row["Payment_ID"] . ""; ?></td>
                                <td><?php echo "". $row["Transactionid"] . ""; ?></td>
                                <td><?php echo "". $row["BookedID"] . ""; ?></td>
                                <td><?php echo "". $row["date"] . ""; ?></td>
                            </tr>
                            <?php    } 
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php  } else { 
        ?>
        <h5>No Payment done</h5>
        <?php }
        
        ?>
    </div>
    
    </div>
    <script>
        $(document).ready(function(){
            const row=document.querySelector("#aj");
            console.log(row);
            html2pdf().from(row).save();
            
            GG();
        });
        async function GG()
        {
            await new Promise((res) => setTimeout(() =>res("ps2"), 500));
            window.location="../Admin Panel/index.php";
            // window.close();
        }
    </script>
</body>
        
</html>