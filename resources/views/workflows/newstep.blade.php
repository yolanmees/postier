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
<script>
function selectCollection(id){
  $('.collection-row').hide();
  $('.request-row').show();
  $.ajax({
    type : 'get',
    url : '{{URL::to('/workflows/finde/requests')}}',
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
