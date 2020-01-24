<?php

namespace Sehan\Auth0\Classes;

class Token {

    public static function getToken()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://wetguns.auth0.com/oauth/token",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "{\"client_id\":\"Lz7b3N08kZ2bUhrz0bpizJ4IfcE6bLmy\",\"client_secret\":\"u1dvVMcLytALFuwXV9_3MgDNs_XxlPg2OdCPxBG9mE4sFoXcsYhe9dkYi1yANG34\",\"audience\":\"https://wetguns.sehan.site/v1/i\",\"grant_type\":\"client_credentials\"}",
        CURLOPT_HTTPHEADER => array(
            "content-type: application/json"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
        echo $response;
        }
    }
  
}