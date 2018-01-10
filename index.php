<?php
session_start();
$url='';

if(isset($_GET['url']))
{
  $url = explode('/',htmlspecialchars($_GET['url']));
}

if(empty($url))
{
    include('controller/allCountriesController.php');
}
elseif($url[0] == 'pays')
{
  include('controller/countrieController.php');
}
elseif($url[0] == 'commentaire')
{
  include('controller/comController.php');
}

/*echo "<pre>";
var_dump($url);
echo "</pre>";
*/
