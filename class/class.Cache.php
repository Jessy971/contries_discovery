<?php

class Cache{

  // mise en cache du contenu passer en parametre.
  public function cachePut($filename, $content){
    return file_put_contents(dirname(__FILE__,2)."/cache/". $filename,json_encode($content));
  }

  //récupère le fichier mise en cache.
  public function getCache($filename){
    $file = dirname(__FILE__,2)."/cache/". $filename;
    if(!file_exists($file)){
      return false;
    }
    return file_get_contents($file);
  }
}
