<?php
require("class/class.Cache.php");

$file   = htmlspecialchars($_SESSION['file']);
$cache  = new Cache();
$array  = json_decode($cache->getCache($file),true); // récupère le fichier cache au format json et le transforme en tableau php
$q = $url[1];
$result = "";
$len = strlen($q); // utilisé dans la methode substr() pour avoir un résulta plus pertinant.

//Analyse le mot clé recherché pour trouver un résulta qui match.
 foreach (array_values($array) as $name) {

        if($len > 0){
          if (stristr(substr($name['nom'], 0,$len),$q)) {

              if ($result === "") {
                  $result = "<li><a href='pays/" . $name['nom'] ."/" . $name['alpha2Code'].  "'>" . $name['nom'] . "</a></li>";
              } else {
                  $result .= "<li><a href='pays/" . $name['nom'] ."/" . $name['alpha2Code'].  "'>" . $name['nom'] . "</a></li>";
              }
          }
        }
     }

//affiche le résulta qui match ou une phrase que rien ne match.

echo $result === "" ? "no suggestion" : "<ul>". $result. "</ul>";
//echo "<pre>";
//  // var_dump($a);
// var_dump($name);
// //var_dump($p);
//print_r(array_values($array));
 //echo "</pre>";<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
