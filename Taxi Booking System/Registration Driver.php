<?php
    session_start();
    $veri="";
    if(isset($_SESSION["verified"]))
    {
        $veri=$_SESSION["verified"];
    }
    if(isset($_SESSION["email"]) and isset($_SESSION["fname"]))
    {
        if($veri==true)
        {
        header("location:index");
        } 
        else
        {
            // header("location:process.php");
        }
        
    } 
?>
<!DOCTYPE html>
<html>

<head>
    <title>Registration Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <!-- <script src="assets/js/loader.js"></script> -->
    <style>
        #preloader
        {
                        
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
    <!-- <div id="preloader"></div> -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h1 class="card-header text-center">Register as Driver</h1>
                    <div class="card-body">
                        <form enctype="multipart/form-data" id="myform">
                            <!-- Personal Information -->
                            <section class="registration-section" id="personal-info-section">
                                <h2>Personal Information</h2>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="first_name">First Name:</label>
                                        <input type="text" class="form-control" id="fname" name="fname" required placeholder="Enter your first name">
                                        <span class="error" id="fname_err"> </span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="middle_name">Middle Name:</label>
                                        <input type="text" class="form-control" id="mname" name="mname" placeholder="Enter your middle name">
                                        <span class="error" id="mname_err"> </span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="last_name">Last Name:</label>
                                        <input type="text" class="form-control" id="lname" name="lname" required placeholder="Enter your last name">
                                        <span class="error" id="lname_err"> </span>
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
                                        <input type="date" class="form-control" id="dob" name="dob" required>
                                        <span class="error" id="dob_err"> </span> 
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="address">Address:</label>
                                        <textarea class="form-control" id="address" name="address" placeholder="Enter Enter your address" required onchange="overloading()"></textarea>
                                        <span class="error" id="address_err"> </span> 
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="gender">City:</label>
                                        <!-- <select class="form-control" id="gender" name="gender" required> -->
                                        <?php 
                                            $connect=mysqli_connect("localhost","root","","cms");
                                            $sql = "SELECT CityID,City_Name FROM tbl_city where stateid=12";
                                            $result = mysqli_query($connect, $sql);
                                            if(mysqli_num_rows($result)>0){
                                                
                                                echo '<select name="city" id="dcity" class="form-control">';
                                                echo '<option value="">--Select City--</option>';
                                                $num_results = mysqli_num_rows($result);
                                                for ($i = 0; $i < $num_results; $i++) {
                                                    $row = mysqli_fetch_array($result);
                                                    $name = $row['City_Name'];
                                                    echo "<option value=".$row["CityID"].">" . $name . "</option>";
                                                    //echo '<option value="' . $name . '">' . $name . '</option>';
                                                }
                                                echo '</select>';
                                                
                                            }
                                        
                                        ?>
                                        <!-- </select> -->
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="profile_picture">Profile Picture:</label>
                                        <input type="file" class="form-control" id="attachment" name="file" accept="image/*" required>
                                        <span id="filename"></span>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
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
                                        <span class="error" id="email_err"> </span>
                                    </div>
                                    <div class="form-group">
                                        <label for="contact_number">Contact number:</label>
                                        <input type="tel" class="form-control" id="contact" name="contact" required>
                                        <span class="error" id="contact_err"> </span>  
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button type="button" class="btn custom-button" id="prev-to-personal">Previous</button>
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
                                        <span class="error" id="password_err"> </span> 
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm_password">Confirm Password:</label>
                                        <input type="password" class="form-control" id="cpassword" name="confirmPass" required>
                                        <span class="error" id="cpassword_err"> </span>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button type="button" class="btn custom-button" id="prev-to-contact">Previous</button>
                                    <!-- <button type="submit" class="btn btn-success" >Register</button> -->
                                    <a href="#"><button type="submit" class="btn btn-success" name="submit" id="submitbtn" >Register</button></a>
                                </div>
                            </section>
                            <script>
                                    $(document).ready(function()
                                    {
                                        // HH();
                                        $("#myform").submit(function(event)
                                        {   
                                            event.preventDefault();
                                            var formdata=new FormData(this);
                                            if ($(".error").text().trim() !== "") {
                                            alert("Please fill in the details in proper format.");
                                            location.reload();
                                        }else{
                                            $.ajax({
                                                type:"POST",
                                                url:"ajax_files/setdriver.php",
                                                data:formdata,
                                                contentType: false,
                                                cache: false,
                                                processData:false,
                                                success:function(data){
                                                    if(data=="true")
                                                    {
                                                        window.location="Registration Vehicle";
                                                    }
                                                    else if(data.includes("./emailerror.php"))
                                                    {
                                                        window.location="emailerror.php";
                                                    }
                                                    else
                                                    {
                                                        alert(data);
                                                    }
                                                },
                                            });
                                        }    
                                        });
                                    
                                    })
                                    // loading();
                                    function overloading(){
                                    var daddress=document.getElementById("address").value; 
                                    console.log(daddress);   
                                    const settings = {

                                    async: true,
                                    crossDomain: true,
                                    url: 'https://trueway-geocoding.p.rapidapi.com/Geocode?address='+daddress+'&language=en',
                                    method: 'GET',
                                    headers: {
                                    'X-RapidAPI-Key': '39bebf8c65msh3c5431b6e89763ap1093ddjsn2d7d1e854615',
                                    'X-RapidAPI-Host': 'trueway-geocoding.p.rapidapi.com'
                                    }
                                    };

                                    $.ajax(settings).done(function (responses) {
                                    var city=responses.results[0].locality;
                                    if(responses.results[0].region=="Gujarat")
                                    {
                                        if(document.getElementById("address").value!=responses.results[0].locality)
                                        {
                                            console.log(city);
                                    var dropdown=document.getElementById("dcity");
                                    for(var i=0;i<dropdown.options.length;i++)
                                    {
                                        if(dropdown.options[i].text===city)
                                        {
                                            dropdown.options[i].selected=true;
                                            break;
                                        }
                                    }
                                        }
                                        else
                                        {
                                            alert("address not found to be complete please write proper address");
                                            document.querySelector("#myform textarea[name='address']").value="";
                                        }
                                    }
                                    else
                                    {
                                        alert("Sorry only residents of gurjat can register here 😢");
                                        document.querySelector("#myform textarea[name='address']").value="";
                                    }
                                    

                                    });
                                }
                                
                                    
                                </script>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <script>
        const personalInfoSection = document.getElementById("personal-info-section");
        const contactInfoSection = document.getElementById("contact-info-section");
        const securityInfoSection = document.getElementById("security-info-section");
        const nextToContactBtn = document.getElementById("next-to-contact");
        const nextToSecurityBtn = document.getElementById("next-to-security");
        const prevToContactBtn = document.getElementById("prev-to-contact");
        const prevToPersonalBtn = document.getElementById("prev-to-personal");

        nextToContactBtn.addEventListener("click", () => {
            // Perform validation before moving to the next section
            if (validatePersonalInfo()) {
                personalInfoSection.style.display = "none";
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
            contactInfoSection.style.display = "block";
        });

        prevToPersonalBtn.addEventListener("click", () => {
            contactInfoSection.style.display = "none";
            personalInfoSection.style.display = "block";
        });

        // Validation function for the Personal Information section
        function validatePersonalInfo() {
            const firstName = document.getElementById("fname").value;
            const middleName = document.getElementById("mname").value;
            const lastName = document.getElementById("lname").value;
            const gender = document.getElementById("gender").value;
            const dateOfBirth = document.getElementById("dob").value;
            const address = document.getElementById("address").value;
            const username = document.getElementById("attachment").value;

            // Check if any field is empty
            if (firstName === "" || middleName === "" || lastName === "" || gender === "" || dateOfBirth === "" || address === "" || username === "") {
                alert("Please fill in all the fields in the Personal Information section.");
                return false;
            }

            return true;
        }

        // Validation function for the Contact Information section
        function validateContactInfo() {
            const email = document.getElementById("email").value;
            const contactNumber = document.getElementById("contact").value;

            // Check if any field is empty
            if (email === "" || contactNumber === "") {
                alert("Please fill in all the fields in the Contact Information section.");
                return false;
            }

            return true;
        }
    </script>
<script src="validation.js"></script>
</body>

</html>