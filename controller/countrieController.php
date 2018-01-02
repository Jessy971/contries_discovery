<?php
require("librairy/BdConnection.class.php");
require("model/ManagerCommentaire.class.php");
require("curl.function.php");

$name     = htmlentities($url[2]);
$q        = 'https://restcountries.eu/rest/v2/alpha/'.$name;
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

$flag              = $p['drapeau'];
$pays              = $p['name'];
$css               = '../../views/pays.css';
$_SESSION['pays']  = $pays;
$_SESSION['alpha'] = $name;
$commentaires      = new ManagerCommentaires();
$commentaires      = $commentaires->readAllComments($pays);


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

include('photoController.php');
include('views/paysView.php');
