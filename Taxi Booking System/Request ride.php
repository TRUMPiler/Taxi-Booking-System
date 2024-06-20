<?php

session_start();
if (!isset($_SESSION["role"])) {
    echo "<script>alert('You need to login before accessing this page')</script>";
    echo "<script>window.location='login'</script>";
} else {
    if ($_SESSION["role"] != "passenger") {
        echo "<script>alert('ERROR 404:Forbidden Access(You\'re access is not ideal for using this page)')</script>";
        echo "<script>window.location='index_driver'</script>";
    }
}
include "ajax_files/autodeleterr.php";
include "ajax_files/checkRequest.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Ride</title>
    <!-- Favicons -->
    <link href="Images/Taxibooking.png" rel="icon">
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js">
           <script type="text/javascript" src="assets/js/rr2.js"></script>
    </script>
    <link href="assets/css/style.css" rel="stylesheet">
    <style>
        .error span {
            color: red;

        }

        span.error {
            color: red;
            border-radius: 2px solid red;
        }

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

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <div class="logo">

                <h1 class="text-light"><a href="index"><span>Taxi Booking</span></a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto " href="index">Home</a></li>
                    <!-- <li><a class="nav-link scrollto" href="#about">About Us</a></li> -->
                    <!-- <li><a class="nav-link scrollto" href="#services">Services</a></li> -->
                    <!-- <li><a class="nav-link scrollto" href="#portfolio">Portfolio</a></li> -->
                    <!-- <li><a class="nav-link scrollto" href="#team">Team</a></li> -->
                    <li class="dropdown"><a class="nav-link scrollto active" href="#"><span>Services</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a class="nav-link scrollto active" href="Request ride.php">Request Ride</a></li>
                            <!-- <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>-->
                <ul>
                  <li><a href="index">Home</a></li>
                  <li><a href="Request Ride">Request Ride</a></li>
                  
                </ul>
             <!-- </li> -->
                            <li><a href="booked Ride">Response</a></li>
                        </ul>
                    </li>
                    <!-- <li><a class="nav-link scrollto" href="#contact">Contact</a></li> -->
                    <?php
                    if (isset($_SESSION["fname"])) {
                        if ($_SESSION["fname"] == "") {
                            echo "<li><a class='getstarted scrollto' href='login.php'>Login</a></li>";
                        } elseif ($_SESSION["filename"] != "") {
                            echo "<li><a  href='profile passenger'>" . "<img src='images/" . $_SESSION["filename"] . "' alt='" . $_SESSION["fname"] . "' style='border-radius:200%'>" . "</a></li>";
                        } elseif ($_SESSION["filename"] == "" && $_SESSION["fname"] != "") {
                            echo "<li><a class='getstarted scrollto' href='profile passenger'>" . $_SESSION["fname"] . "</a></li>";
                        }
                    } else {
                        echo "<li><a class='getstarted scrollto' href='login.php'>Login</a></li>";
                    }
                    ?>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->
    <div class="split left">
        <!-- <div class="centered"> -->
        <div id="map"></div>
        <script src="map.js"></script>
        <!-- </div> -->
    </div><br><br>
    <div class="split right">
        <div class="container">
            <h1>Request Ride</h1>
            <hr>
            <form class="myForm">
                <div class="form-group">
                    <label for="First name">Source Location:</label>
                    <input type="test" class="form-control" value="<?php echo $_SESSION["address"] ?>" id="address" name="source_address" placeholder="Enter from where you are going to travel" required>
                </div>
                <input type="text" name="latitude" id="" hidden>
                <input type="text" name="longitude" id="" hidden>
                <input type="text" name="latitudes" id="" hidden>
                <input type="text" name="longitudes" id="" hidden>
                <div class="form-group">
                    <label for="Last name">Destination Location:</label>
                    <input type="text" class="form-control" id="daddress" name="daddress" placeholder="Enter where do you wish to reach" onchange=overloading() required>
                </div>
                <input type="text" name="dlat" id="" hidden>
                <input type="text" name="dlong" id="" hidden>
                <div class="row">
                    <div class="form-group col-lg-3">
                        <label for="Email">From Date:</label>
                        <input type="datetime-local" class="form-control" name="from-dt" id="frmDate" placeholder="Enter your email" required>
                        <span class="error" id="frmDate_err"></span>
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="Password">To Date:</label>
                        <input type="datetime-local" class="form-control" name="to-dt" id="toDate" placeholder="Enter password" readonly>
                        <span class="error" id="frmDate_err"></span>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="Number of passengers">No. of passengers:</label>
                        <input type="number" class="form-control" name="noofpassengers" id="noofpassengers" placeholder="Enter number of passengers..." value=1 required>
                        <span class="error" id="pnum_err"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="Source">Source:</label>

                        <?php
                        $connect = mysqli_connect("localhost", "root", "", "cms");
                        $sql = "SELECT CityGG,tbl_city.City_Name FROM `passenger` Left JOIN tbl_city ON passenger.CityGG=tbl_city.CityID where fname='naishal' LIMIT 1;";
                        $result = mysqli_query($connect, $sql);
                        if (mysqli_num_rows($result) > 0) {

                            echo '<select name="city" class="form-select" required>';

                            $num_results = mysqli_num_rows($result);
                            for ($i = 0; $i < $num_results; $i++) {
                                $row = mysqli_fetch_array($result);
                                $name = $row['City_Name'];
                                echo "<option value=" . $row["CityGG"] . ">" . $name . "</option>";
                                //echo '<option value="' . $name . '">' . $name . '</option>';
                            }
                            $connect = mysqli_connect("localhost", "root", "", "cms");
                            $sql = "SELECT CityID,City_Name FROM tbl_city where stateid=12";
                            $result = mysqli_query($connect, $sql);
                            if (mysqli_num_rows($result) > 0) {



                                $num_results = mysqli_num_rows($result);
                                for ($i = 0; $i < $num_results; $i++) {
                                    $row = mysqli_fetch_array($result);
                                    $name = $row['City_Name'];
                                    echo "<option value=" . $row["CityID"] . ">" . $name . "</option>";
                                    //echo '<option value="' . $name . '">' . $name . '</option>';
                                }
                                echo '</select>';
                                $connect->close();
                            }
                        }
                        ?>
                    </div>
                    <div class="form-group col-lg-6">


                        <label for="Destination">Destination</label>
                        <?php
                        $connect = mysqli_connect("localhost", "root", "", "cms");
                        $sql = "SELECT CityID,City_Name FROM tbl_city";
                        $result = mysqli_query($connect, $sql);
                        if (mysqli_num_rows($result) > 0) {

                            echo '<select name="dcity" id="dcity" class="form-select" required>';
                            echo '<option value="">--Select City--</option>';
                            $num_results = mysqli_num_rows($result);
                            for ($i = 0; $i < $num_results; $i++) {
                                $row = mysqli_fetch_array($result);
                                $name = $row['City_Name'];
                                echo "<option value=" . $row["CityID"] . ">" . $name . "</option>";
                                //echo '<option value="' . $name . '">' . $name . '</option>';
                            }
                            echo '</select>';
                        }

                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="Distance">Distance:</label>
                        <input type="text" class="form-control" name="distance" id="dis" readonly>
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="Duration">Duration:</label>
                        <input type="text" class="form-control" name="duration" id="dur" readonly>
                    </div><br>
                </div>
                <div class="row pt-2">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>

                <script>
                    $(document).ready(function() {
                        $("#address").change(function(){
                            if(document.querySelector("#address").value=="" || document.querySelector("#address").value==undefined)
                            {

                                alert("source address can't be empty");
                                document.querySelector("#address").value="";
                            }
                            else if(document.querySelector("#address").value.length<7)
                            {
                                alert("source address is too short");
                                document.querySelector("#address").value="";
                            }
                        })
                        $("#daddress").change(function(){
                            if(document.querySelector("#daddress").value=="" || document.querySelector("#daddress").value==undefined)
                            {
                                alert("Destination can't be empty");
                                document.querySelector("#daddress").value="";
                            }
                            else if(document.querySelector("#daddress").value.length<7)
                            {
                                alert("Destination address is too short");
                                document.querySelector("#daddress").value="";
                            }
                        })
                        var latitudes, longitudes;
                        navigator.geolocation.getCurrentPosition(position => {
                            const {
                                latitude,
                                longitude
                            } = position.coords;
                            latitudes = latitude;
                            longitudes = longitude;
                            document.querySelector(".myForm input[name='latitudes']").value = latitudes;
                            document.querySelector(".myForm input[name='longitudes']").value = longitudes;
                            $("#noofpassengers").on("change",function(){
                                if(document.querySelector("#noofpassengers").value>6){
                                    alert("Maximum passengers allowed are 6 or less");
                                    document.querySelector("#noofpassengers").value=undefined;
                                }
                            })
                        })

                    })

                    $("form").on("submit", function(event) {

                        event.preventDefault();
                        var formValues = $(this).serialize();
                        $.post(
                            "insertRR.php",
                            formValues,
                            function(data, status) {
                                if (data == "success") {
                                    alert("Request sent successfully!✅");
                                    window.location = "index";
                                }
                                else
                                {
                                    alert(data);
                                }
                            }
                        )
                    });

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
                            if (response.results[0].country == "India" && response.results[0].region != "Andaman and Nicobar Islands" && response.results[0].region == "Gujarat") {
                                var lat = response.results[0].location.lat;
                                var long = response.results[0].location.lng;
                                console.log(lat);
                                document.querySelector(".myForm input[name='latitude']").value = lat;
                                document.querySelector(".myForm input[name='longitude']").value = long;
                            } else {
                                alert("Source address should be a address of Gujarat,India.");
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

                                var dropdown = document.getElementById("dcity");
                                for (var i = 0; i < dropdown.options.length; i++) {
                                    if (dropdown.options[i].text === city) {
                                        dropdown.options[i].selected = true;
                                        break;
                                    }
                                }
                                var dlat = responses.results[0].location.lat;
                                var dlong = responses.results[0].location.lng;
                                console.log(responses);
                                document.querySelector(".myForm input[name='dlat']").value = dlat;
                                document.querySelector(".myForm input[name='dlong']").value = dlong;
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
                            var lat = document.querySelector(".myForm input[name='latitude']").value;
                            var long = document.querySelector(".myForm input[name='longitude']").value;
                            var dlat = document.querySelector(".myForm input[name='dlat']").value;
                            var dlong = document.querySelector(".myForm input[name='dlong']").value;
                            GG(lat, long, dlat, dlong);
                        } finally {
                            calculate();
                        }

                    }

                    function calculate() {

                        const settings = {
                            async: true,
                            crossDomain: true,
                            url: 'https://trueway-matrix.p.rapidapi.com/CalculateDrivingMatrix?origins=' + document.querySelector(".myForm input[name='latitude']").value + '%2C' + document.querySelector(".myForm input[name='longitude']").value + '&destinations=' + document.querySelector(".myForm input[name='dlat']").value + '%2C' + document.querySelector(".myForm input[name='dlong']").value + '',
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
                            if (dis / 1000 < 40) {
                                alert("minimum distance to travel with us is 40km");
                                document.querySelector("#daddress").value = "";
                                var dropdown = document.getElementById("dcity");
                                for (var i = 0; i < dropdown.options.length; i++) {
                                    if (dropdown.options[i].text === "--Select City--") {
                                        dropdown.options[i].selected = true;
                                        break;
                                    }
                                }
                            } else {
                                document.querySelector(".myForm input[name='distance']").value = dis / 1000 + "km";

                                document.querySelector(".myForm input[name='duration']").value = toTimeString(dur);
                                console.log("i was called");
                            }
                        });
                    }

                    function toTimeString(totalseconds) {
                        const totalMs = totalseconds * 1000;
                        const result = new Date(totalMs).toISOString().slice(11, 19);
                        return result;
                    }
                </script>
                <script src="assets/js/rr2.js"></script>
            </form>
        </div>
    </div>
</body>

</html>