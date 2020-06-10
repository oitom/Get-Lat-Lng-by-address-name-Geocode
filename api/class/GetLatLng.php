<?php
/**
 * # Get Lat Lng by address name 
 * Classe base para api geocode do google
 * @author https://github.com/wcostale
 */
Class Geocode {
    public static function getLatLng($address) { 
        $curl = curl_init();
        
        $address = rawurlencode($address);

        curl_setopt_array($curl, array(
            CURLOPT_URL => ENDPOINT . PARAM . $address . PATH . API_KEY,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));
        
        $response = curl_exec($curl);

        $err = curl_error($curl);
        curl_close($curl);


        if ($err)
            return json_encode(array("code"=> 0, "msg"=> $err));
        else 
            return json_encode(array("code" => 1, "msg"=> json_decode($response, TRUE)));
        
    }
}
