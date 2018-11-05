@extends('includes.theme')
@section('content')
<?php
  use App\Http\Controllers\TestConnection;
?>

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default articles">
      <div class="panel-heading">
        <button class="btn btn-success btn-save">Save</button>
        <ul class="pull-right panel-settings panel-button-tab-right">
					<li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
						<em class="fa fa-cogs"></em>
					</a>
						<ul class="dropdown-menu dropdown-menu-right">
							<li>
                <ul class="dropdown-settings">
                  <li><a data-insert-step="before" href="#"><i class="fa fa-reply-all fa-rotate-90"></i> Insert Step Before</a></li>
                  <li><a data-insert-step="after" href="#"><i class="fa fa-reply-all fa-rotate-270"></i> Insert Step After</a></li>
                  <li><a data-move-step="up" href="#"><i class="fa fa-long-arrow-up"></i> Move Step Up</a></li>
                  <li><a data-move-step="down" href="#"><i class="fa fa-long-arrow-down"></i> Move Step Down</a></li>
                  <li><a class="duplicate-step" data-insert-step="before" href="#"><i class="fa fa-clone"></i> Duplicate Step</a></li>
                  <li><a class="step remove" href="#"><i class="fa fa-trash"></i> Remove Step</a></li>
                </ul>
							</li>
						</ul>
					</li>
				</ul>
        <ul class="pull-right panel-settings panel-button-tab-right">
          <li class="dropdown">
            <a class="pull-right dropdown-toggle" data-target="#via-js" data-toggle="collapse">
              <i class="fa fa-chevron-down"></i>
            </a>
          </li>
        </ul>
      </div>
      <div class="panel-body articles-container">
        <div class="controls">
          <div class="col-xs-12">
            <div class="row">
              <div class="col-sm-4" style="margin-top: 10px;">
                <select class="form-control" name="">
                  <option selected="selected" value="HttpRequestAction">Request</option>
                  <option value="AssertAction">Assert</option>
                  <option value="SaveVariableAction">Save</option>
                  <option value="ExtractAction">Extract</option>
                  <option value="JavascriptAction">JavaScript</option>
                </select>
              </div>
              <div class="col-xs-8 input-group">
                <input placeholder="Step Name" class="step-name form-control" type="text" name="" />
              </div>
              <div class="collapse-container collapse in" id="via-js">
                <div class="col-xs-4">
                  <select class="http-method-select form-control postier-type-http" name="">
                    <option selected="selected" value="GET">GET</option>
                    <option value="POST">POST</option>
                    <option value="PUT">PUT</option>
                    <option value="PATCH">PATCH</option>
                    <option value="DELETE">DELETE</option>
                    <option value="HEAD">HEAD</option>
                    <option value="OPTIONS">OPTIONS</option>
                  </select>
                </div>
                <div class="col-xs-8 input-group">
                  <input placeholder="URL" class="step-url form-control postier-url urlParamField" type="text" name="" aria-describedby="urlParamsOpen"/>
                  <span class="input-group-addon btn-default" id="urlParamsOpen">URL parameters</span>
                </div>
                <div class="urlParamsDiv" style="display: none;">
                    <div class="col-xs-12 ">
                      <div class="sublabel-left"><a class="addURLParam"> + Add URL Parameters  </a></div>
                    </div>
                    <div class="col-xs-6">
                      <div class="UrlKeys"><input class="form-control urlParamField" /></div>
                    </div>
                    <div class="col-xs-6 input-group">
                      <div class="UrlValues"><input class="form-control urlParamField"/></div>
                    </div>
                </div>







                <div class="col-xs-12 ">
                  <div class="sublabel-left">Post Data</div>
                  <textarea data-show-for="" rows="5" class="form-control input-group bodypost" style="font-family: monospace;" spellcheck="false" name=""></textarea>
                </div>
                <div class="col-xs-12">
                  <div class="sublabel-left">Headers</div>
                  <div class="http-request-header items">
                    <a class="http-request-header-add font-12">+ Add Request Header</a>
                  </div>
              </div>
              <div class="col-xs-5 header-key">

              </div>
              <div class="col-xs-1 header-equal text-center">

              </div>
              <div class="col-xs-6 header-value">

              </div>
              <div class="col-sm-12">
                <a class="http-request-send font-12 btn btn-default">Send</a>
                <button class="btn btn-default" id="collapse-btn">Collapse</button>
                <button class="btn btn-default" id="expand-btn">Expand</button>
                  <div id="json">

                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!--End .articles-->
  </div>
</div>
<form id="signup-form" action="index.html" method="post">
  {!! csrf_field() !!}
</form>
<script src="/js/postier/connection.js"></script>
<script>


$( ".http-request-send" ).click(function() {
  var postierurl = $('.postier-url').val();
  var postierTypeHttp = $('.postier-type-http').val();
  var postierBody = $('.postier-body').val();
  console.log(postierurl);

  $.ajax({
    headers: { 'X-CSRF-TOKEN': $('#signup-form > input[name="_token"]').val() },
    type: 'POST',
    url: '/testConnection',
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

          $("#json").JSONView(json);

          $("#json-collapsed").JSONView(json, { collapsed: true, nl2br: true, recursive_collapser: true });

          $('#collapse-btn').on('click', function() {
            $('#json').JSONView('collapse');
          });

          $('#expand-btn').on('click', function() {
            $('#json').JSONView('expand');
          });
        },
    error: function (data)
        {
        console.log('Error:', data);
        var json = JSON.stringify(data,null,4);

          $("#json").JSONView(json);

          $("#json-collapsed").JSONView(json, { collapsed: true, nl2br: true, recursive_collapser: true });

          $('#collapse-btn').on('click', function() {
            $('#json').JSONView('collapse');
          });

          $('#expand-btn').on('click', function() {
            $('#json').JSONView('expand');
          });
        }
    });
});

$( ".btn-save" ).click(function() {
  var postierurl = $('.postier-url').val();
  var postierTypeHttp = $('.postier-type-http').val();
  var postierBody = $('.postier-body').val();
$.ajax({
  headers: { 'X-CSRF-TOKEN': $('#signup-form > input[name="_token"]').val() },
  type: 'POST',
  url: '/saveConnection',
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
