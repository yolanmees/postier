@extends('includes.theme')
@section('content')
<?php
use App\classes\UsersAndRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
$user = auth()->user();
?>



<div class="row">
  <div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">Roles and permissions
				<span class="pull-right clickable panel-toggle"><em class="fal fa-eye-slash"></em></span></div>
			<div class="panel-body">
				<p>Role:</p>
        <select class="form-control" type="text" name="role">
          <option value="<?php echo $user->getRoleNames()[0]; ?>"><?php echo $user->getRoleNames()[0]; ?></option>
        </select>
			</div>
		</div>
  </div>
</div>





@stop
