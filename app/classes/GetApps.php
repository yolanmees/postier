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
        $id = 0;
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
        $html = '';
        foreach ($apps as $app) {
            $html .= '
      <h5 style="cursor:pointer;" class="app-'.$app->collection_id.'" onclick="OpenCol('.$app->collection_id.')">'.$app->collection_name.'</h5>
      <div class="collection-'.$app->collection_id.'" style="display:none;">
        <div style="display: inline;">
      ';
            foreach ($app->items as $item) {
                //var_dump($item);
                if ($item->parrent_id == 0) {
                    $itemId = substr($item->ext_id, 4);
                    $html .= '<b style="display: inline; cursor:pointer;"
                   class="SUB-'.$item->ext_id."\"
                   onclick=\"SubOpenCol('".$item->ext_id."')\">+</b>

                <p style=\"display: inline; cursor:pointer;\"
                   onclick=\"OpenRequest('".$app->collection_id."','".$item->int_id."')\"
                   >".$item->name.'</p><br/>';
                } else {
                    if (! empty($item->name)) {
                        $html .= '<p class="COL-'.$item->parrent_id."\"
                     style=\"display: none; cursor:pointer;\"
                     onclick=\"OpenRequest('".$app->collection_id."','".$item->int_id."')\">&nbsp;-&nbsp;-&nbsp;".$item->name.'</p>';
                    }
                }
                //var_dump($item);
            }
            $html .= '</div>
      </div>';
        }

        return $html;
    }

    public static function getAllCollections()
    {
        $collections = DB::table('collection')->select('collection.id as collection_id', 'collection.name as collection_name')->get();

        return $collections;
    }

    public static function getAllCollectionsHead($collection)
    {
        $collections = DB::table('collection_item')->select('collection_item.id', 'collection_item.name', 'collection_item.int_id')->where([['parrent_id', '=', '0'], ['collection_id', '=', $collection]])->get();

        return $collections;
    }

    public static function getSubCollectionsHead($collection_id, $collection)
    {
        $collections = DB::table('collection_item')->where([['parrent_id', '=', $collection_id], ['collection_id', '=', $collection]])->get();

        return $collections;
    }

    public static function getAllAppsHtmlV2($apps)
    {
        $html = '<ul id="tree1">';
        foreach ($apps as $app) {
            $html .= '
      <li><a href="#" style="cursor:pointer;">'.$app->collection_name.'</a>
        <ul>
      ';
            foreach ($app->items as $item) {
                //var_dump($item);
                if ($item->parrent_id == 0) {
                    $itemId = substr($item->ext_id, 4);
                    $html .= '<li><b style="display: inline; cursor:pointer;"
                   class="SUB-'.$item->ext_id."\"
                   onclick=\"SubOpenCol('".$item->ext_id."')\">+</b>

                <p style=\"display: inline; cursor:pointer;\"
                   onclick=\"OpenRequest('".$app->collection_id."','".$item->int_id."')\"
                   >".$item->name.'</p><ul id="'.$item->id.'"></ul></li>';
                } else {
                    if (! empty($item->name)) {
                        $html .= '<ul class="child-tree" id="'.$item->parrent_id.'" >
                      <li class="COL-'.$item->parrent_id." \"
                     style=\"display: none; cursor:pointer;\"
                     onclick=\"OpenRequest('".$app->collection_id."','".$item->int_id."')\">&nbsp;-&nbsp;-&nbsp;".$item->name.'</li>
                     </ul>';
                    }
                }
                //var_dump($item);
            }
            $html .= '</ul></li>
      ';
        }

        return $html;
    }
}
