<?php

namespace App\classes\Formatters\Adobe\Magento1\model;

use App\classes\Formatters\Adobe\Magento1\Magento1 as Magento1;

/**
 * STEPS MAGENTO 1
 */
class steps extends Magento1
{
    public function __construct()
    {
    }

    public function steps()
    {
        $steps = [
            'Get Orders' => 'GetOrders',
        ];

        return $steps;
    }

    public function GetOrders()
    {
    }
}
