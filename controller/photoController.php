<?php
$q         = 'https://pixabay.com/api/?key=7514279-e02a9dcde9b9d9feb83ceb697&q='.$pays.'+landscape&image_type=photo'.$alpha;
$response  = curl($q);
$quer      = json_decode($response, true);
$querLeng  = count($quer['hits']);

if($querLeng != 0){
  if($querLeng != 1){
    $indexRand = mt_rand(0, $querLeng - 1);
  }
  else {
    $indexRand = 0;
  }
  $picture   = $quer['hits'][$indexRand]['webformatURL'];
}
