<?php
use Illuminate\Support\Facades\Storage;
use App\classes\Steps;

$steps = json_decode(Storage::get('/workflows/'.$id.'.json'))[0];
$i = 0;
$response[0] ="";
foreach ($steps as $step) {
  //var_dump($step);
  $funtion = key($step);
  $response[$i] = Steps::$funtion($step, $response);
  var_dump($response[$i]);
  $i++;
}
