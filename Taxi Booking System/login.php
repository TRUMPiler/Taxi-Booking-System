<?php
session_start();
if (isset($_SESSION["verified"]) and isset($_SESSION["email"])) {
	header("location:index");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Yinka Enoch Adedokun">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
	<link href="Images/Taxibooking.png" rel="icon">
	<title>Login Page</title>
	<style>
		.container-center {
			display: flex;
			justify-content: center;
			align-items: center;
			height: 100vh;
		}

		.main-content {
			width: 50%;
			border-radius: 20px;
			box-shadow: 0 5px 5px rgba(0, 0, 0, .4);
			margin: 5em auto;
			display: flex;
		}

		.company__info {
			background-color: rgb(255, 174, 0);
			border-top-left-radius: 20px;
			border-bottom-left-radius: 20px;
			display: flex;
			flex-direction: column;
			justify-content: center;
			color: #fff;
		}

		.fa-android {
			font-size: 3em;
		}

		@media screen and (max-width: 640px) {
			.main-content {
				width: 90%;
			}

			.company__info {
				display: none;
			}

			.login_form {
				border-top-left-radius: 20px;
				border-bottom-left-radius: 20px;
			}
		}

		@media screen and (min-width: 642px) and (max-width:800px) {
			.main-content {
				width: 70%;
			}
		}

		.row>h2 {
			color: rgb(255, 174, 0);
		}

		.login_form {
			background-color: #fff;
			border-top-right-radius: 20px;
			border-bottom-right-radius: 20px;
			border-top: 1px solid #ccc;
			border-right: 1px solid #ccc;
		}

		form {
			padding: 0 2em;
		}

		.form__input {
			width: 100%;
			border: 0px solid transparent;
			border-radius: 0;
			border-bottom: 1px solid #aaa;
			padding: 1em .5em .5em;
			padding-left: 2em;
			outline: none;
			margin: 1.5em auto;
			transition: all .5s ease;
		}

		.form__input:focus {
			border-bottom-color: rgb(255, 174, 0);
			box-shadow: 0 0 5px rgba(0, 80, 80, .4);
			border-radius: 4px;
		}

		.btn {
			transition: all .5s ease;
			width: 70%;
			border-radius: 30px;
			color: rgb(255, 174, 0);
			font-weight: 600;
			background-color: #fff;
			border: 1px solid rgb(255, 174, 0);
			margin-top: 1.5em;
			margin-bottom: 1em;
		}

		.btn:hover,
		.btn:focus {
			background-color: rgb(255, 174, 0);
			color: #fff;
		}

		img {
			height: 200px;
		}

		a {
			text-decoration: none;
			color: rgb(255, 174, 0);
		}
	</style>
</head>

<body style="background: url(Images/Background.jpg); background-size: cover; background-position: center; background-repeat: no-repeat;">
	<!-- Main Content -->
	<div class="container-fluid container-center">
		<div class="row main-content bg-success text-center">
			<div class="col-md-4 text-center company__info">
				<span class="company__logo">
					<h2>
						<img src="images\Taxi.png" alt="Not Found">
					</h2>
				</span>
				<h4 class="company_title"></h4>
			</div>
			<div class="col-md-8 col-xs-12 col-sm-12 login_form ">
				<div class="container-fluid">
					<div class="row">
						<h2>Log In</h2>
					</div>
					<div class="row">
						<form class="form-group1" method="POST">
							<div class="row">
								<input type="text" name="email" id="email" class="form__input" placeholder="Enter your email" required>
								<span class="error" id="email_err"></span>
							</div>
							<div class="row">
								<!-- <span class="fa fa-lock"></span> -->
								<input type="password" name="password" id="password" class="form__input" placeholder="Enter your Password" required>
							</div>
							<!-- <div class="row">
								<input type="checkbox" name="remember_me" id="remember_me" class="">
								<label for="remember_me">Remember Me!</label>
							</div> -->
							<div>
								<input type="submit" value="Submit" name="submit" class="btn">
							</div>
							<?php
							require_once("connection.php");
							if (isset($_POST["submit"])) {
								$sql = "SELECT * FROM passenger where email='" . $_POST["email"] . "' limit 1";
								$result = $conn->query($sql);

								if ($result->num_rows > 0) {
									// output data of each row
									while ($row = $result->fetch_assoc()) {
										if ($row["email"] == $_POST["email"] and $row["password"] == $_POST["password"]) {
											$_SESSION["id"] = $row["id"];
											$_SESSION["fname"] = $row["fname"];
											$_SESSION["lname"] = $row["lname"];
											$_SESSION["dob"] = $row["dob"];
											$_SESSION["gender"] = $row["gender"];
											$_SESSION["contact"] = $row["contact"];
											$_SESSION["address"] = $row["address"];
											$_SESSION["email"] = $row["email"];
											$_SESSION["password"] = $row["password"];
											$_SESSION["filename"] = $row["image"];
											$_SESSION["city"] = $row["CityGG"];
											$_SESSION["role"] = "passenger";
											$_SESSION["verified"] = true;
											header("location:index.php");
										} else {
											echo "<script>alert('invalid email or password')</script>";
										}
									}
								} else {
									$sql = "SELECT * FROM driver where email='" . $_POST["email"] . "' limit 1";
									$result = $conn->query($sql);

									if ($result->num_rows > 0) {
										// output data of each row
										while ($row = $result->fetch_assoc()) {
											if ($row["email"] == $_POST["email"] and $row["password"] == $_POST["password"]) {
												$_SESSION["id"] = $row["id"];
												$_SESSION["fname"] = $row["fname"];
												$_SESSION["lname"] = $row["lname"];
												$_SESSION["dob"] = $row["dob"];
												$_SESSION["filename"] = $row["image"];
												$_SESSION["gender"] = $row["gender"];
												$_SESSION["contact"] = $row["contact"];
												$_SESSION["address"] = $row["address"];
												$_SESSION["email"] = $row["email"];
												$_SESSION["password"] = $row["password"];
												$_SESSION["role"] = "driver";
												$_SESSION["verified"] = true;
												$_SESSION["city"] = $row["CityGG"];
												$_SESSION["filename"] = $row["image"];
												header("location:index_driver.php");
											} else {
												echo "<script>alert('invalid email or password')</script>";
											}
										}
									} else {
										$sql = "SELECT * FROM admin where email='" . $_POST["email"] . "' limit 1";
										$result = $conn->query($sql);

										if ($result->num_rows > 0) {
											// output data of each row
											while ($row = $result->fetch_assoc()) {
												if ($row["email"] == $_POST["email"] and $row["password"] == $_POST["password"]) {
													$_SESSION["fname"] = $row["adminName"];
													// $_SESSION["lname"]=$row["lname"];
													// $_SESSION["dob"]=$row["dob"];
													// $_SESSION["gender"]=$row["gender"];
													// $_SESSION["contact"]=$row["contact"];
													// $_SESSION["address"]=$row["address"];
													$_SESSION["email"] = $row["email"];
													$_SESSION["password"] = $row["password"];
													$_SESSION["role"] = "admin";
													$_SESSION["verified"] = true;

													// $_SESSION["filename"]=$row["image"];
													header("location:Admin Panel/");
												} else {
													echo "<script>alert('invalid email or password')</script>";
												}
											}
										} else {
											echo "<script>alert('invalid email or password')</script>";
										}
									}
								}
							}
							?>
							<script>
								const emailForm = document.querySelector("form");
								const errorMessage = document.getElementById("email_err");

								function validateEmail(email) {
									const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
									return emailPattern.test(email);
								}


								emailForm.addEventListener("input", function(event) {
									event.preventDefault();
									const emailInput = document.getElementById("email");
									const email = emailInput.value.trim();
									if (email === "") {
										errorMessage.textContent = "Email cannot be blank.";

									} else if (validateEmail(email)) {
										errorMessage.textContent = "";

										// You can submit the form here
									} else {
										errorMessage.textContent = "Please enter a valid email address.";
									}
								});
							</script>
						</form>
					</div>
					<div class="row">
						<p>Don't have an account? <a href="Register">Register Here</a></p>
					</div>
					<p><a href="forgetpwd">Forgot Password?</a></p>
				</div>
			</div>
		</div>
	</div>
	<script>
		window.addEventListener("load", function() {
			HH();
		})
		loading();
	</script>
</body>

</html>