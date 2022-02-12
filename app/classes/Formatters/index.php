<?php

namespace App\classes\Formatters;

  class index extends FormatterClasses
  {
      public function __construct()
      {
      }

      public static function apps()
      {
          $apps = [];
          $apps_init = [
              'magento1'=>\App\classes\Formatters\Adobe\Magento1\Magento1::class,
              'magento2'=>\App\classes\Formatters\Adobe\Magento2\Magento2::class,
              'googledocs'=>\App\classes\Formatters\Google\GoogleDocs\GoogleDocs::class,
              'requests'=>\App\classes\Formatters\Postier\Requests\Requests::class,
          ];

          foreach ($apps_init as $key => $value) {
              //echo $value;
              $apps[$key] = new $value;
              $apps[$key]->steps = $apps[$key]->steps();
              $apps[$key]->class = $value;
          }
          //var_dump($apps);
          return $apps;
      }
  }
