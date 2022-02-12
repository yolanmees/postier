<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function testFuncs()
    {
        // Get cURL resource
        $curl = curl_init();

        $url = $_POST['url'];
        $typeHttp = $_POST['typeHttp'];
        $body = $_POST['body'] ?? '';
        // Set some options - we are passing in a useragent too here
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_CUSTOMREQUEST => $typeHttp,
            CURLOPT_URL => $_POST['url'],
        ]);

        // Send the request & save response to $resp
        $resp = curl_exec($curl);
        // Close request to clear up some resources
        curl_close($curl);

        //$resp = json_decode($resp, true);
        return $resp;
    }

    public function SaveConnToDB()
    {
        return 'GELUKT';
    }
}
