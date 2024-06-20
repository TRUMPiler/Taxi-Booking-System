<?php
    
                include "checkmail.php";
                    $response=array('status'=>0,'data'=>"login.php");
                    if(isset($_SESSION["emailver"]))
                    {
                      
                        
                        if($_POST["password"]==$_POST["confirmPass"])
                        {
                    
                            
                            $_SESSION["city"]=$_POST["city"];
                            $_SESSION["fname"]=$_POST["fname"];
                            $_SESSION["lname"]=$_POST["lname"];
                            $_SESSION["mname"]=$_POST["mname"];
                            $_SESSION["password"]=$_POST["password"];
                           $_SESSION["dob"]=$_POST["dob"];
                           $_SESSION["gender"]=$_POST["gender"];
                            $_SESSION["contact"]=$_POST["contact"];
                            $_SESSION["address"]=$_POST["address"];
                            $_SESSION["email"]=$_POST["email"];
                            $_SESSION["role"]="passenger";
                            $_SESSION["url"]="insertion.php";
                            $targetDir = "../Images/";
                            $fileName = basename($_FILES["file"]["name"]);
                            $targetFilePath = $targetDir . $fileName;
                            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

                            if(!empty($_FILES["file"]["name"])){
                                
                                // Allow certain file formats
                                $allowTypes = array('jpg','png','jpeg','gif','pdf');
                                if(in_array($fileType, $allowTypes))
                                {
                                                          
                                    // Upload file to server
                                    if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath))
                                    {
                                        
                                        // Insert image file name into database
                                        $_SESSION["filename"]=$fileName;
                                       echo "true";  
                                    }
                                }
                                else
                                {
                                    echo 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
                                }
                            }
                               
                            
                        }
                                               
                }
                else
                {
                    if(isset($_POST["submit"]))
                    {
                        echo "submit fetched";
                    }
                    else
                    {
                        echo "submit not Fetched";
                    }
                    if(isset($_SESSION["emailver"]))
                    {
                        echo "ver  fetched";
                    }
                    else
                    {
                        echo "ver not Fetched";
                    }
                    echo "GG";
                }
                        
                       
            ?>