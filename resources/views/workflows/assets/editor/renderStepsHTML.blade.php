<meta name="csrf-token" content="{{ csrf_token() }}">
<?php
$use = "App\classes\Formatters\\$vendor\\$app\model\steps\\$step";
$class = new $use();

echo $class::renderHTML();


?>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script type="text/javascript">
$('#testButton').click(function() {
  var testJson = $('#testJson').text()
  console.log(testJson);
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  $.post( "/workflows/test", {_token: "{{ csrf_token() }}", data: testJson}).done(function( data ) {
    console.log(data);
    $("#testArea").html(data);
  });
  // $.ajax({
  //     type: 'POST',
  //     url: '/workflows/test',
  //     success: function(data)
  //     {
  //         console.log(data);
  //         $("#testArea").html(data);
  //     }
  // });

});

</script>
