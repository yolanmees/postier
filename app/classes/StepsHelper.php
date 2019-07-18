<?php
namespace App\classes;

use DB;
use OAuth;
/**
 * Users and Roles
 */
class StepsHelper extends Steps
{

  public static function findVariable($variables, $response)
  {
      $steps = explode('%$%', $variables);
      $stepID = $steps['0'];
      if(!empty($steps['1'])){
        if(is_array($steps['1'])){
          $steps = $steps['1'];
        }else{
          $steps = array($steps['1']);
        }
        foreach ($steps as $key => $variable) {
          if (strpos($variable, '%') !== false) {
            $variable = explode('%', $variable);
            $getVariable = $response[intval($stepID)];
            foreach ($variable as $value) {
              if(1 === preg_match('~[0-9]~', $value)){
                $getVariable = $getVariable[intval($value)];
                //break;
              }else{
                $getVariable = $getVariable->$value;
              }
            }
            echo $getVariable;
            return $getVariable;
          }else{
            return $response[intval($stepID)];
          }
          return false;
        }
      }
  }

  public static function get_string_between($string, $start, $end){
      $string = ' ' . $string;
      $ini = strpos($string, $start);
      if ($ini == 0) return '';
      $ini += strlen($start);
      $len = strpos($string, $end, $ini) - $ini;
      return substr($string, $ini, $len);
  }
}
