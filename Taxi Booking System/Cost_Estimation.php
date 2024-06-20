<?php
session_start();
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
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link type="text/css" rel="stylesheet" href="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <!-- <li><a class="nav-link scrollto" href="#about">About Us</a></li> -->
          <!-- <li><a class="nav-link scrollto" href="#services">Services</a></li> -->
          <!-- <li><a class="nav-link scrollto" href="#portfolio">Portfolio</a></li> -->
          <!-- <li><a class="nav-link scrollto" href="#team">Team</a></li> -->
          <li class="dropdown"><a href="#"><span>Services</span> <i class="bi bi-chevron-down"></i></a>
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
              <!-- <li><a href="#">Drop Down 3</a></li> -->
              <!-- <li><a href="#">Drop Down 4</a></li> -->
            </ul>
          </li>
          <!-- <li><a class="nav-link scrollto" href="#contact">Contact</a></li> -->
          <!-- <li><a class="getstarted scrollto" href="login.php">Login</a></li> -->
          <?php
          if (isset($_SESSION["fname"])) {
            if ($_SESSION["fname"] == "") {
              echo "<li><a class='getstarted scrollto' href='login.php'>Login</a></li>";
            } elseif ($_SESSION["filename"] != "") {
              echo "<li><a  href='profile driver'>" . "<img src='Images/" . $_SESSION["filename"] . "' alt='" . $_SESSION["fname"] . "' style='border-radius:150%;'>" . "</a></li>";
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
  <div class="split left">
    <!-- <div class="centered"> -->
    <div id="map"></div>
    <script src="map.js"></script>
    <!-- </div> -->
  </div>
  <div class="split right">
    <div class="container">
      <form action="" method="POST" class="myForm">
        <?php
        include "connection.php";
        if (isset($_SESSION["RequestID"])) {
          $query = "SELECT 
          Request_id,
          SourceAddress,
          DestinationAddress,
          rr.From,
          rr.To,
          passenger.fname as passengername,
          source_city.City_name AS source_city_name,
          destination_city.City_name AS destination_city_name
      FROM 
          tbl_request_ride AS rr
      JOIN 
          tbl_city AS source_city ON rr.SourceCity = source_city.CityID
      JOIN 
          tbl_city AS destination_city ON rr.DestinationCity = destination_city.CityID
      JOIN
          passenger as passenger on rr.passengerId = passenger.id
      WHERE 
          Request_id =" . $_SESSION["RequestID"] . "";
          $result = mysqli_query($conn, $query);
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_array()) {
        ?>
              <div class="row">
                <div class="col-md-12">
                  <h4><b>Passenger Name:</b> <?php echo $row["passengername"]; ?></h4>
                </div>
              </div><br>
              <div class="row">
                <div class="col-md-12">
                  <h4 id='address'>Source: <?php echo $row["SourceAddress"]; ?> <?php echo $row["source_city_name"]; ?></h4>
                </div>
                <input type='text' name='latitude' id='lat' hidden>
                <input type='text' name='longitude' id='long' hidden>
              </div><br>
              <div class="row">
                <div class="col-md-12">
                  <h4 id='daddress'>Destination: <?php echo $row["DestinationAddress"]; ?> <?php echo $row["destination_city_name"]; ?></h4>
                </div>
                <input type='text' name='dlat' id='dlat' hidden>
                <input type='text' name='long' id='dlong' hidden>
              </div><br>
              <div class="row">
                <div class="col-md-12">
                  <h4>Travel Begins From: <?php echo $row["From"]; ?></h4>
                </div>
              </div><br>
              <div class="row">
                <div class="col-md-12">
                  <h4>Travel Ends On: <?php echo $row["To"]; ?></h4>
                </div>
              </div><br>
              <div class="row">
                <div class="col-md-12">
                  <h4 id='distance'>Estimated Distance of the ride</h4>
                </div>
              </div><br>
              <div class="row">
                <div class="col-md-12">
                  <h4 id='duration'>Estimated Duration of the ride</h4>
                </div>
              </div><br>
              <?php
              $query = "SELECT 
              driver.id AS driver_id,
              vehicle.id AS vehicle_id,
              tbl_interest.interestID,
              tbl_interest.Cost 
          FROM 
              driver
          JOIN 
              vehicle ON driver.id = vehicle.driver_id
          JOIN 
              tbl_interest ON vehicle.id = tbl_interest.vehicle_id
          WHERE 
              driver.id = ".$_SESSION["id"]." 
              AND tbl_interest.RequestID = ".$_SESSION["RequestID"]." limit 1";
          ;
              $results = mysqli_query($conn, $query);
              if ($results->num_rows > 0) {
                while ($row = $results->fetch_array()) {
                  echo "<h4>Cost given for the trip is:" . $row["Cost"] . "</h4>";
                }
              } else {
              ?>
                <span class="error" id="cost_err"></span>
                <div class='input-group'>
                  <input type='text' name='cost_estimation' class='form-control' id="Cost" required>
                </div>

        <?php
              }
            }
          }
        }
        ?>
        <!-- <input type='text' name='cost_estimation' required> -->
        <br>
        <div class="row col-md-6 d-flex justify-content-end">
          <div class="d-flex justify-content-">
            <button type="submit" id="estimation" class=" custom-button">Submit Cost</button>
          </div>
        </div>
        <!-- <input type="submit" id="estimation" value="Submit Your Estimation"> -->
      </form>
    </div>
  </div>
  <script>
    $(document).ready(function() {
      settingLoc();

      $("form").on("submit", function(event) {
        event.preventDefault();
        var formValues = $(this).serialize();
        $.post(
          "setinterest.php",
          formValues,
          function(data, status) {

            if (data == true) {
              alert("Estimation send to passenger");
              window.location = 'index_driver';
            } else if (data ==false) {
              alert("Estimation Already given please wait");
              window.location = 'index_driver';
            }
          }
        )
      });
    })

    function settingLoc() {


      var address = document.getElementById("address").innerText;

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
        var lat = response.results[0].location.lat;
        var long = response.results[0].location.lng;
        console.log(lat);
        document.querySelector(".myForm input[name='latitude']").value = lat;
        document.querySelector(".myForm input[name='longitude']").value = long;
      });


      var daddress = document.getElementById("daddress").innerText;;
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
        var dlat = responses.results[0].location.lat;
        var dlong = responses.results[0].location.lng;
        console.log(dlat);
        document.querySelector(".myForm input[name='dlat']").value = dlat;
        document.querySelector("#dlong").value = dlong;

      });
      overloadings();
      console.log("called map");
    }
    async function overloadings() {
      try {
        await new Promise(r => setTimeout(r, 2000));
        L.mapquest.key = 'w03p4OcwnfyANcr03u9OE13IfBPPwV1g';
        var baseLayer = L.mapquest.tileLayer('map');

        var map = L.mapquest.map('map', {
          center: [37.7749, -122.4194],
          layers: baseLayer,
          zoom: 12
        });


        // Create markers for source and destination
        var sourceMarker = L.mapquest.textMarker([37.7749, -122.4194], {
          text: 'Source',
          position: 'right',
        }).addTo(map);

        var destinationMarker = L.mapquest.textMarker([34.0522, -118.2437], {
          text: 'Destination',
          position: 'right',
        }).addTo(map);

        L.mapquest.directions().route({

          start: '' + document.querySelector(".myForm input[name='latitude']").value + ',' + document.querySelector(".myForm input[name='longitude']").value + '', // Starting address or location
          end: '' + document.querySelector(".myForm input[name='dlat']").value + ',' + document.querySelector("#dlong").value + '', // Ending address or location
        });
      } finally {
        calculate();
      }

    }
    function GGs(dis)
{
  $.post("getmoney.php",{distance:dis},function(data) { document.querySelector("#Cost").value=data})
}
    function calculate() {

      const settings = {
        async: true,
        crossDomain: true,
        url: 'https://trueway-matrix.p.rapidapi.com/CalculateDrivingMatrix?origins=' + document.querySelector(".myForm input[name='latitude']").value + '%2C' + document.querySelector(".myForm input[name='longitude']").value + '&destinations=' + document.querySelector(".myForm input[name='dlat']").value + '%2C' + document.querySelector("#dlong").value + '&avoid_highway=true',
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
        dis=dis/1000;
        GGs(dis);
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
  </script>
  <script>
    const costInput = document.querySelector('input[name="cost_estimation"]');
    const costError = document.getElementById('cost_err');

    costInput.addEventListener('input', function() {
      const costValue = costInput.value;

      if (/^\d{3,}$/.test(costValue)) {
        costError.textContent = '';
      } else {
        costError.textContent = 'Please enter at least 3 digits and only digits.';
      }
    });
  </script>

</body>

</html>