function OpenRequest(AppId, ColId){
  $.ajax({
    url: "/collections/getApps/ByCol/"+AppId+"/"+ColId
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
