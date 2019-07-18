<?php
use Illuminate\Support\Facades\Storage;
use App\classes\Steps;

$steps = json_decode(Storage::get('/workflows/'.$id.'.json'))[0];
$i = 0;
$response[0] ="";
foreach ($steps as $step) {
  $panelStart = " <div class=\"panel panel-container\"><div class=\"panel-body\">";
//  $test = var_dump($step);
  $panelEnd = "</div></div>";
  
  $funtion = "html_".key($step);
  $response[$i] = Steps::$funtion($step, $response);
  //var_dump($response[$i]);



  $html = $panelStart.key($step).$response[$i].$panelEnd;
  echo $html;
  $i++;
}
