@extends('includes.theme')
@section('content')
<?php
$logs = DB::table('logs_requests')->orderBy('id', 'desc')->paginate(25);
?>
<div class="panel panel-default">
	<div class="panel-body btn-margins">
		<div class="col-md-12">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Methode</th>
            <th>Status</th>
						<th>URL</th>
						<th>Response</th>
					</tr>
				</thead>
				<tbody>
					@foreach($logs as $log)
            <tr>
  						<td>{{ $log->id }}</td>
              <td>{{ $log->methode }}</td>
  						<td>{{ $log->Status }}</td>
  						<td>{{ $log->URL }}</td>
  						<td>{{ str_limit($log->Response, 50) }}...</td>
            </tr>
          @endforeach
				</tbody>
			</table>

      {{ $logs->links() }}
		</div>
	</div>
</div>
@stop
