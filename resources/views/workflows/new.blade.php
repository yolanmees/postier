@extends('includes.theme')
@section('content')
<?php if (empty($_GET)){ ?>
<div class="panel panel-container">
  <div class="container">
    <form class="" action="{{URL::to('/workflows/create/initWorkflowDB')}}" method="post">
      @csrf
      <h3>How do you want to call this workflow?</h3>
      <input class="form-control" type="text" name="name" value="" placeholder="Workflow Name"><br />
      <h3>When do you want this workflow to run?</h3>
      <select class="form-control" name="when" id="WhenToRun">
        <option value="everyMinute">Every minute</option>
        <option value="everyFiveMinutes">Every five minutes</option>
        <option value="everyTenMinutes">Every ten minutes</option>
        <option value="everyThirtyMinutes">Every thirty minutes</option>
        <option value="hourly">Hourly</option>
        <option value="daily">Daily (Runs at midnight)</option>
        <option value="dailyAt">Daily at</option>
        <option value="weekly">Weekly</option>
        <option value="monthly">Monthly</option>
        <option value="yearly">Yearly</option>
        <option value="cron">('* * * * * *')</option>
      </select><br />
      <input name="when-2" id="when-2" class="form-control" style="display:none; margin-bottom: 5px;" />
      <button class="btn btn-success" type="submit" name="button">Next</button>
    </form><br />
  </div>
</div>
<script type="text/javascript">
$("#WhenToRun").on('change', function() {
  if($("#WhenToRun").val() == 'dailyAt' || $("#WhenToRun").val() == 'cron'){
    $("#when-2").show()
  }else {
    $("#when-2").hide()
  }
});

</script>
<?php }elseif ($_GET['s'] == '200' && isset($_GET['n'])){ ?>

<div class="panel panel-container">
  <div class="panel-body">
    <h3>Start workflow</h3><hr />
    <a href="/workflows/edit/<?php echo $_GET['n']; ?>"><button class="btn btn-primary" type="button" name="button">Start to build your workflow</button></a>
  </div>
</div>

<?php }elseif ($_GET['s'] == '500'){ ?>


<?php }else{
  echo '<meta http-equiv="refresh" content="0;url=/workflows/new" />';
} ?>
@stop
