<?php
session_start();
require_once "connection.php";

        
        $tbname=$_SESSION["role"];
        
        if($tbname=="driver")
        {
            $fname=$_SESSION["fname"];
            $lname=$_SESSION["lname"];
            $mname=$_SESSION["mname"];
            $dob=$_SESSION["dob"];
            $gender=$_SESSION["gender"];
            $contact=$_SESSION["contact"];
            $address=$_SESSION["address"];
            $email=$_SESSION["email"];
            $city=(int)$_SESSION["city"];
            echo $city; 
            $password=$_SESSION["password"];
            $fileName=$_SESSION["filename"];
            $query="insert into $tbname(`fname`, `lname`, `mname` ,`dob`, `gender`, `contact`, `address`, `email`,`password`,`image`,`CityGG`) values('$fname','$lname','$mname','$dob','$gender',$contact,'$address','$email','$password','$fileName',$city)";
            $ret=mysqli_query($conn,$query);
            if($ret>0)
            {
                $company=$_SESSION["company"];
                $vehiclemodel=$_SESSION["model"];  
                $vehiclenumber=$_SESSION["vehiclenumber"];
                $vehiclepermit=$_SESSION["vehiclepermit"];
                $vehicleinsurance=$_SESSION["vehicleinsurance"];
                $PassCap=$_SESSION["PassCapacity"];
                $mileage=$_SESSION["mileage"];
                $fueltype=$_SESSION["Fuel-type"];

                $sql = "select id from driver where email='$email' and fname='$fname' LIMIT 1";
                $result=0;
                    if ($result = $conn -> query($sql)) 
                    {
                        while ($row = $result -> fetch_row()) {
                            $_SESSION["id"]=$row[0];
                            $sql="INSERT INTO `vehicle`(`company_name`, `model`, `vehicle-number`, `vehiclepermit`, `vehicleinsurance`, `mileage` ,`Fuel-type`,`PassCapacity`,`driver_id`) VALUES ('$company','$vehiclemodel','$vehiclenumber','$vehiclepermit','$vehicleinsurance','$mileage','$fueltype','$PassCap',".$row[0].")";
                            echo $sql;
                        }
                    }
                    else
                    {
                        echo "<script>alert('information of vehicle could\'nt be recorded please register again')</script>";
                        echo "<script>window.location='Register Vehicle.php'</script>";
                    }
                    $results=mysqli_query($conn,$sql);
                    if($results>0)
                    {
                        $_SESSION["verified"]=true;
                        echo "<script>window.location='index_driver.php'</script>";
                    }
                    else
                    {
                        $_SESSION["verified"]=false;
                    }
            }   
               
        }
        else
        {

            $fname=$_SESSION["fname"];
            $mname=$_SESSION["mname"];
            $lname=$_SESSION["lname"];
            $dob=$_SESSION["dob"];
            $gender=$_SESSION["gender"];
            $contact=$_SESSION["contact"];
            $address=$_SESSION["address"];
            $email=$_SESSION["email"];
            $password=$_SESSION["password"];
            $city=$_SESSION["city"];
            $fileName=$_SESSION["filename"];
            $query="insert into $tbname(`fname`, `lname`, `mname` ,`dob`, `gender`, `contact`, `address`, `email`,`password`,`image`,`CityGG`) values('$fname','$lname','$mname','$dob','$gender',$contact,'$address','$email','$password','$fileName',$city)";
            $ret=mysqli_query($conn,$query);
            if($ret>0)
            {
                $query="select * from $tbname where `fname`='".$fname."' and email='".$email."' limit 1";
                $results=mysqli_query($conn,$query);
                if($results->num_rows>0)
                {
                    while($row=$results->fetch_array())
                    {
                        $_SESSION["id"]=$row["id"];
                        
                    }
                }
                $_SESSION["verified"]=true;
            }
            else
            {
                $_SESSION["verified"]=false;
            }
        }
        if(mysqli_error($conn)=="")
        {
            
            header("location:index")   ;
        }
        else
        {
            header("location:error");
        }
?>
