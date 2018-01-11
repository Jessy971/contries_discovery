<?php
 session_start();
 $url='';

 if(isset($_GET['url']))
 {
   $url = explode('/',htmlspecialchars($_GET['url']));
}

 if(empty($url) || $url[0] == 'accueil')
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
elseif ($url[0] == 'livesearch') {
  include('controller/ajaxSearchController.php');
}
