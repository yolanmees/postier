<?php
namespace App\classes;

use DB;
/**
 * Users and Roles
 */
class UploadPostCol
{

  public static function insertCollection($name, $description)
  {

    $test = DB::table('collection')->insert( array('name' => $name, 'description' => $description));

    return $test;
  }



}
