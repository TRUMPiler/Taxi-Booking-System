<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
*{
  padding: 0;
  margin: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
#map {
  height: 400px;
}

body {
  height: 100vh;
  background: linear-gradient(135deg, #8052ec, #d161ff);
}
form {
  width: 75vmin;
  height: 100%;
  position: absolute;
  transform: translate(-50%, -50%);
  top: 50%;
  left: 50%;
  padding: 40px 0;
}
textarea {
  width: 100%;
  padding: 15px 10px;
  border: none;
  border-bottom: 1px solid #645979;
  outline: none;
  border-radius: 5px 5px 0 0;
  background-color: #ffffff;
  font-size: 16px;
}
ul {
  list-style: none;
}
.list {
  width: 100%;
  background-color: #ffffff;
  border-radius: 0 0 5px 5px;
}
.list-items {
  padding: 10px 5px;
}
.list-items:hover {
  background-color: #dddddd;
}
    </style>
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
    <div id="form">

    
    <form class="myForm" action="#" method="POST">
    <label>coordinates for first address</label><br>
    <textarea name="address" id="address" cols="30" rows="10" onkeyup=autocompleted()><?php echo $_SESSION['address']?></textarea>
    <ul class="list"></ul>
    <select name="" id="location">

    </select>
    <input type="text" name="latitude" id='lat' hidden><br>
    <input type="text" name="longitude" id='long' hidden><br>
    <label>coordinates for destination address</label><br>
    <textarea name="daddress" id="daddress" cols="30" rows="10" onchange=overloading()></textarea>
    <input type="text" name="dlat" id='dlat' hidden><br>
    <input type="text" name="dlong" id='dlong' hidden><br>
    <input type="text" name="distance" id='dis' disabled>
    <input type="text" name="duration" id='dur' disabled>
    <input type="submit" value="Submit" name="submit">
    <script>
        
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
      console.log(responses);
        var dlat=responses.results[0].location.lat;
        var dlong=responses.results[0].location.lng;
        console.log(dlat);
        document.querySelector(".myForm input[name='dlat']").value=dlat;
        document.querySelector(".myForm input[name='dlong']").value=dlong;
        overloadings();
    });


    //         var address=document.querySelector(".myForm textarea[name='address']").value ; 
    //         console.log(address);   
    //     const settings = {
           
    //     async: true,
    //     crossDomain: true,
    //     url: 'https://trueway-geocoding.p.rapidapi.com/Geocode?address='+address+'&language=en',
    //     method: 'GET',
    //     headers: {
    //         'X-RapidAPI-Key': '39bebf8c65msh3c5431b6e89763ap1093ddjsn2d7d1e854615',
    //         'X-RapidAPI-Host': 'trueway-geocoding.p.rapidapi.com'
    //     }
    // };
    
    // $.ajax(settings).done(function (response) {
    //   console.log(response);
    //     var var_one=response.results[0].location.lat;
    //     var var_two=response.results[0].location.lng;
    //     console.log(var_one);
    //     document.querySelector(".myForm input[name='latitude']").value=var_one;
    //     document.querySelector(".myForm input[name='longitude']").value=var_two;
    // });
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
	url: 'https://trueway-matrix.p.rapidapi.com/CalculateDrivingMatrix?origins='+document.querySelector(".myForm input[name='latitude']").value+'%2C'+document.querySelector(".myForm input[name='longitude']").value+'&destinations='+document.querySelector(".myForm input[name='dlat']").value+'%2C'+document.querySelector(".myForm input[name='dlong']").value+'&avoid_highway=true',
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
        let input = document.querySelector(".myForm textarea[name='daddress']") 
    input.addEventListener("keyup", (e) => {
  //loop through above array
  //Initially remove all elements ( so if user erases a letter or adds new letter then clean previous outputs)
  removeElements();
  for (let i of sortedNames) {
    //convert input to lowercase and compare with each string
    if (
      i.toLowerCase().startsWith(input.value.toLowerCase()) &&
      input.value != ""
    ) {
      //create li element
      let listItem = document.createElement("li");
      //One common class name
      listItem.classList.add("list-items");
      listItem.style.cursor = "pointer";
      listItem.setAttribute("onclick", "displayNames('" + i + "')");
      //Display matched part in bold
      let word = "<b>" + i.substr(0, input.value.length) + "</b>";
      word += i.substr(input.value.length);
      //display the value in array
      listItem.innerHTML = word;
      document.querySelector(".list").appendChild(listItem);
    }
  }
});
function autocompleted()
{
  try
  {
      const settings = {
      async: true,
      crossDomain: true,
      url: 'https://trueway-places.p.rapidapi.com/FindPlaceByText?text='+document.querySelector(".myForm textarea[name='address']").value+'&language=en',
      method: 'GET',
      headers: {
        'X-RapidAPI-Key': '39bebf8c65msh3c5431b6e89763ap1093ddjsn2d7d1e854615',
        'X-RapidAPI-Host': 'trueway-places.p.rapidapi.com'
        }
      };
      $.ajax(settings).done(function (response,error) 
    {
        // console.log(response);
        var a=response.results[0].address;
        var b=response.results[0].name;
        
        document.querySelector(".myForm textarea[name='daddress']").value="";
        
        document.querySelector(".myForm textarea[name='daddress']").value=b+' '+a;
        // console.log(error);
        let input = document.querySelector(".myForm textarea[name='daddress']")
    });
  }
  finally
  {

  }

}
</script>
 
<div id="map"></div> 
</form>
    </div>






</body>
</html>