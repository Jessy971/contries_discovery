<?php

    $name = htmlspecialchars($url[2]);
    /*echo "<pre>";
    var_dump($name);
    echo "<pre>";*/
    $curl = curl_init();
    $opts = [
        CURLOPT_URL => 'https://restcountries.eu/rest/v2/alpha/'.$name,
        CURLOPT_RETURNTRANSFER => true,
      ];
    curl_setopt_array($curl, $opts);

    $response = curl_exec($curl);
    curl_close($curl);
    $query = json_decode($response, true);
    /*echo "<hr>";
    echo "<pre>";
    print_r($query);
    echo "<pre>";*/


      $p = [
        'nom'      => $query['translations']['fr'],
        'capitale' => $query['capital'],
        'langues'  => $query['languages'],
        'drapeau'  => $query['flag'],
        'monnaie'  => $query['currencies'][0]['name'],
        'latlng'   => $query['latlng']
        ];

$flag = $p['drapeau'];
$css = '../../views/pays.css';
include('views/paysView.php');


/*echo "<hr>";
echo "<pre>";
print_r($url);
echo "<pre>";*/
