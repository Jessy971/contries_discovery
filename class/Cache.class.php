<?php

class Cache{

  // mise en cache du contenu passer en parametre.
  public function cachePut($filename, $content){
    return file_put_contents($filename,json_encode($content));
  }

  //récupère le fichier mise en cache.
  public function getCache($filename){
    $file = $filename;
    if(!file_exists($file)){
      return false;
    }
    return file_get_contents($file);
  }
}
