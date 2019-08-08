<?php

require 'function/curl.function.php';
require 'class/Cache.class.php';
require 'class/Country.class.php';

$cache            = new Cache();
$dirname          = dirname(__FILE__,2);
$_SESSION['file'] = $file = "liste_pays";
$countryCache     = [];

//vérifie si le fichier cache existe, si non il le crait
if(!$countryCache = json_decode($cache->getCache($dirname."/cache/".$file),true)){

  $q         = 'https://restcountries.eu/rest/v2/all';
  $response  = curl($q);
  $countries = json_decode($response);

  foreach ($countries as $count) {

      $country = new Pays (
        $count->translations->fr,
        $count->name,
        $count->subregion,
        $count->capital,
        $count->languages,
        $count->flag,
        $count->currencies[0]->name,
        $count->latlng[0],
        $count->latlng[1]
      );
      $countryCache[strtolower ($count->name)] = serialize($country);
    }

    $cache->cachePut($dirname."/cache/".$file, $countryCache);
}

$ajax = "views/assets/js/q.js";
$map = "views/assets/js/map.js";
$css = 'views/assets/css/stylesheet.css';
include('views/welcomeView.php');