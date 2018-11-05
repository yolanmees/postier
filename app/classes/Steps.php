<?php
namespace App\classes;

use DB;
use OAuth;
use App\classes\StepsHelper
;
/**
 * STEPS
 */
class Steps
{

  public static function Request($step, $response)
  {
    $url = $step->Request->url;
    $typeHttp = $step->Request->methode;
    $body = $step->Request->body ?? '';

    $curl = curl_init();
    //Set some deafault options
    curl_setopt_array($curl, array(CURLOPT_RETURNTRANSFER => 1, CURLOPT_CUSTOMREQUEST => $typeHttp,CURLOPT_URL => $url));
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

    // HEDERS
    if(!empty($step->Request->header)){
      foreach ($step->Request->header as $header) {
        curl_setopt($curl, CURLOPT_HTTPHEADER, array($header));
      }
    }

    // BODY
    if(!empty($step->Request->body)){
      if($step->Request->body->type == 'raw'){
        $body = $step->Request->body->raw;
        //echo $body;

        for ($i=0; $i < 2; $i++) {
          $variables = StepsHelper::get_string_between($body, '{{ ', ' }}');
          if($ValueOfVar = StepsHelper::findVariable($variables, $response)){
            var_dump($ValueOfVar);
            $body = str_replace('{{ '.$variables.' }}', $ValueOfVar, $body);

            $i=0;
          }else{

          }
        }




        echo $body;
        curl_setopt($curl, CURLOPT_POSTFIELDS, $body);
    }
  }


    // LOGIN OAUTH 2.0 VIA CURL
    $auth = $step->Request->auth;
    if(!empty($auth->login->type)){
      if($auth->login->type == 'login_auth'){
        $userData = array("username" => $auth->login->username, "password" => $auth->login->password);
        $ch = curl_init($auth->login->url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($userData));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $step->Request->methode);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json", "Content-Lenght: " . strlen(json_encode($userData))));
        $token = curl_exec($ch);
        // HEDERS
        if(!empty($step->Request->header)){
          foreach ($step->Request->header as $header) {
            curl_setopt($curl, CURLOPT_HTTPHEADER, array($header, "Authorization: Bearer " . json_decode($token)));
          }
        }else{
          curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization: Bearer " . json_decode($token)));
        }
      }
    }


    // Send the request & save response to $resp
    $resp = curl_exec($curl);
    echo curl_getinfo($curl, CURLINFO_HTTP_CODE);
    DB::table('logs_requests')->insert( array(
      'methode' => $step->Request->methode,
      'URL' => $step->Request->url,
      'Status' => curl_getinfo($curl, CURLINFO_HTTP_CODE),
      'Response' => $resp
    ));
    curl_close($curl);
    return json_decode($resp);
  }

  public static function php_oauth($step, $response)
  {
    $auth = $step->php_oauth->auth;
    $nonce = substr(md5(uniqid('nonce_', true)),0,16);
    $oauthClient = new OAuth($auth->savedOAuth->consumer_key, $auth->savedOAuth->consumer_secret, $auth->savedOAuth->signing_method, OAUTH_AUTH_TYPE_AUTHORIZATION);
    $oauthClient->setToken($auth->savedOAuth->token, $auth->savedOAuth->secret);
    $oauthClient->disableRedirects();
    $headers = array('Content-Type' => 'application/json', 'Content_Type' => 'application/json', 'Accept' => '*/*');
    $oauthClient->fetch($step->php_oauth->url, array(), $step->php_oauth->methode, $headers);
    $response = json_decode($oauthClient->getLastResponse());
    $response_info = $oauthClient->getLastResponseInfo();
    // var_dump(reset($response));

    DB::table('logs_requests')->insert( array(
      'methode' => $step->php_oauth->methode,
      'URL' => $step->php_oauth->url,
      'Status' => array_shift($response_info),
      'Response' => json_encode(reset($response))
    ));
    return reset($response);
  }

  public static function showVariables($step, $response)
  {
    $steps = $step->showVariables->variables->step;
    foreach ($steps as $key => $step) {
      $stepID = key($step);
      foreach ($step as $key => $variable) {
        if (strpos($variable, '%') !== false) {
          $variable = explode('%', $variable);
          $getVariable = $response[$stepID];
          foreach ($variable as $value) {
            if(1 === preg_match('~[0-9]~', $value)){
              $getVariable = $getVariable[$value];
            }else{
              $getVariable = $getVariable->$value;
            }
          }
          var_dump($getVariable);
        }else{
          var_dump($response[$stepID]->$variable);
        }
        //var_dump($variable);
      }
    }
  }

}
