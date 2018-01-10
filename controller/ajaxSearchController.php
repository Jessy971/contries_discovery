<?php
require("class/class.Cache.php");
$file   = htmlspecialchars($_SESSION['file']);
$cache  = new Cache();
$array  = json_decode($cache->getCache($files),true);
$q      = $_GET['q'];
$result = "";

foreach ($array as $pays) {

}
