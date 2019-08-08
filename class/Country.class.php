<?php

class Pays{
  private $nameFr;
  private $nameEn;
  private $continent;
  private $capital;
  private $languages;
  private $flag;
  private $currencie;
  private $lat;
  private $lng;

  public function __construct(
    $nameFr, 
    $nameEn, 
    $continent, 
    $capital, 
    $languages, 
    $flag, 
    $currencie, 
    $lat = "N.C", 
    $lng ="N.C"
  ){

    $this->nameFr    = $nameFr;
    $this->nameEn    = $nameEn;
    $this->continent = $continent;
    $this->capital   = $capital;
    $this->languages = $languages;
    $this->flag      = $flag;
    $this->currencie = $currencie;
    $this->lat       = $lat;
    $this->lng       =$lng;
  }

  //Getter

  //retourne le nom en français
  public function getNameFr():string
  {
    return $this->nameFr;
  }

  //retourne le nom en anglais
  public function getNameEn():string
  {
     return $this->nameEn;
  }

  //retourne le continent du pays
  public function getContinent():string
  {
    return $this->continent;
  }

  //retourne la capitale du pays
  public function getCapital():string
  {
    return $this->capital;
  }

  //retourne la ou les langues
  public function getLanguages(): array
  {
    return $this->languages;
  }

  //retourne le lien du drapeau
  public function getFlag(){
    return $this->flag;
  }

  //retourne la monnaie
  public function getCurrencie(){
    return $this->currencie;
  }

  //retourne la coordonnée lattitudinal
  public function getLat()
  {
    return $this->lat;
  }

  //retourne la coordonnée longitudinal
  public function getLng()
  {
    return $this->lng;
  }

}
