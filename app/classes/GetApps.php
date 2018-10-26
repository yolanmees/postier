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

  public static function getAllAppsHtml($apps)
  {
    $html = "";
    foreach ($apps as $app) {
      $html .= "
      <h5 style=\"cursor:pointer;\" class=\"app-".$app->collection_id."\" onclick=\"OpenCol(".$app->collection_id.")\">".$app->collection_name."</h5>
      <div class=\"collection-".$app->collection_id."\" style=\"display:none;\">
        <div style=\"display: inline;\">
      ";
      foreach ($app->items as $item) {
        //var_dump($item);
        if($item->parrent_id == 0){
          $itemId = substr($item->ext_id, 4);
          $html .= "<b style=\"display: inline; cursor:pointer;\"
                   class=\"SUB-".$item->ext_id."\"
                   onclick=\"SubOpenCol('".$item->ext_id."')\">+</b>

                <p style=\"display: inline; cursor:pointer;\"
                   onclick=\"OpenRequest('".$app->collection_id."','".$item->int_id."')\"
                   >".$item->name."</p><br/>";
        }else{
          if(!empty($item->name)){
            $html .= "<p class=\"COL-".$item->parrent_id."\"
                     style=\"display: none; cursor:pointer;\"
                     onclick=\"OpenRequest('".$app->collection_id."','".$item->int_id."')\">&nbsp;-&nbsp;-&nbsp;".$item->name."</p>";

          }
        }
        //var_dump($item);
      }
      $html .= "</div>
      </div>";
    }

    return $html;
  }



}
