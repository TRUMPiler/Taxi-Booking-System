<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <!-- <script src="js/loader.js"></script> -->
    <title>Document</title>
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
    <!-- <script src="js/loader.js"></script> -->
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

        .error span {
            color: red;

        }

        span.error {
            color: red;
            border-radius: 2px solid red;
        }

        body {
            background-image: url('Images/Background.jpg');
            /* Set the URL of your background image */
            background-size: cover;
            /* Cover the entire viewport with the image */
            background-repeat: no-repeat;
            /* Prevent image repetition */
            color: rgb(255, 174, 0);
            /* Set text color to white for better visibility */
        }

        .container {
            /* background: rgba(255, 255, 255, 0.8); */
            border-radius: 10px;
            padding: 40px;
        }

        .card {
            border-radius: 20px;
            /* Add curved borders to the card */
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

        .form-control:focus {
            border-color: rgb(255, 174, 0);
            /* Border color when focused */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h1 class="card-header text-center">Feedback</h1>
                    <div class="card-body">
                        <form id="myform">
                            <input type="text" name="booked_id" value="<?php echo $_SESSION["booked_id"]?>" hidden>
                            <section class="registration-section" id="personal-info-section">
                                <h2>Share Your Experience</h2>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="description">Your Feedback:</label>
                                        <textarea class="form-control" id="description" name="description" placeholder="Provide us your feedback regarding our travel services.." rows="4" required></textarea>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <a href="index"><button type="button" class="btn custom-button">Home</button></a>
                                    <button type="submit" name="submit" onclick="submit(<?php echo $_SESSION['booked_id']?>)" class="btn custom-button">Submit</button>
                                </div>
                            </section>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <form id="myform">
        <div id="form-group">
            <label for="">Share Your trip experince🗺️</label>
            <textarea type="text" class="form-control" name="description" id="description" placeholder="Write about your experince of the Ride"></textarea>
        </div>
        <div id="form-group">
            <input type="submit" value="Send Feedback" name="submit">
        </div> -->
    <script>
        $(document).ready(function() {
            $("#myform").submit(function(event)
            {
                event.preventDefault();
                var formdata=new FormData(this);
                $.ajax({
                                                type:"POST",
                                                url:"ajax_files/setfeedback.php",
                        data:formdata,
                        contentType: false,
                        cache: false,
                        processData:false,
                        success:function(data){
                            if(data=="true")
                            {
                                alert("feedback has been recieved✔️");
                                window.location="index";
                            }
                            else if(data=="feedback exists")
                            {
                                alert("Feedback on this trip is already given⛔");
                                window.location="index";
                            }
                            else
                            {
                                alert(data);
                            }
                        },
                    }); 
            })
        })
    </script>
</body>

</html>
