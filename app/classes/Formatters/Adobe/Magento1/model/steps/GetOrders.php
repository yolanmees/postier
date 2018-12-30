<?php
namespace App\classes\Formatters\Adobe\Magento1\model\steps;

use App\classes\Formatters\Adobe\Magento1\model\steps as steps;
/**
 * STEPS MAGENTO 1
 */
class GetOrders extends steps
{

  function __construct()
  {

  }

  public static function GetOrderInit(){
    $fields = array(
      '0' => array(
        'name' => 'Order By',
        'field' => 'input'
      ),
      '1' => array(
        'name' => 'Dir',
        'field' => 'input'
      )
    );

    return $fields;
  }

  public static function renderHTML(){
    $fields = self::GetOrderInit();

    $testJson = "{\"php_oauth\":{
        \"id\": \"0\",
        \"type\": \"php_oauth\",
        \"methode\": \"GET\",
        \"url\": \"https://www.switch.be/api/rest/orders?limit=1&order=entity_id&dir=dsc\",
        \"header\": {
        },
        \"auth\":{
          \"savedOAuth\": {
            \"type\": \"saved_oauth\",
            \"consumer_key\": \"8bb00fec9bea00c19d5ac58dc7c2760b\",
            \"consumer_secret\": \"a262f8c157b2104e88ac09076cc7bd9e\",
            \"signing_method\": \"HMAC-SHA1\",
            \"token\": \"904dc0f8512a981581b0a547cd364e99\",
            \"secret\": \"86de54452af3923ed4eda082ccdc27dc\"
          }
        }
      }
    }";
    $html =
    "
    <nav>
      <div class=\"nav nav-tabs\" id=\"nav-tab\" role=\"tablist\">
        <a class=\"nav-item nav-link active\" id=\"nav-Connectie-tab\" data-toggle=\"tab\" href=\"#nav-Connectie\" role=\"tab\" aria-controls=\"nav-Connectie\" aria-selected=\"true\">Connectie</a>
        <a class=\"nav-item nav-link\" id=\"nav-Template-tab\" data-toggle=\"tab\" href=\"#nav-Template\" role=\"tab\" aria-controls=\"nav-Template\" aria-selected=\"false\">Template</a>
        <a class=\"nav-item nav-link\" id=\"nav-Test-tab\" data-toggle=\"tab\" href=\"#nav-Test\" role=\"tab\" aria-controls=\"nav-Test\" aria-selected=\"false\">Test</a>
      </div>
    </nav>
    <div class=\"tab-content\" id=\"nav-tabContent\">
      <div class=\"tab-pane fade show active\" id=\"nav-Connectie\" role=\"tabpanel\" aria-labelledby=\"nav-Connectie-tab\">...</div>
      <div class=\"tab-pane fade\" id=\"nav-Template\" role=\"tabpanel\" aria-labelledby=\"nav-Template-tab\">
    ";

    foreach ($fields as $key => $value) {
      $html .= "

        <h5>".$value['name']."</h5>
        <input class=\"form-control\" />

      ";
    }

    $html .= "
      </div>
      <div class=\"tab-pane fade\" id=\"nav-Test\" role=\"tabpanel\" aria-labelledby=\"nav-Test-tab\">
        <textarea id=\"testJson\" style=\"display:none;\">".$testJson."</textarea>
        <div id=\"testArea\">
        
        </div>
        <center>
          <button class=\"btn btn-dark\" id=\"testButton\">Test</button>
        </center>
      </div>
    </div>
    ";

    echo $html;
  }
}
