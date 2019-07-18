<?php
$collections = DB::table('collection')->get();
$collection_cards = '';
foreach ($collections as $collection) {

  $collection_cards .= "<div class=\"card cards-collections\" id=\"card-".$collection->id."\" style=\"width: 18rem;\">
                          <!-- <img class=\"card-img-top\" src=\"https://upload.wikimedia.org/wikipedia/commons/2/27/Square_200x200.svg\" alt=\"Card image cap\"> -->
                          <div class=\"card-body\">
                            <h5 class=\"card-title\">".$collection->name."</h5>
                            <p class=\"card-text\">".$collection->description."</p><br/></br/>
                            <a href=\"#\" class=\"btn btn-primary\" onclick=\"selectCollection(".$collection->id.")\" style=\"float: bottom; position: absolute; bottom: 10px;\">Select</a>
                          </div>
                        </div>";
}

 ?>
 <div class="panel panel-container">
   <div class="panel-body">
     <center>
       <button id="newStep" type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Add step</button>
     </center><br />
   </div>
 </div>
 <div class="modal fade" id="exampleModalCenter" tabindex="-1"  role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalCenterTitle">Add step</h5>
         <button type="button" class="close" onclick="closeNewStep()" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <div class="row collection-row">
           <div class="col-md-12 ">
             @include('search.search')
           </div>
             <div class="card-deck" style="padding: 15px;">
               <?php echo $collection_cards; ?>

             </div>
         </div>
         <div class="row request-row" style="display:none;">

         </div>
       </div>
     <div class="modal-footer">
       <button type="button" id="close" class="btn btn-secondary" data-dismiss="modal">Close</button>
       <button type="button" class="btn btn-primary" disabled>Select</button>
     </div>
   </div>
 </div>
</div>
<script>
function selectCollection(id){
  $('.collection-row').hide();
  $('.request-row').show();
  $.ajax({
    type : 'get',
    url : '{{URL::to('/workflows/find/requests')}}',
    data:{'id': id},
    success:function(data){
      $('.request-row').html(data);
    }
  });
}





$('.search-table').hide()

$('#search').on('keyup',function(){
  $value=$(this).val();
  if($(this).val().length === 0 ){
    $('.search-table').hide()
  }else{
    $('.search-table').show()
  }

  $.ajax({
    type : 'get',
    url : '{{URL::to('search/collections')}}',
    data:{'search':$value},
    success:function(data){
      $('tbody').html(data);
    }
  });

})
</script>
