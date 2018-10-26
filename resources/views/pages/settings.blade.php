@extends('includes.theme')
@section('content')
<?php
use App\classes\UsersAndRoles;
 ?>
  <div class="panel panel-default">
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
    			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget rutrum purus. Donec hendrerit ante ac metus sagittis elementum. Mauris feugiat nisl sit amet neque luctus, a tincidunt odio auctor.</p>
    		</div>
    	</div>
    </div>
  </div>
@stop
