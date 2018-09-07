<?php

namespace App\Http\Controllers;

class TestConnection
{
    function tester(){
      // Get cURL resource
      $curl = curl_init();

      $url = $_POST['url'];
      $typeHttp = $_POST['typeHttp'];
      $body = $_POST['body'] ?? '';
      // Set some options - we are passing in a useragent too here
      curl_setopt_array($curl, array(
          CURLOPT_RETURNTRANSFER => 1,
          CURLOPT_CUSTOMREQUEST => $typeHttp,
          CURLOPT_URL => $_POST['url'],
      ));




      // Send the request & save response to $resp
      $resp = curl_exec($curl);
      // Close request to clear up some resources
      curl_close($curl);

      return $resp;
    }
}
