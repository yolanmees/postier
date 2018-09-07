var headerCount = 0;
$( ".http-request-header-add" ).click(function() {
  var headerKey = $( ".header-key" );
    var headerKeyInput = document.createElement("input");
    $(headerKeyInput).attr({
      class: "form-control",
      name: "headerKeyvalue-" + headerCount,
      style: "margin-top: 10px;"
    });
    headerKey.append(headerKeyInput);

  var headerEqual = $( ".header-equal" );
    var headerEqualSpan = document.createElement("span");
    $(headerEqualSpan).attr({
      class: "fa fa-equals fa-2x",
      style: "margin-top: 10px;"
    });
    var headerEqualbr = document.createElement("br");
    headerEqual.append(headerEqualSpan);
    headerEqual.append(headerEqualbr);
  var headerValue = $( ".header-value" );
    var headerValueInput = document.createElement("input");
    $(headerValueInput).attr({
      class: "form-control",
      name: "headerValuevalue-" + headerCount,
      style: "margin-top: 10px;"
    });
    headerValue.append(headerValueInput);
    headerCount++;
});

/*******************
|| URL PARAMETERS ||
*******************/

var urlparamopen = 0;
$( "#urlParamsOpen" ).click(function() {
  if (urlparamopen == 0) {
    $( ".urlParamsDiv" ).show( "slow", function() {});
    urlparamopen = 1;
  }else{
    $( ".urlParamsDiv" ).hide( "slow", function() {});
    urlparamopen = 0;
  }
});

var urlparamcount = 1;
$( ".addURLParam" ).click(function() {
  var headerKey = $( ".UrlKeys" );
    var headerKeyInput = document.createElement("input");
    $(headerKeyInput).attr({
      class: "form-control input-group urlParamField",
      name: "URLParamKey-" + headerCount,
      id: "URLParamKey-" + headerCount,
      style: "margin-top: 10px;"
    });
    headerKey.append(headerKeyInput);

  var headerValue = $( ".UrlValues" );
    var headerValueInput = document.createElement("input");
    $(headerValueInput).attr({
      class: "form-control input-group urlParamField",
      name: "URLParamValue-" + headerCount,
      id: "URLParamValue-" + headerCount,
      style: "margin-top: 10px;"
    });
    headerValue.append(headerValueInput);
    urlparamcount++;
});



$("body").on('change', '.urlParamField', function(){
  var url = $(".postier-url").val();
  var URLparameters = [];
  for (var i = 1; i < urlparamcount; i++) {
    URLparameters[i] = '';
    URLparameters[i]['key'] = $(".URLParamKey-" + i).val();
    URLparameters[i]['value'] = $(".URLParamValue-" + i).val();
  }
  console.log(URLparameters);
  var body = $(".bodypost");
  const encodeGetParams = p =>
  Object.entries(p).map(kv => kv.map(encodeURIComponent).join("=")).join("&");

  var urlstring = url + '/?' + encodeGetParams(URLparameters);

  body.text(urlstring);
});
