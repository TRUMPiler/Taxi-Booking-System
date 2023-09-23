<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>#map {
  height: 400px;
}</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.js"></script>
    <link type="text/css" rel="stylesheet" href="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.css"/>

    <script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>
</head>
<body>
    <form class="myForm">
    <div class="form-group">
        <label for="">Source address</label><br>
        <input type="text" value="<?php echo $_SESSION["address"] ?>" id="address" name="source_address" >
        <input type="text" name="latitude" id="" hidden>
        <input type="text" name="longitude" id="" hidden>
        <br>
    </div>
    <div class="form-group">
        <label for="">Destination address</label><br>
        <input type="text" name="daddress" id="daddress" onchange=overloading()>
        <input type="text" name="dlat" id="" hidden>
        <input type="text" name="dlong" id="" hidden>
        <br>
    </div>
    <!-- <div class="form-group">
        <label for="">Source address</label><br>
        <input type="text" name="source address" id="">
        <br>
    </div> -->
    <div class="form-group">
        <label for="">From date</label><br>
        <input type="datetime-local" name="from-dt" id="" required>
        <br>
    </div>
    <div class="form-group">
        <label for="">To date</label><br>
        <input type="datetime-local" name="to-dt" id="" required>
        <br>
    </div>
    <div class="form-group">
        <button id="submit">SUBMIT</button>
        <input type="Submit" name="Submit" value="Submit">
        <br>
    </div>
    
    <div>
                <label for="">Select City:</label><br><br>
               
                <?php 
                    $connect=mysqli_connect("localhost","root","","cms");
                    $sql = "SELECT CityGG,tbl_city.City_Name FROM `passenger` Left JOIN tbl_city ON passenger.CityGG=tbl_city.CityID where fname='naishal' LIMIT 1;";
                    $result = mysqli_query($connect, $sql);
                    if(mysqli_num_rows($result)>0){
                        
                        echo '<select name="city" required>';

                        $num_results = mysqli_num_rows($result);
                        for ($i = 0; $i < $num_results; $i++) {
                            $row = mysqli_fetch_array($result);
                            $name = $row['City_Name'];
                            echo "<option value=".$row["CityGG"].">" . $name . "</option>";
                            //echo '<option value="' . $name . '">' . $name . '</option>';
                        }
                        $connect=mysqli_connect("localhost","root","","cms");
                    $sql = "SELECT CityID,City_Name FROM tbl_city where stateid=12";
                    $result = mysqli_query($connect, $sql);
                    if(mysqli_num_rows($result)>0){
                        
                        
                        
                        $num_results = mysqli_num_rows($result);
                        for ($i = 0; $i < $num_results; $i++) {
                            $row = mysqli_fetch_array($result);
                            $name = $row['City_Name'];
                            echo "<option value=".$row["CityID"].">" . $name . "</option>";
                            //echo '<option value="' . $name . '">' . $name . '</option>';
                        }
                        echo '</select>';
                        $connect->close();
                    }
                }
                ?>
               <?php 
                    $connect=mysqli_connect("localhost","root","","cms");
                    $sql = "SELECT CityID,City_Name FROM tbl_city";
                    $result = mysqli_query($connect, $sql);
                    if(mysqli_num_rows($result)>0){
                        
                        echo '<select name="dcity" id="dcity" required>';
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
                   <input type="text" name="distance" id='dis' disabled>
    <input type="text" name="duration" id='dur' disabled>
               </select><br><br>
            </div>    
            <script>
                $("form").on("submit",function(event)
                {
                    event.preventDefault();
                    var formValues=$(this).serialize();
                    $.post(
                        "insertRR.php",
                     formValues,
                    function(data,status){
                        alert(data);
                        }   
                )
                });

                 function overloading(){
      
                  
      var address=document.querySelector("#address").value; 
      console.log(address);   
      const settingss = {
      
      async: true,
      crossDomain: true,
      url: 'https://trueway-geocoding.p.rapidapi.com/Geocode?address='+address+'&language=en',
      method: 'GET',
      headers: {
          'X-RapidAPI-Key': '39bebf8c65msh3c5431b6e89763ap1093ddjsn2d7d1e854615',
          'X-RapidAPI-Host': 'trueway-geocoding.p.rapidapi.com'
      }
  };
  
  $.ajax(settingss).done(function (response) {
  console.log(response);
      var lat=response.results[0].location.lat;
      var long=response.results[0].location.lng;
      console.log(lat);
      document.querySelector(".myForm input[name='latitude']").value=lat;
      document.querySelector(".myForm input[name='longitude']").value=long;
  });

  
  var daddress=document.querySelector("#daddress").value ; 
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

var dropdown=document.getElementById("dcity");
for(var i=0;i<dropdown.options.length;i++)
{
    if(dropdown.options[i].text===city)
    {
        dropdown.options[i].selected=true;
        break;
    }
}
var dlat=responses.results[0].location.lat;
var dlong=responses.results[0].location.lng;
console.log(responses);
document.querySelector(".myForm input[name='dlat']").value=dlat;
document.querySelector(".myForm input[name='dlong']").value=dlong;
overloadings();
});
console.log("called map");

}
async function overloadings()
    {
        try{
            await new Promise(r=>setTimeout(r,2000));
            L.mapquest.key = 'w03p4OcwnfyANcr03u9OE13IfBPPwV1g';
        var baseLayer = L.mapquest.tileLayer('map');

    var map = L.mapquest.map('map', {
     center: [37.7749, -122.4194],
    layers: baseLayer,
    zoom: 12
});


  // Create markers for source and destination
  var sourceMarker = L.mapquest.textMarker([37.7749, -122.4194], {
    text: 'Source',
    position: 'right',
  }).addTo(map);

  var destinationMarker = L.mapquest.textMarker([34.0522, -118.2437], {
    text: 'Destination',
    position: 'right',
  }).addTo(map);

  L.mapquest.directions().route({
   
    start: ''+document.querySelector(".myForm input[name='latitude']").value+','+document.querySelector(".myForm input[name='longitude']").value+'', // Starting address or location
    end: ''+document.querySelector(".myForm input[name='dlat']").value+','+document.querySelector(".myForm input[name='dlong']").value+'',    // Ending address or location
  });
        }
      finally{
        calculate();
      }  
  
    }
    function calculate()
    {
        
        const settings = {
	async: true,
	crossDomain: true,
	url: 'https://trueway-matrix.p.rapidapi.com/CalculateDrivingMatrix?origins='+document.querySelector(".myForm input[name='latitude']").value+'%2C'+document.querySelector(".myForm input[name='longitude']").value+'&destinations='+document.querySelector(".myForm input[name='dlat']").value+'%2C'+document.querySelector(".myForm input[name='dlong']").value+'',
	method: 'GET',
	headers: {
		'X-RapidAPI-Key': '39bebf8c65msh3c5431b6e89763ap1093ddjsn2d7d1e854615',
		'X-RapidAPI-Host': 'trueway-matrix.p.rapidapi.com'
	}
};

$.ajax(settings).done(function (response) {
	console.log(response);
    var dis=response.distances[0];
    var dur=response.durations[0];
    document.querySelector(".myForm input[name='distance']").value=dis/1000+"km";
    document.querySelector(".myForm input[name='duration']").value=toTimeString(dur);
});
    }
    function toTimeString(totalseconds)
    {
        const totalMs=totalseconds * 1000;
        const result=new Date(totalMs).toISOString().slice(11,19);
        return result;
    }
   


    </script>
  <div id="map"></div> 
    </form>
</body>
</html>