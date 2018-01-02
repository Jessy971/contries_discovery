<?php
$curl = curl_init();
$opts = [
          CURLOPT_URL => 'https://restcountries.eu/rest/v2/all',
          CURLOPT_RETURNTRANSFER => true,
        ];

curl_setopt_array($curl, $opts);

$response = curl_exec($curl);
curl_close($curl);
$all = json_decode($response, true);
foreach ($all as $pays) {

  $p = [
          'alpha2Code'  => $pays['alpha2Code'],
          'nom'         => $pays['translations']['fr'],
          'capitale'    => $pays['capital'],
          'langues'     => $pays['languages'],
          'drapeau'     => $pays['flag'],
          'monnaie'     => $pays['currencies'][0]['name'],
          'latlng'      => $pays['latlng']
        ];
        
    $array[] = $p;
  }

$css = 'views/stylesheet.css';
include_once('views/welcomeView.php');
