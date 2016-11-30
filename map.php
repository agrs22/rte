<!DOCTYPE html>
<?php 

include('./httpful.phar');


function ubiqrades($lat, $lon, $latdes, $londes, $rad) {
    $uri = "https://transen.herokuapp.com/api/ubicaciones_radio_destino?lat=".$lat."&lon=".$lon."&latDes=".$latdes."&lonDes=".$londes."&rad=".$rad;
	$response = \Httpful\Request::get($uri)->send();

	return json_encode([$response->body->Resultados,$latdes,$londes]);
}

function ubiqradesgc($lat, $lon, $geocode, $rad) {
	$geocodesan = str_replace(" ", "+",$geocode);
	$urigeo = ("https://maps.googleapis.com/maps/api/place/textsearch/json?query=".$geocodesan."+Ensenada&key=AIzaSyDJG_vxmfqBZ1JQ_6Qj3tGpwdvPxXqkc8k");
	$responsegeo = \Httpful\Request::get($urigeo)->send();
	$latdes = ($responsegeo->body->results[0]->geometry->location->lat);
	$londes = ($responsegeo->body->results[0]->geometry->location->lng);
	$uri = "https://transen.herokuapp.com/api/ubicaciones_radio_destino?lat=".$lat."&lon=".$lon."&latDes=".$latdes."&lonDes=".$londes."&rad=".$rad;
	$response = \Httpful\Request::get($uri)->send();
	return json_encode([$response->body->Resultados,$latdes,$londes]);
}

if (isset($_POST['lat']) && isset($_POST['lon']) && isset($_POST['latdes']) && isset($_POST['londes']) && isset($_POST['rad'])) {
    $result = ubiqrades(floatval($_POST['lat']), floatval($_POST['lon']), floatval($_POST['latdes']), floatval($_POST['londes']),intval($_POST['rad']));
}
if (isset($_POST['lat']) && isset($_POST['lon']) && isset($_POST['geocode']) && isset($_POST['rad'])) {
    $result = ubiqradesgc(floatval($_POST['lat']), floatval($_POST['lon']), strval($_POST['geocode']),intval($_POST['rad']));
}
?>



