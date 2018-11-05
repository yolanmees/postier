@extends('includes.theme')
@section('content')
<?php
$workflows = DB::table('workflows')->get();
$rows = '';
foreach ($workflows as $workflow) {
  $rows .= "<tr>
              <td>".$workflow->id."</td>
              <td>".$workflow->name."</td>
              <td>".$workflow->triggerBy."</td>
              <td> </td>
              <td style=\"text-align: right;\"><button class=\"btn btn-success\">Rapport</button>&nbsp;<button class=\"btn btn-warning\">Edit</button>&nbsp;<button class=\"btn btn-dark\">Queu</button></td>
            </tr>";
}
?>
<a href="/workflows/new"><button type="button" name="button" class="btn btn-success">New</button></a>
<div class="panel panel-container">
  <div class="panel-body">
    <h3>All workflow</h3>
      <table class="table table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Triggered by</th>
            <th>Last run</th>
            <th style="text-align: right;">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php echo $rows; ?>
        </tbody>
      </table>
  </div>
</div>

@stop
