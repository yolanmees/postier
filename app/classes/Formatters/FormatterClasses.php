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

    public function __construct()
    {
    }

    public static function apps()
    {
        $formatters = new index;
        $apps = $formatters::apps();
        //var_dump($apps);

        return $apps;
    }
}
