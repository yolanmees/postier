<?php
namespace App\classes\Formatters;
/**
 * FORMATTER CLASSES
 */

use App\classes\Formatters\index;
//include 'index.php';

class FormatterClasses
{
  public $apps = [];
  function __construct()
  {



  }

  static public function apps(){
    $formatters = new index;
    $apps = $formatters::apps();
    //var_dump($apps);

    return $apps;
  }

}
