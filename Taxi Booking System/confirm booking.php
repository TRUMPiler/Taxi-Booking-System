<?php
session_start();
include "ajax_files/autodeleterr.php";

if (!isset($_SESSION["role"])) {
    echo "<script>alert('You need to login before accessing this page')</script>";
    echo "<script>window.location='login'</script>";
} else {
    if ($_SESSION["role"] != "driver") {
        echo "<script>alert('ERROR 404: Forbidden Access (Your access is not ideal for using this page)')</script>";
        echo "<script>window.location='index'</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Booking</title>
    <link href="images/Taxibooking.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- here location -->

    <link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.1/mapsjs-ui.css" />
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-core.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-service.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-ui.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-mapevents.js"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Vendor CSS Files -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <script src="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.js"></script>
    <link type="text/css" rel="stylesheet" href="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>
    <link href="assets/css/style.css" rel="stylesheet">
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
        .custom-button {
      background: white;
      color: rgb(255, 174, 0);
      border: 2px solid rgb(255, 174, 0);
      border-radius: 5px;
      padding: 10px 20px;
      cursor: pointer;
    }

    .custom-button:hover {
      background: rgb(255, 174, 0);
      color: white;
    }
    </style>
</head>

<body>
    <div class="container d-flex align-items-center justify-content-between">

        <div class="logo">

            <h1 class="text-light"><a href="index.html"><span>Taxi Booking</span></a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto " href="index">Home</a></li>

                <!-- <li><a class="nav-link scrollto" href="#services">Services</a></li> -->
                <!-- <li><a class="nav-link scrollto" href="#portfolio">Portfolio</a></li> -->
                <!-- <li><a class="nav-link scrollto" href="#team">Team</a></li> -->
                <li class="dropdown"><a class="nav-link scrollto active" href="#"><span>Services</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="view_requested">View Request Ride</a></li>
                        <!-- <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
    <ul>
      <li><a href="#">Deep Drop Down 1</a></li>
      <li><a href="#">Deep Drop Down 2</a></li>
      <li><a href="#">Deep Drop Down 3</a></li>
      <li><a href="#">Deep Drop Down 4</a></li>
      <li><a href="#">Deep Drop Down 5</a></li>
    </ul>
  </li> -->
                        <li><a href="confirm booking">Confirmed Bookings</a></li>
                    </ul>
                </li>
                <!-- <li><a class="nav-link scrollto" href="#contact">Contact</a></li> -->
                <?php
                if (isset($_SESSION["fname"])) {
                    if ($_SESSION["fname"] == "") {
                        echo "<li><a class='getstarted scrollto' href='login.php'>Login</a></li>";
                    } elseif ($_SESSION["filename"] != "") {
                        echo "<li><a  href='profile driver'>" . "<img src='images/" . $_SESSION["filename"] . "' alt='" . $_SESSION["fname"] . "' style='border-radius:200%'>" . "</a></li>";
                    } elseif ($_SESSION["filename"] == "" && $_SESSION["fname"] != "") {
                        echo "<li><a class='getstarted scrollto' href='profile driver'>" . $_SESSION["fname"] . "</a></li>";
                    }
                } else {
                    echo "<li><a class='getstarted scrollto' href='login.php'>Login</a></li>";
                }
                ?>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
    </header>
    <?php
    include "connection.php";
    $query = "select tbl_interest.interestID,tbl_booked.Booked_ID 
    FROM tbl_booked 
    JOIN tbl_interest 
    JOIN driver
    JOIN vehicle 
    where vehicle.driver_id=" . $_SESSION["id"] . "
    and tbl_interest.vehicle_id=vehicle.id
    and tbl_interest.interestID=tbl_booked.InterestID 
    and driver.id=vehicle.driver_id;";
    $result = mysqli_query($conn, $query);
    if ($result->num_rows == 0) { ?>
        <h1>No Ride Confirmed yet\n please wait for one of your request to be accepted</h1><?php
        exit();
    }
    ?>
    <?php
    $query = "SELECT
    source_city.City_name AS source_city_name,
    destination_city.City_name AS destination_city_name,
    tbl_request_ride.SourceAddress,
    tbl_request_ride.DestinationAddress,
    passenger.fname AS passengername,
    tbl_request_ride.From,
    tbl_request_ride.To,
    tbl_booked.RideStatus,
    tbl_booked.Booked_ID,
    (tbl_request_ride.To - CURRENT_TIMESTAMP) - 100000 AS totime
FROM
    tbl_booked
JOIN
    tbl_interest ON tbl_interest.interestID = tbl_booked.InterestID
JOIN
    tbl_request_ride ON tbl_request_ride.Request_id = tbl_interest.RequestID
JOIN
    passenger ON passenger.id = tbl_request_ride.passengerId
JOIN
    tbl_city AS source_city ON source_city.CityID = tbl_request_ride.SourceCity
JOIN
    tbl_city AS destination_city ON destination_city.CityID = tbl_request_ride.DestinationCity
JOIN
vehicle on vehicle.id=tbl_interest.vehicle_id
JOIN
    driver ON driver.id =vehicle.driver_id
WHERE
    NOT tbl_booked.RideStatus IN ('Ride Completed', 'Ride Cancelled')
    AND vehicle.driver_id=" . $_SESSION["id"] . "
    AND tbl_interest.vehicle_id =vehicle.id 
    AND tbl_request_ride.To > CURRENT_TIMESTAMP
ORDER BY ABS(TIMESTAMPDIFF(SECOND, tbl_request_ride.To, CURRENT_TIMESTAMP))
LIMIT 1;";  
    $results = mysqli_query($conn, $query);
    date_default_timezone_set('Asia/Calcutta');
    if ($results->num_rows > 0) {
        while ($row = $results->fetch_array()) {

            echo '<div class="split right"><input type="text" id="address" class="form-control" value="' . $row["SourceAddress"] . '" hidden>';
            echo '<input type="text" id="daddress" class="form-control" value="' . $row["DestinationAddress"] . '" hidden>';
            echo '<input type="text" class="form-control" name="latitude" id="latitude" hidden>
                <h4>Source: ' . $row["SourceAddress"] . '</h4>
                <h4>Destination: ' . $row["DestinationAddress"] . '</h4><br>
                <input type="text" class="form-control" name="longitude" id="longitude" hidden>';
            echo '<input type="text" name="dlat" id="dlat" hidden>
                <input type="text" name="dlong" id="dlong" hidden>
                <h4 id="distance">Distance</h4>
                <h4 id="duration">Duration</h4>
                ';

            if (date('Y-m-d H:i:s') >= $row["From"] && date('Y-m-d H:i:s') <= $row["To"] && $row["RideStatus"] == "Ride Booked") {
            ?> <div class='input-group col-md-6'><button type='submit' onclick="RideStart(<?php echo $row['Booked_ID']; ?>)" class='btn custom-button form-control'>Start Ride</button></div>";
            <?php } else if ($row["RideStatus"] == "Ride Started" && (date('Y-m-d H:i:s') >= $row["To"] || $row["totime"] < 0)) {
             ?>   <div class='row col-md-6'><div class='input-group'><button name='Ride Start' onclick="RideEnd(<?php echo $row['Booked_ID']; ?>)" class='btn custom-button form-control'>End Ride</button></div></div>
            <?php } else if ($row["RideStatus"] == "Ride Ended") {
                echo "<h4>This ride has ended successully</h4>";
            } else {
                echo "Current Time is ".date('Y-m-d H:i:s') . "<br>Your Ride Starts at " . $row["From"] . "</div>";
            }
            echo '<div class="split left">
            <!-- <div class="centered"> -->
            <div id="map"></div>
            <script src="map1.js"></script>
            <!-- </div> -->
        </div><br><br>';
        }
    } else {
        echo "No Ride has been Confirmed yet";
    }
    ?>
    <script>
        $(document).ready(function() {
            overloading();
        })

        function overloading() {


            var address = document.querySelector("#address").value;
            console.log(address);
            const settingss = {

                async: true,
                crossDomain: true,
                url: 'https://trueway-geocoding.p.rapidapi.com/Geocode?address=' + address + '&language=en',
                method: 'GET',
                headers: {
                    'X-RapidAPI-Key': '39bebf8c65msh3c5431b6e89763ap1093ddjsn2d7d1e854615',
                    'X-RapidAPI-Host': 'trueway-geocoding.p.rapidapi.com'
                }
            };

            $.ajax(settingss).done(function(response) {
                console.log(response);
                if (response.results[0].country == "India" && response.results[0].region != "Andaman and Nicobar Islands") {
                    var lat = response.results[0].location.lat;
                    var long = response.results[0].location.lng;
                    console.log(lat);
                    document.querySelector("#latitude").value = lat;
                    document.querySelector("#longitude").value = long;
                } else {
                    alert("please enter a place which is india");
                }

            });


            var daddress = document.querySelector("#daddress").value;
            console.log(daddress);
            const settings = {

                async: true,
                crossDomain: true,
                url: 'https://trueway-geocoding.p.rapidapi.com/Geocode?address=' + daddress + '&language=en',
                method: 'GET',
                headers: {
                    'X-RapidAPI-Key': '39bebf8c65msh3c5431b6e89763ap1093ddjsn2d7d1e854615',
                    'X-RapidAPI-Host': 'trueway-geocoding.p.rapidapi.com'
                }
            };

            $.ajax(settings).done(function(responses) {
                console.log(responses);
                if (responses.results[0].country == "India" && responses.results[0].region != "Andaman and Nicobar Islands") {
                    var city = responses.results[0].locality;

                    // var dropdown=document.getElementById("dcity");
                    // for(var i=0;i<dropdown.options.length;i++)
                    // {
                    //     if(dropdown.options[i].text===city)
                    //     {
                    //         dropdown.options[i].selected=true;
                    //         break;
                    //     }
                    // }
                    var dlat = responses.results[0].location.lat;
                    var dlong = responses.results[0].location.lng;
                    // console.log(responses);
                    document.querySelector("#dlat").value = dlat;
                    document.querySelector("#dlong").value = dlong;
                    overloadings();

                } else {
                    alert("please enter a place which is india or can be travelled in mainland india");
                }

            });
            console.log("called map");

        }

        async function overloadings() {
            try {
                await new Promise(r => setTimeout(r, 2000));
                var lat = document.querySelector("#latitude").value;
                var long = document.querySelector("#longitude").value;
                var dlat = document.querySelector("#dlat").value;
                var dlong = document.querySelector("#dlong").value;
                GG(lat, long, dlat, dlong);
            } finally {
                calculate();
            }

        }

        function calculate() {

            const settings = {
                async: true,
                crossDomain: true,
                url: 'https://trueway-matrix.p.rapidapi.com/CalculateDrivingMatrix?origins=' + document.querySelector("#latitude").value + '%2C' + document.querySelector("#longitude").value + '&destinations=' + document.querySelector("#dlat").value + '%2C' + document.querySelector("#dlong").value + '',
                method: 'GET',
                headers: {
                    'X-RapidAPI-Key': '39bebf8c65msh3c5431b6e89763ap1093ddjsn2d7d1e854615',
                    'X-RapidAPI-Host': 'trueway-matrix.p.rapidapi.com'
                }
            };

            $.ajax(settings).done(function(response) {
                console.log(response);
                var dis = response.distances[0];
                var dur = response.durations[0];
                $("#duration").html("Estimated Duration of the ride " + secondsToHms(dur));
                $("#distance").html("Estimated Distance of the ride " + dis / 1000 + "km");
                console.log("i was called");
            });
        }

        function secondsToHms(d) {
            d = Number(d);
            var h = Math.floor(d / 3600);
            var m = Math.floor(d % 3600 / 60);
            var s = Math.floor(d % 3600 % 60);
            var hDisplay = h > 0 ? h + (h == 1 ? " hour, " : " hours, ") : "";
            var mDisplay = m > 0 ? m + (m == 1 ? " minute, " : " minutes, ") : "";
            var sDisplay = s > 0 ? s + (s == 1 ? " second" : " seconds") : "";
            return hDisplay + mDisplay + sDisplay;
        }

        function RideStart(id) {
            $.post("ajax_files/startride.php", {
                    booked_id: id
                },
                function(data) {
                    if (data == "true") {
                        alert('Ride Started Successfully');
                        window.location = 'confirm booking';
                    } else {
                        alert('Ride could\'nt be started due to an error');
                    }
                }
            );
        }

        function RideEnd(id) {
            $.post("ajax_files/endride.php", {
                    booked_id: id
                },
                function(data) {
                    if (data == "true") {
                        alert('Ride Ended Successfully');
                        window.location = 'confirm booking';
                    } else {
                        alert('Ride could\'nt be started due to an error');
                    }
                }
            );
        }
    </script>
</body>

</html>