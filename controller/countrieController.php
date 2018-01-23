<?php
require("function/curl.function.php");
require("librairy/BdConnection.class.php");
require("model/ManagerCommentaire.class.php");
require("class/Cache.class.php");
require("class/Country.class.php");


$cache             = new Cache();
$pays              = htmlspecialchars($url[1]);
$file              = dirname(__FILE__,2).'/cache/'.$_SESSION['file'];
$commentaires      = new ManagerCommentaires();

//vérifie si le fichier cache exite et attibut le résulta à la variable $array.
// si false, exécute une requète à l'api REST countries.
if(!$array = json_decode($cache->getCache($file),true)){

   $q        = 'https://restcountries.eu/rest/v2/name/'.$pays;
   $response = curl($q);
   $query    = json_decode($response);

  $country = new Pays(
          $query->name,
          $query->translations->fr,
          $query->subregion,
          $query->capital,
          $query->languages,
          $query->flag,
          $query->currencies[0]->name,
          $query->latlng[0],
          $query->latlng[1]
        );
}
$country = unserialize($array['france']);

//initilise la variable $p si le tableau est bien récupéré dans la variable $array avec l'étape précédente.
//if(!empty($array)){$p = $array[$pays];}

// initialise les coordonées GSP si existante.

$lat  = $country->getLat();
$lng  = $country->getLng();

$flag              = $country->getFlag();
$_SESSION['pays']  = $country->getNameEn();
$css               = '../views/assets/css/pays.css';
$commentaires      = $commentaires->readAllComments($_SESSION['pays']);

$ajax = "../views/assets/js/q.js";
$map  = "../views/assets/js/map.js";

include('photoController.php');
include('views/paysView.php');

//debug
// echo "<pre>";
// var_dump($array['france']);
// echo "</pre>";
// var_dump ($country->getLng());
