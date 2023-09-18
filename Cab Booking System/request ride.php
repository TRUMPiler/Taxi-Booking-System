<?php
session_start() 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post">
    <div class="form-group">
        <label for="">Source address</label><br>
        <input type="text" name="source address" value="<? $_SESSION["address"] ?>">
        <br>
    </div>
    <div class="form-group">
        <label for="">Destination address</label><br>
        <input type="text" name="Destination address" id="">
        <br>
    </div>
    <div class="form-group">
        <label for="">Source address</label><br>
        <input type="text" name="source address" id="">
        <br>
    </div>
    <div class="form-group">
        <label for="">From date</label><br>
        <input type="datetime-local" name="from-dt" id="">
        <br>
    </div>
    <div class="form-group">
        <label for="">To date</label><br>
        <input type="datetime-local" name="to-dt" id="">
        <br>
    </div>
    <div class="form-group">
        <input type="Submit" name="Submit" value="Submit" id="">
        <br>
    </div>
    <div>
                <label for="">Select City:</label><br><br>
               
                <?php 
                    $connect=mysqli_connect("localhost","root","","cms");
                    $sql = "SELECT CityGG FROM passenger where name="+$_SESSION["name"]+" limit 1";
                    $result = mysqli_query($connect, $sql);
                    if(mysqli_num_rows($result)>0){
                        
                        echo '<select name="city" required>';
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
               <?php 
                    $connect=mysqli_connect("localhost","root","","cms");
                    $sql = "SELECT CityID,City_Name FROM tbl_city where stateid=12";
                    $result = mysqli_query($connect, $sql);
                    if(mysqli_num_rows($result)>0){
                        
                        echo '<select name="city" required>';
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
               </select><br><br>
            </div>    
    </form>
</body>
</html>