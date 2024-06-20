<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Taxi Booking | Home</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>
    <!-- Favicons -->
    <link href="Images/Taxibooking.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <script src="assets/js/loader.js"></script>
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <style>
        #preloader {
            background: transparent url("images/loading.gif") no-repeat center;
            backdrop-filter: blur(10px);
            background-size: 13%;
            height: 100vh;
            width: 100%;
            position: fixed;
            z-index: 100;
        }

        .custom-button {
            background: white;
            /* White background */
            color: rgb(255, 174, 0);
            /* Text color */
            border: 2px solid rgb(255, 174, 0);
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }

        /* Button hover effect using Bootstrap classes */
        .custom-button:hover {
            background: rgb(255, 174, 0);
            /* Background color on hover */
            color: white;
            /* Text color on hover */
        }
    </style>
    <!-- =======================================================
  * Template Name: Ninestars
  * Updated: Jul 27 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <div id="preloader"></div>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <div class="logo">

                <h1 class="text-light"><a href="index.html"><span>Taxi Booking</span></a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="index">Home</a></li>
                    <!-- <li><a class="nav-link scrollto" href="#about">About Us</a></li> -->
                    <!-- <li><a class="nav-link scrollto" href="#services">Services</a></li> -->
                    <!-- <li><a class="nav-link scrollto" href="#portfolio">Portfolio</a></li> -->
                    <!-- <li><a class="nav-link scrollto" href="#team">Team</a></li> -->
                    <li class="dropdown"><a href="#"><span>Services</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="Request ride">Request Ride</a></li>
                            <!-- <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li> -->
                            <li><a href="booked Ride">Response</a></li>
                        </ul>
                    </li>
                    <!-- <li><a class="nav-link scrollto" href="#contact">Contact</a></li> -->
                    <!-- <li><a class="getstarted scrollto" href="login.php">Login</a></li> -->
                    <?php
                    if (isset($_SESSION["fname"])) {
                        if ($_SESSION["fname"] == "") {
                            echo "<li><a class='getstarted scrollto' href='login'>Login</a></li>";
                        } elseif (isset($_SESSION["filename"])) {
                            echo "<li><a  href='profile passenger'>" . "<img src='images/" . $_SESSION["filename"] . "' alt='" . $_SESSION["fname"] . "' style='border-radius:150%;'>" . "</a></li>";
                        } elseif (!isset($_SESSION["filename"]) && $_SESSION["fname"] != "") {
                            echo "<li><a class='getstarted scrollto' href='profile passenger'>" . $_SESSION["fname"] . "</a></li>";
                        }
                    } else {
                        echo "<li><a class='getstarted scrollto' href='login'>Login</a></li>";
                    }
                    ?>
                </ul>

                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header>
    <div>
        <div class="split left">
            <!-- <div class="centered"> -->
            <div id="map"></div>
            <script src="map1.js"></script>
            <!-- </div> -->
        </div><br><br>
        <?php
        while ($row = $result->fetch_assoc()) { ?>

            <div class="split right">
                <input type="text" id="address" class="form-control" value="<?php echo $row['SourceAddress']; ?>" hidden>
                <input type="text" id="daddress" class="form-control" value="<?php echo $row['DestinationAddress']; ?>" hidden>
                <input type="text" class="form-control" name="latitude" id="latitude" hidden>
                <h4>Source: <?php echo $row['SourceAddress']; ?></h4>
                <h4>Destination: <?php echo $row['DestinationAddress']; ?></h4><br>
                <input type="text" class="form-control" name="longitude" id="longitude" hidden>
                <input type="text" name="dlat" id="dlat" hidden>
                <input type="text" name="dlong" id="dlong" hidden>
                <h4 id="distance">Distance</h4>
                <h4 id="duration">Duration</h4>
                <?php
                if ($row["totime"] > 0) { 
                    ?>
                    <div class="row col-md-6">
                        <div class="input-group"><button id='cancel' onclick="cancell(<?php echo $row['Booked_ID']?>)" class='btn custom-button form-control'>Cancel</button></div>
                    </div>
               <?php }
                if ($row["RideStatus"] == "Ride Ended") {
                    // echo '<button id="make payemnt" onclick="MakePayment(' . $row["Booked_ID"] . ')">Make Payment</button>';
                ?> <div class='row col-md-6'>
                        <div class='input-group'><button id="make payemnt" onclick="MakePayment(<?php echo $row['Booked_ID']; ?>)" class='btn custom-button form-control'>Make Payment</button></div>
                    </div>

                <?php
                } else if ($row["RideStatus"] == "Payment Done") {
                ?> <div class='row col-md-6'>
                        <div class='input-group'><button id="Give" onclick="Give(<?php echo $row['Booked_ID']; ?>)" class='btn custom-button form-control'>Give Feedback</button></div>
                    </div>
            </div>
    <?php    } else {
                }
            }


    ?>
    </div>
    <script>
        $(document).ready(function() {
            overloading();

        })
        function cancell(id)
        {
            $.post("ajax_files/cancel.php",{booked_id:id},function(data)
                {
                    if(data=="true")
                    {
                        alert("Ride Cancelled Sucessfully");
                        window.location='index';
                    }
                    else
                    {
                        alert(data);
                    }
                })
        }
        function Give(id) {
            $.post("ajax_files/setBookedID.php", {
                booked_id: id
            }, function(data) {
                if (data == "true") {
                    window.location = 'feedback.php';
                } else {
                    alert(data);
                }
            })
        }

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

        function MakePayment(id) {
            $.post("ajax_files/setBookedID.php", {
                booked_id: id
            }, function(data) {
                if (data == "true") {
                    alert(data);
                    window.location = "MakePayment";
                }

            })
        }
    </script>
    <script>
        // loading();
        $(document).ready(function() {
            HH();
        })
        loading();
    </script>
</body>

</html>