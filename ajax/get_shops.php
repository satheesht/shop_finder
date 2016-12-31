<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
//
//

$shop = new shops();

$shop->processClientRequest();


class shops{
  function processClientRequest(){
    if('get_shops_source_1' == $_GET['action']){
      header('Content-Type: application/json');
      echo $this->httpGet("https://svcs.axfood.se/RestServiceOpen.svc/json/getAllStores?MembershipProgramId=1");
    }
  }
  function httpGet($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.1 Safari/537.11');
    $res = curl_exec($ch);
    $rescode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch) ;
    return $res;
  }
}
