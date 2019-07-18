@extends('includes.theme')
@section('content')


<!-- SAVED STEPS -->
@include('workflows.savedSteps')

<!-- NEW STEP -->
@include('workflows.newstep')
<form id="signup-form">
  {!! csrf_field() !!}
</form>
<?php //echo $id; ?>
<script type="text/javascript" src="/js/apps.js"></script>
<script>

  var ContentofDiv = $('#txtDiv').html();
  console.log(ContentofDiv);




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




  var header = { 'X-CSRF-TOKEN': $('#signup-form > input[name="_token"]').val() };

  $( ".http-request-send" ).click(function() {
    var id = $(this).attr('id');
    var postierurl = $('.postier-url-' + id).val();
    var postierTypeHttp = $('.postier-type-http').val();
    var postierBody = $('.postier-body').val();

    $.ajax({headers: header,type: 'POST', url: '/testConnection',
      data: {
        url: postierurl,
        typeHttp: postierTypeHttp,
        Body: postierBody
      },
      dataType: 'json',
      success: function (data)
          {
          console.log(data);
          var json = JSON.stringify(data,null,4);
          showJson(json, id)
          },
      error: function (data)
          {
          console.log('Error:', data.responseText);
          var json = JSON.stringify(data,null,4);
          showJson(json, id)
          }
      });
  });

  function showJson(json, id)
  {
    $("#json-" + id).JSONView(json);

    $("#json-collapsed").JSONView(json, { collapsed: true, nl2br: true, recursive_collapser: true });

    $('#collapse-btn-' + id).on('click', function() {
      $('#json-' + id).JSONView('collapse');
    });

    $('#expand-btn-' + id).on('click', function() {
      $('#json-' + id).JSONView('expand');
    });
  }


  $( ".btn-save" ).click(function() {
    var postierurl = $('.postier-url').val();
    var postierTypeHttp = $('.postier-type-http').val();
    var postierBody = $('.postier-body').val();
    $.ajax({headers: header, type: 'POST', url: '/saveConnection',
      data: {
        url: postierurl,
        typeHttp: postierTypeHttp
      },
    dataType: 'json',
    success: function (data)
        {
        console.log(data);
        var json = JSON.stringify(data,null,4);
        },
    error: function (data)
        {
        console.log('Error:', data.responseText);

        }
    });
  });

</script>
@stop
