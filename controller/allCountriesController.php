<?php
require("function/curl.function.php");
require("class/class.Cache.php");
$cache     = new Cache();
$_SESSION['file'] = $file = "liste_pays";
if(!$array = json_decode($cache->getCache($file),true)){

  $q         = 'https://restcountries.eu/rest/v2/all';
  $response  = curl($q);
  $all       = json_decode($response, true);

  foreach ($all as $pays) {

    $p  = [
            'name'        => $pays['name'],
            'nom'         => $pays['translations']['fr'],
            'alpha2Code'  => $pays['alpha2Code'],
            'continent'   => $pays['subregion'],
            'capitale'    => $pays['capital'],
            'langues'     => $pays['languages'],
            'drapeau'     => $pays['flag'],
            'monnaie'     => $pays['currencies'][0]['name'],
            'latlng'      => $pays['latlng']
          ];

      $array[$pays['translations']['fr']] = $p;

    }

  $cache->cachePut($file, $array);
}

$css = 'views/assets/css/stylesheet.css';
include_once('views/welcomeView.php');
/***************************************************************/
//echo "<pre>";
// echo $cache;
// var_dump($array["Afghanistan"]);
// print_r($array);
// echo "</pre>";
