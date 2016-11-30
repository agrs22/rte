<!DOCTYPE html>
<html>
<head>
<?php include 'map.php';?>
<?php include 'js/gmaps.js';?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/ar.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  
	<div class="container">
  <h2>RTE MAPS:</h2><h5>powerd by: TRANSEN</h5>
  <form class="form-horizontal" method="post">>
    <div class="form-group">
      <label class="control-label col-sm-2" for="lat">Latitude:</label>
      <div class="col-sm-10">
        <input type="lat" class="form-control" name="lat" id="lat" placeholder="Enter Latitude">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="lon">Longitude:</label>
      <div class="col-sm-10">          
        <input type="lon" class="form-control" name="lon" id="lon" placeholder="Enter Longitude">
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-2" for="latdes">Destination Latitude:</label>
      <div class="col-sm-10">
        <input type="latdes" class="form-control" name="latdes" placeholder="Enter Destination Latitude">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="londes">Destination Longitude:</label>
      <div class="col-sm-10">          
        <input type="londes" class="form-control" name="londes" placeholder="Enter Destination Longitude">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="rad">Radius:</label>
      <div class="col-sm-10">          
        <input type="rad" class="form-control" name="rad" placeholder="Enter Radius">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
</div>
</div>


  <div id="floatingRectangle"><span style="font-size:380%;cursor:pointer;color:white" onclick="openNav()">&#9776;</span></div>
    
    
	
	<div id="map" class="mapclass"></div>

	<script>function openNav() {
    document.getElementById("mySidenav").style.width = "100%";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
navigator.geolocation.getCurrentPosition(function(position) {

document.getElementById("lat").value = position.coords.latitude;
document.getElementById("lon").value = position.coords.longitude;

});
</script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJG_vxmfqBZ1JQ_6Qj3tGpwdvPxXqkc8k&callback=initMap">
    </script>

</body>
</html>

