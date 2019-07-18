<?php


foreach ($data as $request) {
  echo "
  <div class=\"panel panel-default\">
		<div class=\"panel-heading\">".$request->name."
			<span class=\"pull-right clickable panel-toggle panel-collapsed\"><em class=\"fal fa-caret-circle-down\"></em></span>
    </div>
		<div class=\"panel-body\" style=\"display: none;\">
      <div class=\"row\">
        <div class=\"collapse-container collapse in\" id=\"via-js\">
          <div class=\"col-xs-4\">
            <select class=\"http-method-select form-control postier-type-http\" name=\"\">
              <option selected=\"selected\" value=\"".$request->methode."\">".$request->methode."</option>
              <option value=\"GET\">GET</option>
              <option value=\"POST\">POST</option>
              <option value=\"PUT\">PUT</option>
              <option value=\"PATCH\">PATCH</option>
              <option value=\"DELETE\">DELETE</option>
              <option value=\"HEAD\">HEAD</option>
              <option value=\"OPTIONS\">OPTIONS</option>
            </select>
          </div>
          <div class=\"col-xs-8 input-group\">
            <input placeholder=\"URL\" value=\"".$request->url_raw."\" class=\"step-url form-control postier-url-".$request->id." urlParamField\" type=\"text\" name=\"\" aria-describedby=\"urlParamsOpen\" style=\"position: relative; top: -10px;\">
            <span class=\"input-group-addon btn-default\" id=\"urlParamsOpen\" style=\"position: relative; top: -10px;\">URL parameters</span>
          </div>
          <div class=\"urlParamsDiv\" style=\"display: none;\">
              <div class=\"col-xs-12 \">
                <div class=\"sublabel-left\"><a class=\"addURLParam\"> + Add URL Parameters  </a></div>
              </div>
              <div class=\"col-xs-6\">
                <div class=\"UrlKeys\"><input class=\"form-control urlParamField\"></div>
              </div>
              <div class=\"col-xs-6 input-group\">
                <div class=\"UrlValues\"><input class=\"form-control urlParamField\"></div>
              </div>
          </div>

          <div class=\"col-xs-12 \">
            <div class=\"sublabel-left\">Post Data</div>
              <textarea data-show-for=\"\" rows=\"5\" class=\"form-control input-group bodypost\" style=\"font-family: monospace;\" spellcheck=\"false\" name=\"\"></textarea>
            </div>
            <div class=\"col-xs-12\">
              <div class=\"sublabel-left\">Headers</div>
              <div class=\"http-request-header items\">
                <a class=\"http-request-header-add font-12\">+ Add Request Header</a>
              </div>
            </div>
            <div class=\"col-xs-5 header-key\">

            </div>
            <div class=\"col-xs-1 header-equal text-center\">

            </div>
            <div class=\"col-xs-6 header-value\">

            </div>
            <div class=\"col-sm-12\">
              <a class=\"http-request-send font-12 btn btn-default\" id=\"".$request->id."\">Send</a>
              <button class=\"btn btn-default\" id=\"collapse-btn-".$request->id."\">Collapse</button>
              <button class=\"btn btn-default\" id=\"expand-btn-".$request->id."\">Expand</button>
              <div id=\"json-".$request->id."\">
              </div>
          </div>
        </div>
      </div>
		</div>
	</div>
  ";
}
//var_dump($data);
?>
<form id="signup-form" action="index.html" method="post">
  {!! csrf_field() !!}
</form>
<script src="/js/postier/connection.js"></script>

<script>



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
