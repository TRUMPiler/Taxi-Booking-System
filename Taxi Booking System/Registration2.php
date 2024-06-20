<!DOCTYPE html>
<html>

<head>
    <title>Registration Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
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
                    <h1 class="card-header text-center">Register as Driver</h1>
                    <div class="card-body">
                        <form id="registration-form" action="registration.php" method="post">
                            <!-- Personal Information -->
                            <section class="registration-section" id="personal-info-section">
                                <h2>Personal Information</h2>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="first_name">First Name:</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name" required placeholder="Enter your first name">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="middle_name">Middle Name:</label>
                                        <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Enter your middle name">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="last_name">Last Name:</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name" required placeholder="Enter your last name">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="gender">Gender:</label>
                                        <select class="form-control" id="gender" name="gender" required>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="date_of_birth">Date of Birth:</label>
                                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="address">Address:</label>
                                        <textarea class="form-control" id="address" name="address" placeholder="Enter Enter your address" required></textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="gender">City:</label>
                                        <select class="form-control" id="gender" name="gender" required>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="profile_picture">Profile Picture:</label>
                                        <input type="file" class="form-control" id="profile_picture" name="profile_picture" accept="image/*">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button type="button" class="btn custom-button" id="next-to-personalinfoinfo">Next</button>
                                </div>
                            </section>
                            <section class="registration-section" id="personal-info-info-section" style="display: none;">
                                <h2>Personal Info</h2>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="driver_license">Driver License (Image):</label>
                                        <input type="file" class="form-control" id="driver_license" name="driver_license" accept="image/*">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="id_proof">ID Proof (Image):</label>
                                        <input type="file" class="form-control" id="id_proof" name="id_proof" accept="image/*">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button type="button" class="btn custom-button" id="prev-to-personal">Previous</button>
                                    <button type="button" class="btn custom-button" id="next-to-contact">Next</button>
                                </div>
                            </section>
                            <!-- Contact Information -->
                            <section class="registration-section" id="contact-info-section" style="display: none;">
                                <h2>Contact Information</h2>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="email">Email ID:</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="contact_number">Contact number:</label>
                                        <input type="tel" class="form-control" id="contact_number" name="contact_number" required>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button type="button" class="btn custom-button" id="prev-to-personalinfoinfo">Previous</button>
                                    <button type="button" class="btn custom-button" id="next-to-security">Next</button>
                                </div>
                            </section>

                            <!-- Security Information -->
                            <section class="registration-section" id="security-info-section" style="display: none;">
                                <h2>Security Information</h2>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="password">Set Password:</label>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm_password">Confirm Password:</label>
                                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button type="button" class="btn custom-button" id="prev-to-contact">Previous</button>
                                    <button type="submit" class="btn btn-success">Register</button>
                                </div>
                            </section>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const personalInfoSection = document.getElementById("personal-info-section");
        const personalInfoInfoSection = document.getElementById("personal-info-info-section");
        const contactInfoSection = document.getElementById("contact-info-section");
        const securityInfoSection = document.getElementById("security-info-section");
        const nextToPersonalinfoinfoBtn = document.getElementById("next-to-personalinfoinfo");
        const nextToContactBtn = document.getElementById("next-to-contact");
        const nextToSecurityBtn = document.getElementById("next-to-security");
        const prevToContactBtn = document.getElementById("prev-to-contact");
        const prevToPersonalBtn = document.getElementById("prev-to-personal");
        const prevToPersonalInfoInfoBtn = document.getElementById("prev-to-personalinfoinfo");

        nextToPersonalinfoinfoBtn.addEventListener("click", () => {
            // Perform validation before moving to the next section
            if (validatePersonalInfo()) {
                personalInfoSection.style.display = "none";
                personalInfoInfoSection.style.display = "block";
            }
        });
        nextToContactBtn.addEventListener("click", () => {
            // Perform validation before moving to the next section
            if (validatePersonalInfoInfo()) {
                personalInfoInfoSection.style.display = "none";
                contactInfoSection.style.display = "block";
            }
        });

        nextToSecurityBtn.addEventListener("click", () => {
            // Perform validation before moving to the next section
            if (validateContactInfo()) {
                contactInfoSection.style.display = "none";
                securityInfoSection.style.display = "block";
            }
        });

        prevToContactBtn.addEventListener("click", () => {
            securityInfoSection.style.display = "none";
            personalInfoInfoSection.style.display = "block";
        });

        prevToPersonalBtn.addEventListener("click", () => {
            personalInfoInfoSection.style.display = "none";
            personalInfoSection.style.display = "block";
        });
        prevToPersonalInfoInfoBtn.addEventListener("click", () => {
            contactInfoSection.style.display = "none";
            personalInfoInfoSection.style.display = "block";
        });

        // Validation function for the Personal Information section
        function validatePersonalInfo() {
            const firstName = document.getElementById("first_name").value;
            const middleName = document.getElementById("middle_name").value;
            const lastName = document.getElementById("last_name").value;
            const gender = document.getElementById("gender").value;
            const dateOfBirth = document.getElementById("date_of_birth").value;
            const address = document.getElementById("address").value;
            const username = document.getElementById("profile_picture").files[0]; // Check if a file is selected

            // Check if any field is empty
            if (firstName === "" || middleName === "" || lastName === "" || gender === "" || dateOfBirth === "" || address === "" || !username) {
                alert("Please fill in all the fields in the Personal Information section.");
                return false;
            }
            return true;
        }

        function validatePersonalInfoInfo() {
            const driverLicense = document.getElementById("driver_license").files[0]; // Check if a file is selected
            const idProof = document.getElementById("id_proof").files[0]; // Check if a file is selected

            if (!driverLicense || !idProof) {
                alert("Please upload Driver License and ID Proof images.");
                return false;
            }

            return true;
        }


        // Validation function for the Contact Information section
        function validateContactInfo() {
            const email = document.getElementById("email").value;
            const contactNumber = document.getElementById("contact_number").value;

            // Check if any field is empty
            if (email === "" || contactNumber === "") {
                alert("Please fill in all the fields in the Contact Information section.");
                return false;
            }

            return true;
        }
    </script>

</body>

</html>