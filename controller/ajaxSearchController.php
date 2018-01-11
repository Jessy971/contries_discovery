<?php
require("class/class.Cache.php");

$file   = htmlspecialchars($_SESSION['file']);
$cache  = new Cache();
$array  = json_decode($cache->getCache($file),true); // récupère le fichier cache au format json et le transforme en tableau php
$q = $url[1];
if ($url[1] === "pays" ){$q = $url[2];}
$result = "";
$len = strlen($q); // utilisé dans la methode substr() pour avoir un résulta plus pertinant.

//Analyse le mot clé recherché pour trouver un résulta qui match.
 foreach (array_values($array) as $name) {

        if($len > 0){
          if (stristr(substr($name['nom'], 0,$len),$q)) {

             if($url[1] === "pays" ){
              if ($result === "") {
                  $result = "<li><a class = 'lienPays' href='../../pays/" . $name['nom'] ."/" . $name['alpha2Code'].  "'>" . $name['nom'] . "</a></li>";
              } else {
                  $result .= "<li><a class = 'lienPays' href='../../pays/" . $name['nom'] ."/" . $name['alpha2Code'].  "'>" . $name['nom'] . "</a></li>";
              }
            }
            else {
              if ($result === "") {
                  $result = "<li><a class = 'lienPays' href='pays/" . $name['nom'] ."/" . $name['alpha2Code'].  "'>" . $name['nom'] . "</a></li>";
              } else {
                  $result .= "<li><a class = 'lienPays' href='pays/" . $name['nom'] ."/" . $name['alpha2Code'].  "'>" . $name['nom'] . "</a></li>";
              }
            }

          }
        }
     }

//affiche le résulta qui match ou une phrase que rien ne match.

echo $result === "" ? "no suggestion" : "<ul>". $result. "</ul>";
