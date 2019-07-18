@extends('includes.theme')
@section('content')
<?php
use App\classes\UploadPostCol;
use App\classes\functions\createTable;
 ?>
<meta name="csrf-token" content="{{ csrf_token() }}" />

<div class="row" style="margin: 10px 0px;">
  <div class="col-md-6" style="background: #fff;">
    <h3>Create Collection from Postman</h3><hr />
  </div>
  <div class="col-md-6" style="background: #fff;">
    <h3>Create new collection</h3><hr />
  </div>
  <div class="col-md-12" style="background: #fff;">
    <div class="row" style="margin: 10px;">
      <button class="btn btn-success postCollection">Collection</button>&nbsp;
      <button class="btn btn-warning postCol">Collection items</button>&nbsp;
      <button class="btn btn-warning postRequest">Requests</button>&nbsp;
      <button class="btn btn-warning postHeaders">Headers</button>&nbsp;
      <button class="btn btn-warning postEnv">Enviromment</button>&nbsp;
      <div class="col-md-12">
        <h2>Environment</h2>
        <table class="table table-hover">
         <thead>
           <tr>
             <th>key</th>
             <th>value</th>
           </tr>
         </thead>
         <tbody>
           <?php
             $col_item['env'] = [];
             $env = json_decode(file_get_contents('files/PhoneNumberApi.postman_environment.json'));
             //var_dump($env->values);
             $i = 0;
             foreach ($env->values as $value) {
               $col_item['env'][$i]['key'] = $value->key;
               $col_item['env'][$i]['value'] = $value->value;
               echo "<tr><td>".$value->key."</td><td>".$value->value."</td></tr>";
               $i++;
             }
            ?>
         </tbody>
       </table>
      </div>


        <div class="panel panel-default">
          <?php
            $json = json_decode(file_get_contents('files/PhoneNumberApi.postman_collection.json'));

            $col_item['id'] = 0;
            $col_item['info'] = [];
            $col_item['col'] = [];
            $col_item['request'] = [];
            $col_item['headers'] = [];
            $parentID = 0;
            $colID = 0;

            if($json->info){
              $col_item['info']['name'] = $json->info->name;
              $col_item['info']['description'] = $json->info->description;
            }

            function getItem($items, $col_item, $parentID, $colID){
              $requestCount = 0;
              $colCount = 0;
              $thisParent = $parentID;


              foreach ($items as $item) {
                if(!empty($item->item)){
                  $colID++;
                  $description = $item->description ?? '';
                  $col_item['id'] = $colID;
                  $col_item['col'][$colID]['id'] = $colID;
                  $col_item['col'][$colID]['col_id'] = "COL-".$colID;
                  $col_item['col'][$colID]['parent'] = $thisParent;
                  $col_item['col'][$colID]['name'] = $item->name;
                  $col_item['col'][$colID]['description'] = $description;
                  $col_item = array_merge($col_item, getItem($item->item, $col_item, $colID, $colID));
                  $colID = $col_item['id'];
                }else{
                  $colID++;
                  //var_dump($item);
                  $description = $item->request->description ?? '';
                  //$col_item['request'][$requestCount] = '';
                  $col_item['id'] = $colID;
                  $col_item['request'][$colID]['id'] = $colID;
                  $col_item['request'][$colID]['request_id'] = "REQUEST-".$colID;
                  $col_item['request'][$colID]['id'] = $colID;
                  $col_item['request'][$colID]['parent'] = $thisParent;
                  $col_item['request'][$colID]['name'] = $item->name;
                  $col_item['request'][$colID]['description'] = $description;
                  $col_item['request'][$colID]['methode'] = $item->request->method;
                  $col_item['request'][$colID]['url'] = $item->request->url->raw;
                  $col_item['request'][$colID]['url_protocol'] = $item->request->url->protocol;
                  $col_item['headers'] = array_merge($col_item['headers'], getHeader($item->request->header, "REQUEST-".$colID));
                }

              }
              return $col_item;
            }

            function getHeader($headers, $requestID)
            {
              if(!empty($headers)){
                //var_dump($headers);
                $col_item['headers'][$requestID]['request_id'] = $requestID;
                $col_item['headers'][$requestID]['key'] = $headers[0]->key;
                $col_item['headers'][$requestID]['value'] = $headers[0]->value;
                return $col_item['headers'];
              }else{
                $col_item['headers'] = [];
                return $col_item['headers'];
              }

            }

            $col_item = array_merge($col_item, getItem($json->item, $col_item, $parentID, $colID));
           ?>
           <h1>Collection</h1>
           <table class="table table-hover">
      			<thead>
      				<tr>
      					<th>name</th>
      					<th>description</th>
      				</tr>
      			</thead>
      			<tbody>
      				<tr>
      					<td><?php echo $json->info->name; ?></td>
      					<td><?php echo $json->info->description; ?></td>
      				</tr>
      			</tbody>
      		</table>
          <h1>Collection Item</h1>
          <table class="table table-hover">
           <thead>
             <tr>
               <th>id</th>
               <th>parrent_id</th>
               <th>name</th>
               <th>description</th>
             </tr>
           </thead>
           <tbody>
             <?php //echo $col_item['col'];
             foreach ($col_item['col'] as $col) {
               echo "
                 <tr>
                   <td>".$col['id']."</td>
                   <td>".$col['parent']."</td>
                   <td>".$col['name']."</td>
                   <td>".$col['description']."</td>
                 </tr>
               ";
             }

             ?>
           </tbody>
          </table>
          <h1>Requests</h1>
          <table class="table table-hover">
           <thead>
             <tr>
               <th>id</th>
               <th>request_id</th>
               <th>parrent_id</th>
               <th>name</th>
               <th>description</th>
               <th>method</th>
               <th>url</th>
             </tr>
           </thead>
           <tbody>
             <?php //echo $col_item['request'];
             foreach ($col_item['request'] as $request) {
               echo "
                 <tr>
                   <td>".$request['id']."</td>
                   <td>".$request['request_id']."</td>
                   <td>".$request['parent']."</td>
                   <td>".$request['name']."</td>
                   <td>".$request['description']."</td>
                   <td>".$request['methode']."</td>
                   <td>".$request['url']."</td>
                 </tr>
               ";
             }

             ?>
           </tbody>
          </table>
          <?php
            //var_dump($col_item);
           ?>
        </div>
      <div class="writeinfo"></div>
    </div>
  </div>
</div>
<?php //$row = createTable::transformToRow($col_item['request']);   ?>
<?php //echo createTable::createBasicTable(array('name', 'description'), array($row));   ?>


<script>

        $(document).ready(function(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $(".postCollection").click(function(){
                $.ajax({
                    url: '/collection/save/collection', type: 'POST', dataType: 'JSON',
                    data: {_token: CSRF_TOKEN, message:$(".getinfo").val(), data: <?php echo json_encode($col_item['info']); ?> },
                    success: function (data) {
                       console.log(data);
                        $(".writeinfo").text(data.msg);
                        $.ajax({
                            url: '/collection/save/col',type: 'POST', dataType: 'JSON',
                            data: {_token: CSRF_TOKEN, message:$(".getinfo").val(), id_col: data, data: <?php echo json_encode($col_item['col']); ?>}
                        });
                        $.ajax({
                            url: '/collection/save/request', type: 'POST', dataType: 'JSON'
                            data: {_token: CSRF_TOKEN, message:$(".getinfo").val(), id_col: data, data: <?php echo json_encode($col_item['request']); ?>}
                        });
                        $.ajax({
                            url: '/collection/save/headers', type: 'POST', dataType: 'JSON'
                            data: {_token: CSRF_TOKEN, message:$(".getinfo").val(), id_col: data, data: <?php echo json_encode($col_item['headers']); ?>}
                        });
                        $.ajax({
                            url: '/collection/save/env', type: 'POST', dataType: 'JSON'
                            data: {_token: CSRF_TOKEN, message:$(".getinfo").val(), id_col: data, data: <?php echo json_encode($col_item['env']); ?>}
                        });
                    }
                });
            });
        });


   $(document).ready(function(){
       var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
       $(".postCol").click(function(){
           $.ajax({
               url: '/collection/save/col', type: 'POST',  dataType: 'JSON',
               data: {_token: CSRF_TOKEN, message:$(".getinfo").val(), data: <?php echo json_encode($col_item['col']); ?>, id_col: 1 },
               dataType: 'JSON',
               success: function (data) {
                  console.log(data);
                   $(".writeinfo").text(data.msg);
               }
           });
       });
  });

  $(document).ready(function(){
      var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      $(".postRequest").click(function(){
          $.ajax({
              url: '/collection/save/request',  type: 'POST',  dataType: 'JSON',
              data: {_token: CSRF_TOKEN, message:$(".getinfo").val(), id_col: 2 , data: <?php echo json_encode($col_item['request']); ?>, id_col: 2  },
              dataType: 'JSON',
              success: function (data) {
                 console.log(data);
                  $(".writeinfo").text(data);
              }
          });
      });
 });
 $(document).ready(function(){
     var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
     $(".postHeaders").click(function(){
         $.ajax({
             url: '/collection/save/headers',  type: 'POST',  dataType: 'JSON',
             data: {_token: CSRF_TOKEN, message:$(".getinfo").val(), id_col: 2  , data: <?php echo json_encode($col_item['headers']); ?>},
             dataType: 'JSON',
             success: function (data) {
                console.log(data);
                 $(".writeinfo").text(data);
             }
         });
     });
});

$(document).ready(function(){
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(".postEnv").click(function(){
        $.ajax({
            url: '/collection/save/env',  type: 'POST',  dataType: 'JSON',
            data: {_token: CSRF_TOKEN, message:$(".getinfo").val(), id_col: 3  , data: <?php echo json_encode($col_item['env']); ?>},
            success: function (data) {
               console.log(data);
                $(".writeinfo").text(data);
            }
        });
    });
});
</script>


@stop
