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
			<div class="panel-heading">User settings
				<span class="pull-right clickable panel-toggle"><em class="fal fa-eye-slash"></em></span></div>
			<div class="panel-body">
				<p>Name:</p>
        <input class="form-control" type="text" name="role" value="<?php echo $user->name; ?>"><hr/>
        <p>Email:</p>
        <input class="form-control" type="text" name="role" value="<?php echo $user->email; ?>">
			</div>
		</div>
  </div>
</div>



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





  <!-- <div class="panel panel-default">
    <div class="panel-body tabs">
    	<ul class="nav nav-tabs">
    		<li class="active"><a href="#tab1" data-toggle="tab">My account</a></li>
    		<li><a href="#tab2" data-toggle="tab">Users and roles</a></li>
    		<li><a href="#tab3" data-toggle="tab">Settings</a></li>
    	</ul>
    	<div class="tab-content">
    		<div class="tab-pane fade in active" id="tab1">
    			<h4>My account</h4>
    			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget rutrum purus. Donec hendrerit ante ac metus sagittis elementum. Mauris feugiat nisl sit amet neque luctus, a tincidunt odio auctor.</p>
    		</div>
    		<div class="tab-pane fade" id="tab2">
          <div class="panel-body tabs">
							<ul class="nav nav-pills">
								<li class="active"><a href="#pilltab1" data-toggle="tab">Users</a></li>
								<li><a href="#pilltab2" data-toggle="tab">Roles</a></li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane fade in active" id="pilltab1">
									<h4>Users</h4>
                  <div class="col-md-12">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Role</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php echo UsersAndRoles::getAllUsersWithRole(); ?>
                      </tbody>
                    </table>
                  </div>
                </div>
								<div class="tab-pane fade" id="pilltab2">
									<h4>Roles</h4>
                  <div class="col-md-12">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php echo UsersAndRoles::getAllRoles(); ?>
                      </tbody>
                    </table>
                  </div>

							</div>
						</div>
    		</div>
    		<div class="tab-pane fade" id="tab3">
    			<h4>Settings</h4>
    			<p>Role:</p>
          <?php //echo $user->getRoleNames(); ?>
    		</div>
    	</div>
    </div>
  </div> -->
@stop
