<?php
use Illuminate\Support\Facades\Storage;
use App\classes\Steps;

//var_dump($_POST['data']);
$step = json_decode($_POST['data']);

$response ="";
//var_dump($step);
$funtion = key($step);
$response = Steps::$funtion($step, $response);
var_dump($response);

 
