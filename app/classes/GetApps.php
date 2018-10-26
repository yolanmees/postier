<?php
namespace App\classes;

use DB;
/**
 * Users and Roles
 */
class GetApps
{

  public static function getAllApps()
  {

    $collections = DB::table('collection')->select('collection.id as collection_id', 'collection.name as collection_name')->get();
    $id=0;
    foreach ($collections as $collection) {
      $collection_id = $collection->collection_id;
      $collection_items = DB::table('collection_item')->where('collection_item.collection_id', '=', $collection_id)->get();
      $collections[$id]->items = $collection_items;

      $id++;
    }


    return $collections;
  }



}
