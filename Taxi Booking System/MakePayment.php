<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- <script src="js/loader.js"></script> -->
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <style>
        .form-control:focus {
            border-color: rgb(255, 174, 0);
            /* Border color when focused */
        }
        .container {
            /* background: rgba(255, 255, 255, 0.8); */
            border-radius: 10px;
            padding: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            border-radius: 20px;
            width: 400px;
            height: 500px;
        }

        .razorpay-payment-button {
            background: white;
            color: rgb(255, 174, 0);
            border: 2px solid rgb(255, 174, 0);
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }

        .razorpay-payment-button:hover {

            background: rgb(255, 174, 0);
            color: white;

        }
    </style>
</head>

<body onload="document.getElementsByClassName('razorpay-payment-button').click();" style="background-image: url('Images/Background.jpg'); background-size: cover; background-repeat: no-repeat;color: rgb(255, 174, 0);">
    <?php session_start();
    include("connection.php");
    $query = "select * from passenger where id=" . $_SESSION['id'] . "";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result); ?>
    <div class="container">
        <div class="row justify-content-start">
            <div class="col-md-8">
                <div class="card">
                    <h1 class="card-header text-center">Payment</h1>
                    <div class="card-body">
                        <section class="registration-section text-center" id="personal-info-section">
                            <div class="form-row mb-5">
                                <div class="form-group col-md-12">
                                    <label for="description">Your Payable Amount</label>
                                </div>
                            </div>
                            <div class="form-group col-md-12">

                                <!-- <textarea class="form-control" id="description" name="description" placeholder="Provide us your feedback regarding our travel services.." rows="4"></textarea> -->
                            
                            <form action="<?php echo "ajax_files/makepayment.php"; ?>" method="POST">
                                <?php
                                include "./connection.php";
                                $query = "select tbl_interest.Cost from tbl_booked JOIN tbl_interest JOIN tbl_request_ride WHERE tbl_request_ride.passengerId=".$_SESSION["id"]." and tbl_interest.RequestID=tbl_request_ride.Request_id and tbl_booked.InterestID=tbl_interest.interestID and tbl_booked.RideStatus NOT IN ('Ride Completed','Ride Cancelled');";
                                $result = mysqli_query($conn, $query);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_array()) {
                                ?>
                                        <h1 class="mb-5" id='razorGG'>₹<?php echo $row["Cost"] ?></h1>
                                        <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="rzp_test_jeRt2IQyrN9mmp" data-amount="100" data-currency="INR" data-order_id='' data-buttontext="Pay" data-name="TAXDASH" data-description="TAXDASH" data-image="Images/Taxibooking.png" data-prefill.name=<?php echo "'" . $_SESSION['fname'] . "'"; ?> data-prefill.email=<?php echo "'" . $_SESSION['email'] . "'"; ?> data-theme.color="#F37254">
                                            function init() {
                                                $('.razorpay-payment-button').click();
                                            }
                                        </script>
                                        <input type="hidden" custom="Hidden Element" name="hidden" />
                                <?php
                                    }
                                } ?>

                            </form>
                            </div>
                            </section>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
    
</body>

</html>