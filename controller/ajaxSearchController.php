<?php
require("class/Cache.class.php");
require("class/Country.class.php");

$file      = dirname(__FILE__,2)."/cache/".htmlspecialchars($_SESSION['file']);
$cache     = new Cache();
$array     = json_decode($cache->getCache($file),true); // récupère le fichier cache au format json et le transforme en tableau php
$q = $url[1];

if ($url[1] === "pays" ){$q = $url[2];}
  $result = "";
  $len    = strlen($q); // utilisé dans la methode substr() pour avoir un résulta plus pertinant.

//Analyse le mot clé recherché pour trouver un résulta qui match.
  foreach ($array as $name) {

        if($len > 0){
          $nameEn = unserialize($name)->getNameEn();
          $nameFr = unserialize($name)->getNameFr();

          if (stristr(substr($nameFr, 0, $len), $q)) {

             if($url[1] === "pays" ){
              if ($result === "") {
                  $result = '<li><a class = "lienPays" href="../pays/'. rawurlencode(strtolower($nameEn)) . '">' . $nameFr . '</a></li>';
              }
              else {
                  $result .= '<li><a class = "lienPays" href="../pays/'. rawurlencode(strtolower($nameEn)) . '">' . $nameFr . '</a></li>';
              }
            }
            else {
              if ($result === "") {
                  $result = "<li><a class = 'lienPays' href='pays/" . rawurlencode(strtolower($nameEn)) . "'>" . $nameFr . "</a></li>";
              }
              else {
                  $result .= "<li><a class = 'lienPays' href='pays/" . rawurlencode(strtolower($nameEn)) . "'>" . $nameFr . "</a></li>";
              }
            }
          }
        }
     }

//affiche le résulta qui match ou une phrase indiquant que rien ne match.
echo $result === "" ? "Pas de correspondance": "<ul>". $result. "</ul>";
