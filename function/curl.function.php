<?php
function curl ($url)
{
  $curl = curl_init();
  $opts = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
          ];

  curl_setopt_array($curl, $opts);

  $response = curl_exec($curl);

  curl_close($curl);

  return $response;
}
