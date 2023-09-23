<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>
  
</head>
<body>
    <form class="myForm" action="#" method="POST">
        <label>Name</label><br>
        <input type="text" name="name"><br>
        <label>email</label><br>
        <input type="email" name="email"><br>
        <label>address</label><br>
        <input name="address" class="address" value="surat" onchange=overloadings()><br>
        <input type="text" name="latitude" hidden>
        <input type="text" name="longitude" hidden>
        <input type="submit" name="submit" value="submit" id="submit"></button>
        <?php 
            
        ?>
        <script>
            
        function overloadings(){
            alert('function called');
        var address=document.querySelector(".myForm input[name='address']").value;    
    const settings = {
       
	async: true,
	crossDomain: true,
	url: 'https://trueway-geocoding.p.rapidapi.com/Geocode?address='+address+'&language=en',
	method: 'GET',
	headers: {
		'X-RapidAPI-Key': '39bebf8c65msh3c5431b6e89763ap1093ddjsn2d7d1e854615',
		'X-RapidAPI-Host': 'trueway-geocoding.p.rapidapi.com'
	}
};

$.ajax(settings).done(function (response) {
	var var_one=response.results[0].location.lat;
    var var_two=response.results[0].location.lng;
    document.querySelector(".myForm input[name='latitude']").value=var_one;
    document.querySelector(".myForm input[name='longitude']").value=var_two;
});
}

        </script>
    
    </form>
</body>
</html>