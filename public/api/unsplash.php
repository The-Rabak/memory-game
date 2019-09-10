<?php
function getPics(string $searchTerm){
    $curl = curl_init();
    $limit = 8;


    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.unsplash.com/search/photos?query=$searchTerm&per_page=$limit",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "Accept: *application/json",
            'Content-Type: application/json',
            "Accept-Encoding: gzip, deflate",
            "Authorization: ",
            "Cache-Control: no-cache",
            "Connection: keep-alive",
            "Host: api.unsplash.com",

        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        return "cURL Error #:" . $err;
    } else {
        return ($response);
    }
}
