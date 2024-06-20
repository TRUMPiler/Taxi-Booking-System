<?php
session_start();
$veri = "";
if (isset($_SESSION["verified"])) {
  $veri = $_SESSION["verified"];
}
if (isset($_SESSION["email"]) and isset($_SESSION["fname"])) {
  if ($veri == true) {
    header("location:index");
  } else {
    // header("location:process.php");
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Registration</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="assets/js/loader.js"></script>

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
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .card {
      border-radius: 20px;
      /* Add curved borders to the card */
      width: 700px; /* Increase the width as needed */
      height: 300px; /* Adjust the height as needed */
    }

    .custom-button {
      background: white;
      /* White background */
      color: rgb(255, 174, 0);
      /* Text color */
      border: 2px solid rgb(255, 174, 0);
      border-radius: 5px;
      padding: 30px 50px;
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
    <div class="card">
      <h1 class="card-header text-center">Register as:</h1>
      <div class="card-body">
        <form>
          <section class="registration-section" id="personal-info-section">
            <div class="text-center">
              <a href="Registration Passenger.php"><button type="button" class="custom-button">Passenger</button></a>
              <a href="Registration Driver.php"><button type="button" class="custom-button">Driver</button></a>
            </div>
          </section>
        </form>
      </div>
    </div>
  </div>
</body>

</html>
