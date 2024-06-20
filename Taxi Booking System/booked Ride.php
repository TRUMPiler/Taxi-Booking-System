<?php 
session_start();
include "ajax_files/autodeleterr.php";
if (!isset($_SESSION["role"])) 
{
    echo "<script>alert('You need to login before accessing this page')</script>";
    echo "<script>window.location='login'</script>";
}
else 
{
    if ($_SESSION["role"] != "passenger") {
        echo "<script>alert('ERROR 404:Forbidden Access(You\'re access is not ideal for using this page)')</script>";
        echo "<script>window.location='index'</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booked Ride</title>
    <link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.1/mapsjs-ui.css" />
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-core.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-service.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-ui.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-mapevents.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    
    <script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.jqueryui.min.js"></script>
    <style>
        #map {
            position: relative;
            top: 20px;
            height: 567px;
        }

        .form-control,
        .form-select {
            border: 1px solid black;
        }

        .split {
            height: 100%;
            width: 50%;
            position: fixed;
            z-index: 1;
            top: 65px;
            overflow-x: hidden;
            padding-top: 20px;
        }

        /* Control the left side */
        .left {
            left: 0;
            background-color: white;
        }

        /* Control the right side */
        .right {
            right: 0;
            /* background-color: red; */
        }

        .centered {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        h1 {
            color: rgb(255, 174, 0);
        }
        .source-icon {
    width: 24px;
    height: 24px;
    background-color: blue;
    border-radius: 50%;
  }

  .destination-icon {
    width: 24px;
    height: 24px;
    background-color: red;
    border-radius: 50%;
  }
    </style>
</head>

<body>

    <?php
    include "connection.php";
    $query="SELECT source_city.City_name AS source_city_name , destination_city.City_name AS destination_city_name , rr.SourceAddress, rr.DestinationAddress , passenger.fname As passengername , rr.From,rr.To, tbl_booked.RideStatus , tbl_booked.Booked_ID , (rr.From-CURRENT_TIMESTAMP)-10000 As totime FROM tbl_booked Join tbl_request_ride as rr JOIN tbl_city AS source_city ON rr.SourceCity = source_city.CityID JOIN tbl_city AS destination_city ON rr.DestinationCity = destination_city.CityID JOIN tbl_interest JOIN passenger JOIN vehicle where rr.passengerId=".$_SESSION["id"]." and tbl_interest.RequestID=rr.Request_id and tbl_interest.interestID=tbl_booked.InterestID and vehicle.id=tbl_interest.vehicle_id and passenger.id=rr.passengerId and Not tbl_booked.RideStatus in ('Ride Completed','Ride Cancelled') limit 1;
"; 
    $result=mysqli_query($conn,$query);
    if($result->num_rows > 0)   
    {
        include "View Booked Ride.php";
    }
    else
    {
        include "Response.php";
    }
    
    ?>
</body>
</html>