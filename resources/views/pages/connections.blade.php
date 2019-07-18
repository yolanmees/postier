@extends('includes.theme')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default articles">
      <div class="panel-heading">
      List
        <ul class="pull-right panel-settings panel-button-tab-right">
          <li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#"><em class="fa fa-cogs"></em></a>
            <ul class="dropdown-menu dropdown-menu-right">
              <li>
                <ul class="dropdown-settings">
                  <li><a href="#"><em class="fa fa-cogs"></em> Settings</a></li>
                  <li class="divider"></li>
                  <li><a href="#"><em class="fa fa-edit"></em> Edit</a></li>
                </ul>
              </li>
            </ul>
          </li>
        </ul>
        <ul class="pull-right panel-settings panel-button-tab-right">
          <li class="dropdown"><a class="pull-right" href="/connections/new"><em class="fa fa-plus"></em></a></li>
        </ul>
      <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-on"></em></span></div>
      <div class="panel-body articles-container">
        <div class="article border-bottom">
          <div class="col-xs-12">
            <div class="row">
              <?php
                $apps = DB::table('apps')->get();
              ?>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    foreach ($apps as $app) {
                        echo "
                        <tr>
                          <th scope=\"row\"><h4>".$app->app_id."</h4></th>
                          <td><h4>".$app->app_name."</h4></td>
                          <td><h5>".$app->description."</h5></td>
                          <td><a href=\"/connections/".$app->app_id."\"><em class=\"fa fa-edit\"></em> Edit</a></td>
                        </tr>
                        ";
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="clear"></div>
        </div><!--End .article-->
      </div>
    </div><!--End .articles-->
  </div>
</div>






@stop
