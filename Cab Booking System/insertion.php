<?php
session_start();
require_once "connection.php";

        
        $tbname=$_SESSION["role"];
        
        if($tbname=="driver")
        {
            $fname=$_SESSION["fname"];
            $lname=$_SESSION["lname"];
            $dob=$_SESSION["dob"];
            $gender=$_SESSION["gender"];
            $contact=$_SESSION["contact"];
            $address=$_SESSION["address"];
            $email=$_SESSION["email"];
            $city=(int)$_SESSION["city"];
            echo $city; 
            $password=$_SESSION["password"];
            $fileName=$_SESSION["filename"];
            $query="insert into $tbname(`fname`, `lname`, `dob`, `gender`, `contact`, `address`, `email`,`password`,`image`,`CityGG`) values('$fname','$lname','$dob','$gender',$contact,'$address','$email','$password','$fileName',$city)";
            $ret=mysqli_query($conn,$query);
            if($ret>0)
            {
                $company=$_SESSION["company"];
                $vehiclename=$_SESSION["vehiclename"];  
                $vehiclenumber=$_SESSION["vehiclenumber"];
                $sql = "select id from driver where email='$email' and fname='$fname' LIMIT 1";

                    if ($result = $conn -> query($sql)) 
                    {
                        while ($row = $result -> fetch_row()) {
                            $sql="INSERT INTO `vehicle`(`company_name`, `Vehicle_name`, `vehicle-number`, `driver_id`) VALUES ('$company','$vehiclename','$vehiclenumber',".$row[0].")";
                        }
                    }
                    else
                    {
                        header("location:register_vehical");
                    }
                    mysqli_query($conn,$sql);
                
            }   
               
        }
        else
        {
             $fname=$_SESSION["fname"];
            $lname=$_SESSION["lname"];
            $dob=$_SESSION["dob"];
            $gender=$_SESSION["gender"];
            $contact=$_SESSION["contact"];
            $address=$_SESSION["address"];
            $email=$_SESSION["email"];
            $password=$_SESSION["password"];
            $city=$_SESSION["city"];
            $fileName=$_SESSION["filename"];
            $query="insert into $tbname(`fname`, `lname`, `dob`, `gender`, `contact`, `address`, `email`,`password`,`image`,`CityGG`) values('$fname','$lname','$dob','$gender',$contact,'$address','$email','$password','$fileName',$city)";
            $ret=mysqli_query($conn,$query);
            if($ret>0)
            {
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
