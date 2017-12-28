<?php
$curl = curl_init();
$opts = [
    CURLOPT_URL => 'https://pixabay.com/api/?key=7514279-e02a9dcde9b9d9feb83ceb697&q='.$pays.'+landscape&image_type=photo',
    CURLOPT_RETURNTRANSFER => true,
  ];
curl_setopt_array($curl, $opts);

$response = curl_exec($curl);
curl_close($curl);
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


class RequeteApi{




}
