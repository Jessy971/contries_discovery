<?php
require("function/curl.function.php");
require("class/class.Cache.php");
$cache     = new Cache();
$dirname = dirname(__FILE__,2);
$_SESSION['file'] = $file = "liste_pays";

if(!$array = json_decode($cache->getCache($dirname."/cache/".$file),true)){

  $q         = 'https://restcountries.eu/rest/v2/all';
  $response  = curl($q);
  $all       = json_decode($response, true);

  foreach ($all as $pays) {

    $p  = [
            'nom'         => $pays['translations']['fr'],
            'name'        => $pays['name'],
            'alpha2Code'  => $pays['alpha2Code'],
            'continent'   => $pays['subregion'],
            'capitale'    => $pays['capital'],
            'langues'     => $pays['languages'],
            'drapeau'     => $pays['flag'],
            'monnaie'     => $pays['currencies'][0]['name'],
            'latlng'      => $pays['latlng']
          ];

      $array[strtolower ($pays['name'])] = $p;

    }

  $cache->cachePut($dirname."/cache/".$file, $array);
}

$ajax = "views/assets/js/q.js";
$map = "views/assets/js/map.js";
$css = 'views/assets/css/stylesheet.css';
include_once('views/welcomeView.php');
