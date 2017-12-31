<?php

/**
 *
 */
class BdConnection
{
  protected $host     = "mysql:host=localhost";
  protected $dbname   = "dbname=countries_discovery";
  protected $encode   = "charset=utf8";
  protected $user     = "root";
  protected $password = "root";

  protected function bdd()
  {
    $bdd = new PDO($this->host.';'.$this->dbname.';'.$this->encode, $this->user,$this->password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $bdd;
  }
}
