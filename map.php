<!DOCTYPE html>
<?php 

include('./httpful.phar');


function ubiqrades($lat, $lon, $latdes, $londes, $rad) {
    $uri = "https://transen.herokuapp.com/api/ubicaciones_radio_destino?lat=".$lat."&lon=".$lon."&latDes=".$latdes."&lonDes=".$londes."&rad=".$rad;
	$response = \Httpful\Request::get($uri)->send();

	return json_encode($response->body->Resultados);
}

if (isset($_POST['lat']) && isset($_POST['lon']) && isset($_POST['latdes']) && isset($_POST['londes']) && isset($_POST['rad'])) {
    $result = ubiqrades(floatval($_POST['lat']), floatval($_POST['lon']), floatval($_POST['latdes']), floatval($_POST['londes']),intval($_POST['rad']));
}
?>



