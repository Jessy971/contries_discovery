<?php
require("function/curl.function.php");
require("librairy/BdConnection.class.php");
require("model/ManagerCommentaire.class.php");
require("class/class.Cache.php");


$cache             = new Cache();
$alpha              = htmlentities($url[2]);
$pays              = htmlspecialchars($url[1]);
$file              = $_SESSION['file'];
$commentaires      = new ManagerCommentaires();
$_SESSION['alpha'] = $alpha;


//vérifie si le fichier cache exite et attibut le résulta à la variable $array.
// si false, exécute une requète à l'api REST countries.
if(!$array = json_decode($cache->getCache($file),true)){

   $q        = 'https://restcountries.eu/rest/v2/alpha/'.$alpha;
   $response = curl($q);
   $query    = json_decode($response, true);

  $p = [
          'name'      => $query['name'],
          'nom'       => $query['translations']['fr'],
          'continent' => $query['subregion'],
          'capitale'  => $query['capital'],
          'langues'   => $query['languages'],
          'drapeau'   => $query['flag'],
          'monnaie'   => $query['currencies'][0]['name'],
          'latlng'    => $query['latlng']
        ];
}

//initilise la variable $p si le tableau est bien récupéré dans la variable $array avec l'étape précédente.
if(!empty($array)){$p = $array[$pays];}

// initialise les coordonées GSP si existante.
if(isset($p['latlng'][0],$p['latlng'][1]))
{
  $lat  = $p['latlng'][0];
  $lng  = $p['latlng'][1];
}
else
{
  $lat  = "N.C";
  $lng  = "N.C";
}
$flag = $p['drapeau'];

// echo "<pre>";
// print_r($p);
// echo "</pre>";

$_SESSION['pays']  = $p['name'];
$css               = '../../views/assets/css/pays.css';
$commentaires      = $commentaires->readAllComments($_SESSION['pays']);

$ajax = "../../views/assets/js/q.js";
$map = "../../views/assets/js/map.js";

include('photoController.php');
include('views/paysView.php');
