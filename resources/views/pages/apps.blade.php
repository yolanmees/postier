@extends('includes.theme')
@section('content')
<?php
  use App\classes\GetApps;
?>
  <div class="row row-eq-height" style="margin: 0px;">
    <div class="col-md-3 col-xs-12" style="background: #fff; display: inline-block;">
      <?php
      $apps = GetApps::getAllApps();
      foreach ($apps as $app) {
        echo "
        <h5 style=\"cursor:pointer;\" class=\"app-".$app->collection_id."\" onclick=\"OpenCol(".$app->collection_id.")\">".$app->collection_name."</h5>
        <div class=\"collection-".$app->collection_id."\" style=\"display:none;\">
          <div style=\"display: inline;\">
        ";
        foreach ($app->items as $item) {
          //var_dump($item);
          if($item->parrent_id == 0){
            $itemId = substr($item->ext_id, 4);
            echo "<b style=\"display: inline; cursor:pointer;\"
                     class=\"SUB-".$item->ext_id."\"
                     onclick=\"SubOpenCol('".$item->ext_id."')\">+</b>

                  <p style=\"display: inline; cursor:pointer;\"
                     onclick=\"OpenRequest('".$app->collection_id."','".$item->int_id."')\"
                     >".$item->name."</p><br/>";
          }else{
            if(!empty($item->name)){
              echo "<p class=\"COL-".$item->parrent_id."\"
                       style=\"display: none; cursor:pointer;\"
                       onclick=\"OpenRequest('".$app->collection_id."','".$item->int_id."')\">&nbsp;-&nbsp;-&nbsp;".$item->name."</p>";

            }
          }
          //var_dump($item);
        }
        echo "</div>
        </div>";
      }

      ?>
    </div>
    <div class="col-md-9" style="background: #fff; border-left: 2px solid #f2f4f7;">
      <div id="requests">

      </div>
    </div>
  </div>




<script>
  function OpenRequest(AppId, ColId){
    $.ajax({
      url: "/apps/getApps/ByCol/"+AppId+"/"+ColId
    }).done(function(data) { // data what is sent back by the php page
      $('#requests').html(data); // display data
    });
  }




  function OpenCol(id){
    $('.collection-' + id).show();
    $('.app-' + id).attr('onclick', 'CloseCol(' + id + ')');
  }
  function CloseCol(id){
    $('.collection-' + id).hide();
    $('.app-' + id).attr('onclick', 'OpenCol(' + id + ')');
  }
  function SubOpenCol(id){
    $('.' + id).show();
    $('.SUB-' + id).attr('onclick', 'SubCloseCol(\'' + id + '\')');
    $('.SUB-' + id).text('-');
  }
  function SubCloseCol(id){
    $('.' + id).hide();
    $('.SUB-' + id).attr('onclick', 'SubOpenCol(\'' + id + '\')');
    $('.SUB-' + id).text('+');
  }
</script>

@stop
