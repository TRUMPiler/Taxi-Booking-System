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
                    <li><a class="nav-link scrollto " href="index">Home</a></li>
                    <!-- <li><a class="nav-link scrollto" href="#about">About Us</a></li> -->
                    <!-- <li><a class="nav-link scrollto" href="#services">Services</a></li> -->
                    <!-- <li><a class="nav-link scrollto" href="#portfolio">Portfolio</a></li> -->
                    <!-- <li><a class="nav-link scrollto" href="#team">Team</a></li> -->
                    <li class="dropdown"><a class="nav-link scrollto active" href="#"><span>Services</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="Request ride.php">Request Ride</a></li>
                            <!-- <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>-->
                
             <!-- </li> -->
                            <li><a class="nav-link scrollto active" href="booked Ride">Response</a></li>
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
    </header>
    <div class="pt-3"></div>
    <section>
        <div class="content-container">
            <table id="requestedrides" class="table table-striped table-hover table-borderless" style="width:100%" style="background-color: rgb(255, 174, 0); color: white;">
            <caption>List of Driver with offers</caption>
                <thead>
                    <tr>
                        <th>Driver Name</th>
                        <th>Vehicle</th>
                        <th>Cost</th>
                        <th>Image</th>
                        <th>Accept</th>
                    </tr>
                </thead>
                <tbody>
                    <?php include "viewingInterest.php";
                    while ($row = $result->fetch_array()) {
                    ?>
                    <tr>
                        <td><?php echo $row["DriverName"]; 
                            ?></td>
                        <td><?php echo $row["VehicleCompany"] . " " . $row["Model"]; 
                            ?></td>
                        <td><?php echo $row["Cost"]; 
                            ?></td>
                        <td><img src="images/<?php echo $row["Image"];?>" alt="" width="100px"></td>
                        <td>
                            <button class="btn btn-primary" style="background-color: rgb(255, 174, 0); border-color: rgb(255, 174, 0);" id="btnintrestRide" name="<?php echo $row["interestID"];?>" onclick="booking(<?php echo $row['interestID'];?>)">Accept Offer</button>
                        </td>
                    </tr>
                    <input type="text" value="<?php echo $row["RequestID"] ?>" id="REQUESTID" hidden>
                    <input type="text" value="<?php echo $row["DriverID"] ?>" id="DRIVERID" hidden>
                    <?php } 
                    ?>
                </tbody>
            </table>
            <a href="index"><button class="btn btn-secondary">Back</button></a>
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

                    <!-- <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div> -->

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Social Networks</h4>
                        <!-- <p></p> -->
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
    <script>
        $(document).ready(function() {

            $("#requestedrides").dataTable({
                "language": {
            "emptyTable": "No Estimation Yet"
        }
            });
            //    $("button").click(function(){
            //        var x=document.getElementById("btnintrestRide").name;
            //        var xs=document.getElementById("REQUESTID").value;

            //        $.post("ajax_files/setBOOKEDRIDE.php",{interestid:x,requestid:xs},function(data){
            //            if(data=="true")
            //            {
            //              alert("ride booked successfully");
            //              window.location="booked ride mail.php";
            //            }   
            //        })    
            //    })
        })

        function booking(name) {
            var x = name;
            var xs = document.getElementById("REQUESTID").value;
            var xss = document.getElementById("DRIVERID").value;
            $.post("ajax_files/setBOOKEDRIDE.php", {
                interestid: x,
                requestid: xs,
                driverid: xss
            }, function(data) {
                if (data == "truetrue") {
                    alert("ride booked successfully");
                    window.location = "booked ride mail.php";
                } else {
                    alert(data);
                }
            })
        }
    </script>
</body>

</html>