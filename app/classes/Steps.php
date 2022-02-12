<?php

namespace App\classes;

use App\classes\Steps;
use App\classes\StepsHelper;
use DB;
use OAuth;

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
        curl_setopt_array($curl, [CURLOPT_RETURNTRANSFER => 1, CURLOPT_CUSTOMREQUEST => $typeHttp, CURLOPT_URL => $url]);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

        // HEDERS
        if (! empty($step->Request->header)) {
            foreach ($step->Request->header as $header) {
                curl_setopt($curl, CURLOPT_HTTPHEADER, [$header]);
            }
        }

        // BODY
        if (! empty($step->Request->body)) {
            if ($step->Request->body->type == 'raw') {
                $body = $step->Request->body->raw;
                //echo $body;

                for ($i = 0; $i < 2; $i++) {
                    $variables = StepsHelper::get_string_between($body, '{{ ', ' }}');
                    if ($ValueOfVar = StepsHelper::findVariable($variables, $response)) {
                        var_dump($ValueOfVar);
                        $body = str_replace('{{ '.$variables.' }}', $ValueOfVar, $body);

                        $i = 0;
                    } else {
                    }
                }

                echo $body;
                curl_setopt($curl, CURLOPT_POSTFIELDS, $body);
            }
        }

        // LOGIN OAUTH 2.0 VIA CURL
        $auth = $step->Request->auth;
        if (! empty($auth->login->type)) {
            if ($auth->login->type == 'login_auth') {
                $userData = ['username' => $auth->login->username, 'password' => $auth->login->password];
                $ch = curl_init($auth->login->url);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($userData));
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $step->Request->methode);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json', 'Content-Lenght: '.strlen(json_encode($userData))]);
                $token = curl_exec($ch);
                // HEDERS
                if (! empty($step->Request->header)) {
                    foreach ($step->Request->header as $header) {
                        curl_setopt($curl, CURLOPT_HTTPHEADER, [$header, 'Authorization: Bearer '.json_decode($token)]);
                    }
                } else {
                    curl_setopt($curl, CURLOPT_HTTPHEADER, ['Authorization: Bearer '.json_decode($token)]);
                }
            }
        }

        // Send the request & save response to $resp
        $resp = curl_exec($curl);
        echo curl_getinfo($curl, CURLINFO_HTTP_CODE);
        DB::table('logs_requests')->insert([
            'methode' => $step->Request->methode,
            'URL' => $step->Request->url,
            'Status' => curl_getinfo($curl, CURLINFO_HTTP_CODE),
            'Response' => $resp,
        ]);
        curl_close($curl);

        return json_decode($resp);
    }

    public static function php_oauth($step, $response)
    {
        $auth = $step->php_oauth->auth;
        $nonce = substr(md5(uniqid('nonce_', true)), 0, 16);
        $oauthClient = new OAuth($auth->savedOAuth->consumer_key, $auth->savedOAuth->consumer_secret, $auth->savedOAuth->signing_method, OAUTH_AUTH_TYPE_AUTHORIZATION);
        $oauthClient->setToken($auth->savedOAuth->token, $auth->savedOAuth->secret);
        $oauthClient->disableRedirects();
        $headers = ['Content-Type' => 'application/json', 'Content_Type' => 'application/json', 'Accept' => '*/*'];
        $oauthClient->fetch($step->php_oauth->url, [], $step->php_oauth->methode, $headers);
        $response = json_decode($oauthClient->getLastResponse());
        $response_info = $oauthClient->getLastResponseInfo();
        // var_dump(reset($response));

        DB::table('logs_requests')->insert([
            'methode' => $step->php_oauth->methode,
            'URL' => $step->php_oauth->url,
            'Status' => array_shift($response_info),
            'Response' => json_encode(reset($response)),
        ]);

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
                        if (1 === preg_match('~[0-9]~', $value)) {
                            $getVariable = $getVariable[$value];
                        } else {
                            $getVariable = $getVariable->$value;
                        }
                    }
                    var_dump($getVariable);
                } else {
                    var_dump($response[$stepID]->$variable);
                }
                //var_dump($variable);
            }
        }
    }

    public static function html_Request($step, $response)
    {
        $methode = $step->Request->methode;
        $url = $step->Request->url;
        $id = $step->Request->id;
        $body = $step->Request->body->raw ?? '';
        $html = self::render_request_ui($methode, $url, $id, $body);

        return $html;
    }

    public static function html_php_oauth($step, $response)
    {
        $methode = $step->php_oauth->methode;
        $url = $step->php_oauth->url;
        $id = $step->php_oauth->id;
        $body = $step->Request->body->raw ?? '';
        $html = self::render_request_ui($methode, $url, $id, $body);

        return $html;
    }

    public static function html_showVariables($step, $response)
    {
    }

    public static function render_request_ui($methode, $url, $id, $body)
    {
        $html = '<div class="row">
        <div class="col-xs-4">
            <select class="http-method-select form-control postier-type-http" name="">
                <option selected="selected" value="'.$methode.'">'.$methode.'</option>
                <option value="GET">GET</option>
                <option value="POST">POST</option>
                <option value="PUT">PUT</option>
                <option value="PATCH">PATCH</option>
                <option value="DELETE">DELETE</option>
                <option value="HEAD">HEAD</option>
                <option value="OPTIONS">OPTIONS</option>
              </select>
          </div>
          <div class="col-xs-8 input-group">
              <input placeholder="URL" value="'.$url.'" class="step-url form-control postier-url-'.$id.' urlParamField" type="text" name="" aria-describedby="urlParamsOpen" style="position: relative; top: -10px;">
              <span class="input-group-addon btn-default" id="urlParamsOpen" style="position: relative; top: -10px;">URL parameters</span>
            </div>
          <div class="urlParamsDiv" style="display: none;">
                <div class="col-xs-12 ">
                  <div class="sublabel-left"><a class="addURLParam"> + Add URL Parameters  </a></div>
                </div>
                <div class="col-xs-6">
                  <div class="UrlKeys"><input class="form-control urlParamField"></div>
                </div>
                <div class="col-xs-6 input-group">
                  <div class="UrlValues"><input class="form-control urlParamField"></div>
                </div>
            </div>
          <div class="col-xs-12 ">
              <textarea data-show-for="" rows="5" class="form-control input-group bodypost_copy" style="display: block;" spellcheck="false" name="">'.$body.'</textarea>
              <div class="form-control bodypost" contenteditable="true" style="min-height:200px;" id="txtDiv">'.$body.'</div>
              <div class="col-xs-12">
                <div class="sublabel-left">Headers</div>
                <div class="http-request-header items">
                  <a class="http-request-header-add font-12">+ Add Request Header</a>
                </div>
              </div>
              <div class="col-xs-5 header-key">
              </div>
              <div class="col-xs-1 header-equal text-center">
              </div>
              <div class="col-xs-6 header-value">
              </div>
              <div class="col-sm-12">
                <a class="http-request-send font-12 btn btn-default" id="'.$id.'">Send</a>
                <button class="btn btn-default" id="collapse-btn-'.$id.'">Collapse</button>
                <button class="btn btn-default" id="expand-btn-'.$id.'">Expand</button>
                <div id="json-'.$id.'"></div>
              </div>
          </div>
        </div>';

        return $html;
    }
}
