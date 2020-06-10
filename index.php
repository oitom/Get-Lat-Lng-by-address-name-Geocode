<?php
require "api/autoload.php";

$endereco = $_REQUEST["endereco"];

$resp = Geocode::getLatLng($endereco);

$resp = json_decode($resp, TRUE);

if($resp["code"] == 1) {     
    $lat = $resp["msg"]["results"][0]["geometry"]["location"]["lat"];
    $lng = $resp["msg"]["results"][0]["geometry"]["location"]["lng"];
    
    echo "lat : $lat <br>";
    echo "lng : $lng <br>";


    $endpoint = "https://www.google.com/maps/search/";
    $endereco = $resp["msg"]["results"][0]["formatted_address"];

    $link = $endpoint . $endereco;
    echo "<a href='$link' target='_blank'>Link to Google Map</a>";
}
else {
    echo $resp["msg"];
}