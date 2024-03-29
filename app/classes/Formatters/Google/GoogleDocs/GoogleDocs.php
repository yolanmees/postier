<?php

namespace App\classes\Formatters\Google\GoogleDocs;

use App\classes\Formatters\FormatterClasses as FormatterClasses;

/**
 * INIT MAGENTO 1
 */
class GoogleDocs extends FormatterClasses
{
    public function __construct()
    {
        $this->apps['googledocs'] = 'GoogleDocs';
        $this->apps['logo'] = '<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 1818.2 2500" style="enable-background:new 0 0 1818.2 2500;" xml:space="preserve">
                            <style type="text/css">
                            	.st0{fill:#4285F4;}
                            	.st1{fill:#F1F1F1;}
                            	.st2{fill:#A1C2FA;}
                            </style>
                          	<path class="st0" d="M1136.4,0H170.4C79.6,0,0,79.5,0,170.5v2159.1c0,90.9,79.5,170.5,170.5,170.5h1477.3   c90.9,0,170.5-79.5,170.5-170.5V681.8l-397.7-284.1L1136.4,0z"/>
                          	<path class="st1" d="M454.5,1818.2h909.1v-113.6H454.6L454.5,1818.2L454.5,1818.2z M454.5,2045.5h681.8v-113.6H454.5V2045.5z    M454.5,1250v113.6h909.1V1250H454.5z M454.5,1590.9h909.1v-113.6H454.6L454.5,1590.9L454.5,1590.9z"/>
                          	<path class="st2" d="M1136.4,0v511.4c0,90.9,79.5,170.4,170.4,170.4h511.4L1136.4,0z"/>
                          </svg>';
    }

    public function steps()
    {
        // $stepClass = new steps;
        // $steps = $stepClass::steps();
        //
        return 'lol';
    }
}
