<?php

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Manager\SubscriptionManager;
use Illuminate\Support\Facades\Request;

/**
 * Class SubscriptionController
 */
class TestConnection extends Controller
{
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

        return $resp;
    }
}
