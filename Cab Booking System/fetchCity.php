<?php 
 include "connection.php";
 $val=$_GET["value"];
 $val_M=mysqli_real_escape_string($conn,$val);
 $sql="select cityID,City_Name from tbl_city where stateid='$val_M'";
 $ret=mysqli_query($conn,$sql);
 if($ret->num_rows>0)
 {
    echo "<select name='city'>";
    echo "<option value=''>-select city-</option>";
    while($row=$ret->fetch_array())
    {
        echo "<option value='".$row["cityID"]."'>".$row["City_Name"]."</option>";
    }
    echo "</select>";
 }
 $conn->close();
?>