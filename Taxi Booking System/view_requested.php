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
    <title>View Requested Rides</title>

    <!-- Include Bootstrap CSS with custom color theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        /* Custom color theme with black accents */
        body {
            background-color: rgb(255, 174, 0);
            color: black;
        }

        /* Change table and button styles */
        .table {
            background-color: white;
            border: 1px solid rgb(255, 174, 0);
        }

        .table thead th {
            background-color: rgb(255, 174, 0);
            color: black;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(255, 174, 0, 0.2);
        }

        .btn-primary {
            background-color: rgb(255, 174, 0);
            border: 1px solid rgb(255, 174, 0);
        }

        .btn-primary:hover {
            background-color: rgb(255, 140, 0);
            border: 1px solid rgb(255, 140, 0);
        }

        .btn-secondary {
            background-color: white;
            border: 1px solid rgb(255, 174, 0);
            color: rgb(255, 174, 0);
        }

        .btn-secondary:hover {
            background-color: rgb(255, 174, 0);
            color: white;
        }

        .custom-button {
            background: white;
            color: rgb(255, 174, 0);
            border: 2px solid rgb(255, 174, 0);
            border-radius: 7px;
            padding: 10px 20px;
            cursor: pointer;
        }

        .custom-button:hover {
            background: rgb(255, 174, 0);
            color: white;
        }
    </style>

    <!-- ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>
    <script src="assets/js/loader.js"></script>
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
    <script src="js/loader.js"></script>
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">


    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.jqueryui.min.js"></script>
</head>

<body>
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="logo">
                <h1 class="text-light"><a href="index"><span>Taxi Booking</span></a></h1>
            </div>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class a class="nav-link scrollto" href="#about">About Us</a></li>
                    <li class="dropdown"><a href="#services"><span>Services</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="Request ride">Request Ride</a></li>
                            <li><a href="#">Response</a></li>
                            <li><a href="#">Drop Down 3</a></li>
                            <li><a href="#">Drop Down 4</a></li>
                        </ul>
                    </li>
                    <?php
                    if (isset($_SESSION["fname"])) {
                        if ($_SESSION["fname"] == "") {
                            echo "<li><a class='getstarted scrollto' href='login'>Login</a></li>";
                        } elseif (isset($_SESSION["filename"])) {
                            echo "<li><a  href='profile driver'>" . "<img src='images/" . $_SESSION["filename"] . "' alt='" . $_SESSION["fname"] . "' style='border-radius:360%;'>" . "</a></li>";
                        } elseif (!isset($_SESSION["filename"]) && $_SESSION["fname"] != "") {
                            echo "<li><a class='getstarted scrollto' href='profile1'>" . $_SESSION["fname"] . "</a></li>";
                        }
                    } else {
                        echo "<li><a class='getstarted scrollto' href='login'>Login</a></li>";
                    }
                    ?>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
        </div>
    </header>
    <div class="pt-3"></div>
    <section>
    <div class="content-container">
        <table id="requestedrides" class="table table-striped table-hover table-borderless" style="width:100%">
        <caption>List of Requested Rides</caption>
            <thead>
                <tr>
                    <th>Source</th>
                    <th>Destination</th>
                    <th>From</th>
                    <th>To</th>
                    <th>No of Passengers</th>
                    <th>Rider's Name</th>
                    <th>Interest Request</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php include "viewing.php";
                while ($row = $result->fetch_array()) { ?>
                    <tr>
                        <td><?php echo $row["SourceAddress"] . " " . $row["source_city_name"] . " "; ?></td>
                        <td><?php echo $row["DestinationAddress"] . " " . $row["destination_city_name"]; ?></td>
                        <td><?php echo $row["From"]; ?></td>
                        <td><?php echo $row["To"]; ?></td>
                        <td><?php echo $row["PassCount"]; ?></td>
                        <td><?php echo $row["passengername"]; ?></td>
                        <td>
                            <button class="custom-button btnintrestRide" name="<?php echo $row["Request_id"]; ?>" onclick='requestride(<?php echo $row["Request_id"]; ?>)'>Give Cost estimation</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="index_driver"><button class="btn btn-secondary">Back</button></a>
    </div>
    </section>
    <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Team no 2</h3>
            <p>
              Babu Madhav Institude of Information and Technology <br>
              Uka Tarsadia University<br>
              Bardoli, Gujrat 394620<br>
              India <br><br>
              <strong>Phone:</strong> +91 6353 0300 96<br>
              <strong>Email:</strong> registrar@utu.ac.in<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#hero">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">Privacy policy</a></li>
            </ul>
          </div>


          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Social Networks</h4>
            <div class="social-links mt-3">
              <a href="https://twitter.com/utumalibacampus?lang=en" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="https://www.facebook.com/utu.malibacampus/" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="https://www.instagram.com/bmiit.utu/?hl=en" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="mailto:“dashtaxigg@gamil.com.com" class="google-plus"><i class="bx bxl-google"></i></a>
              <a href="https://www.linkedin.com/company/utu-malibacampus" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <strong><span>Taxi Booking</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/ -->
        Designed by <a href="https://github.com/Whitespider06">Pranav Chaudhari, Naishal Doshi and Navdeep Chaudhary</a>
      </div>
    </div>
  </footer>
</body>
<script>
    $(document).ready(function() {
        $("#requestedrides").dataTable();
        // $(".btnintrestRide").click(function() {
        //     var requestID = $(this).data("requestid");
        //     $.post("InterestPage.php", {
        //         RequestID: requestID
        //     }, function() {
        //         window.location = "Cost_Estimation.php";
        //     });
        // });
    });

    function requestride(id) {
        var requestID = id;
        $.post("InterestPage.php", {
            RequestID: requestID
        }, function() {
            window.location = "Cost_Estimation.php";
        });
    }
</script>

</html>