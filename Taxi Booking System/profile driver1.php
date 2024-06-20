<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="Images/Taxibooking.png" rel="icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        body {
            background: url('Images/Background.jpg');
            background-size: cover;
            background-repeat: no-repeat;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: rgb(255, 166, 0)
        }

        .profile-button {
            background: rgb(255, 166, 0);
            box-shadow: none;
            border: none
        }

        .profile-button:hover {
            background: rgb(255, 166, 0)
        }

        .profile-button:focus {
            background: rgb(255, 166, 0);
            box-shadow: none
        }

        .profile-button:active {
            background: rgb(255, 166, 0);
            box-shadow: none
        }

        .back:hover {
            color: rgb(255, 166, 0);
            cursor: pointer
        }

        .labels {
            font-size: 12px;
            font-weight: bold;
        }

        .add-experience:hover {
            background: rgb(255, 166, 0);
            color: #fff;
            cursor: pointer;
            border: solid 1px rgb(255, 166, 0)
        }
    </style>
</head>

<body>
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <?php
            $conn = new mysqli("localhost", "root", "", "cms");

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }


            // $sql = "SELECT * from ".$_SESSION["role"]." where fname='".$_SESSION["fname"]."' and password='".$_SESSION ["password"]."' limit 1";
            $sql = "SELECT id,fname,mname,lname,password,dob,gender,contact,address,email,image,tbl_city.City_Name from driver Join tbl_city where id=".$_SESSION["id"]." and tbl_city.CityID=driver.CityGG limit 1;";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
            ?>
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="img-fluid img-square mt-5" width="150px" src="Images/<?php echo $row['image']; ?>"><span class="font-weight-bold"><?php echo $row['fname'] . " " . $row['lname']; ?></span><span class="text-black-50"><?php echo $row['email']; ?></span><span> </span></div>
                </div>
                <div class="col-md-5 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Personal Details: </h4>
                        </div>
                        <form id="myform">
                            <div class="row mt-2">
                                <div class="col-md-4"><label class="labels">First Name:</label><input type="text" class="form-control readonly" name="fname" readonly value="<?php echo $row['fname']; ?>"></div>
                                <div class="col-md-4"><label class="labels">Middle Name:</label><input type="text" class="form-control readonly" name="mname" readonly value="<?php echo $row['mname']; ?>"></div>
                                <div class="col-md-4"><label class="labels">Last Name:</label><input type="text" class="form-control readonly" name="lname" readonly value="<?php echo $row['lname']; ?>"></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12"><label class="labels">Contact Number</label><input type="text" class="form-control readonly" name="contact" readonly value="<?php echo $row['contact']; ?>"></div>
                                <div class="col-md-12"><label class="labels">Address</label><input type="text" class="form-control readonly" name="address" readonly value="<?php echo $row['address']; ?>"></div>
                                <div class="col-md-12"><label class="labels">Date of Birth</label><input type="text" class="form-control readonly" name="dob" readonly value="<?php echo $row['dob']; ?>"></div>
                                <div class="col-md-12"><label class="labels">Gender</label><input type="text" class="form-control readonly" name="gender" readonly value="<?php echo $row['gender']; ?>"></div>
                                <div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control readonly" name="email" readonly value="<?php echo $row['email']; ?>"></div>
                                <!-- <div class="col-md-12"><label class="labels">Password</label><input type="text" class="form-control readonly" name="password" readonly value="<?php echo $row['password']; ?>"></div> -->
                                <!-- <div class="col-md-12"><label class="labels">Profile</label><input type="text" class="form-control readonly" name="role" readonly placeholder="Passenger/Driver" value="driver"></div> -->
                            <?php
                            
                        }
                        $conn->close();
                            ?>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6"><label class="labels">Country</label><input type="text" class="form-control " name="country" readonly value="India"></div>
                                <div class="col-md-6"><label class="labels">State</label><input type="text" class="form-control " name="state" readonly value="<?php echo $row["City_Name"]?>"></div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-md-3">
                                    <div class="text-center">
                                        <button class="btn btn-primary profile-button" name="update" type="button">Home</button>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="text-center">
                                        <button class="btn btn-primary profile-button" name="update" type="button" onclick="enableFields()">Edit</button>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                <div class="text-center">
                                    <a href="index"><button class="btn btn-primary profile-button" name="logout" id="logout" type="submit">Log out</button></a>
                                </div>
                            </div>
                                <div class="col-md-6">
                                    <div class="text-center">
                                        <button class="btn btn-primary profile-button" name="update"id="update" type="submit">Save Personal Details</button>
                                    </div>
                                </div>
                            </div>
                            <script>
                            $(document).ready(function() {
                                $("#update").click(function () {
                                    $("#myform").submit(function(event)
                                        {   
                                            event.preventDefault();
                                            var formdata=new FormData(this);
                                            $.ajax({
                                                type:"POST",
                                                url:"ajax_files/updatedriver.php",
                                                data:formdata,
                                                contentType: false,
                                                cache: false,
                                                processData:false,
                                                success:function(data){
                                                    if(data=="true")
                                                    {
                                                        
                                                        window.location="otp.php";
                                                    }
                                                    else if(data=="false")
                                                    {
                                                        alert("Profile updation failed email already exits")
                                                        window.location="profile driver";
                                                    }
                                                    else
                                                    {
                                                        alert(data);
                                                    }
                                                },
                                            }); 
                                            
                                        });
                                    
                                })
                                
                                        $("#logout").click(function(){
                                            $.post("logoutGG.php",function(data)
                                            {
                                                if(data=="true")
                                                {
                                                    alert("successfully logged out");
                                                    window.location='index_driver';
                                                }
                                                else
                                                {
                                                    alert(data);
                                                }
                                            })
                                        })
                            })
                        </script>
                        </form>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center experience">
                            <h4>Vehicle Details:</h4>
                        </div><br>
                        <form id="myformvehicle">
                        <?php
                        $conn = new mysqli("localhost", "root", "", "cms");

                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        // $sql = "SELECT * from ".$_SESSION["role"]." where fname='".$_SESSION["fname"]."' and password='".$_SESSION ["password"]."' limit 1";
                        $sql = "SELECT * from vehicle where driver_id=".$_SESSION["id"]." limit 1";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                        ?>
                            <div class="col-md-12"><label class="labels">Company:</label><input type="text" class="form-control readonly" name="company" readonly value="<?php echo $row['company_name']; ?>"></div> <br>
                            <div class="col-md-12"><label class="labels">Vehicle name:</label><input type="text" class="form-control readonly" name="vname" readonly value="<?php echo $row['model']; ?>"></div> <br>
                            <div class="col-md-12"><label class="labels">Vehicle Plate number:</label><input type="text" class="form-control readonly" name="platenumber" readonly value="<?php echo $row['vehicle-number']; ?>"></div>
                            <div class="row mt-5">
                                <div class="col-md-3">
                                    <div class="text-center">
                                        <button class="btn btn-primary profile-button" name="update" type="button" onclick="enableFields()">Edit</button>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="text-center">
                                        <button class="btn btn-primary profile-button" id="update1" name="updatevehicle" type="submit">Save Personal Details</button>
                                    </div>
                                </div>
                            </div>
                            <script>
                            $(document).ready(function() {
                                $("#update1").click(function () {
                                    $("#myformvehicle").submit(function(event)
                                        {   
                                            event.preventDefault();
                                            var formdata=new FormData(this);
                                            $.ajax({
                                                type:"POST",
                                                url:"ajax_files/updatevehicle.php",
                                                data:formdata,  
                                                contentType: false,
                                                cache: false,
                                                processData:false,
                                                success:function(data){
                                                    if(data=="true")
                                                    {
                                                        
                                                        alert("vehicle updated");
                                                        window.location='index_driver';
                                                    }
                                                    else if(data=="vehicle exists")
                                                    {
                                                        alert("vehicle updation failed vehicle number already exits")
                                                        window.location="profile driver";
                                                    }
                                                    else
                                                    {
                                                        alert(data);
                                                    }
                                                },
                                            }); 
                                            
                                        });
                                    
                                })
                                
                                       
                            })
                        </script>
                        </form>
                    </div>
                <?php
                        }
                        // $conn->close();
                ?>
                </div>
        </div>
    </div>
    </div>
    </div>
    <script>
        // JavaScript function to enable input fields
        function enableFields() {
            const readonlyFields = document.querySelectorAll(".readonly");
            readonlyFields.forEach(field => {
                field.removeAttribute("readonly");
            });
        }
    </script>
</body>

</html>