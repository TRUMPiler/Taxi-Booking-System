<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    
    <script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.jqueryui.min.js"></script>
</head>
<body>
    <table id="requestedrides" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Source</th>
                <th>Destination</th>
                <th>From</th> 
                <th>To</th>
                <th>passenger Name</th>
                <th>Interest Request</th>
            </tr>
            
        </thead>
        <tbody>
            <?php include "viewing.php"; 
            while($row=$result->fetch_array())
            {
                
            
            ?>
            <tr>
            <td><?php echo $row["SourceAddress"]." ".$row["source_city_name"]." ";?></td>
                <td><?php echo $row["DestinationAddress"]." ".$row["destination_city_name"];?></td>
                <td><?php echo $row["From"];?></td>
                <td><?php echo $row["To"];?></td>
                <td><?php echo $row["passengername"];?></td>
                <td><button id="btnintrestRide" name="<?php echo $row["Request_id"];?>">Give Cost estimation</button></td>
            </tr>
            <?php }?>
        </tbody>
    </table>
    
</body>
<script>
    
    $(document).ready(function(){
       
        $("#requestedrides").dataTable();
        $("#btnintrestRide").click(function(){
            var x=document.getElementById("btnintrestRide").name;
            $.post("InterestPage.php",{RequestID:x},function(){
                window.location="Cost_Estimation.php";
            })    
        })
    })
</script>
</html>