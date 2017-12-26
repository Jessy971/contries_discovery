<?php
$url='';

if(isset($_GET['url'])){
$url = explode('/',htmlspecialchars($_GET['url']));
/*echo "<pre>";
var_dump($url);
echo "<pre>";*/
}

if(empty($url)){
    include('controller/allCountriesController.php');

}
elseif($url[0]== 'pays'){

  include('controller/countrieController.php');
}
