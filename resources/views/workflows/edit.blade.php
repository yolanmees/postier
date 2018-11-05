@extends('includes.theme')
@section('content')
<div class="panel panel-container">
  <div class="panel-body">
    <div class="saved-steps">

    </div>
    <button id="newStep" type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Add step</button>
  </div>
</div>
<!-- NEW STEP -->
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
        @include('workflows.newstep')
      </div>
      <div class="modal-footer">
        <button type="button" id="close" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" disabled>Select</button>
      </div>
    </div>
  </div>
</div>
<?php //echo $id; ?>
<script>
  $.ajax({
    type : 'get',
    url : '{{URL::to('/workflows/edit/load/')}}' + '/{{ $id }}',
    success:function(data){
      $('.saved-steps').html(data);
    }
  });

  $('#newStep').click(function(){
   openNewStep()
  });
  function openNewStep(){
    $('#exampleModalCenter').addClass('show');
    $('#exampleModalCenter').removeClass('fade');
    $('#exampleModalCenter').show()
  }
  function closeNewStep(){
    $('#exampleModalCenter').addClass('fade');
    $('#exampleModalCenter').removeClass('show');
    $('#exampleModalCenter').hide()
    $('.collection-row').show();
    $('.request-row').hide();
  }
  $('#close').click(function(){
   closeNewStep()
  });

</script>
@stop
