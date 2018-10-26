@extends('includes.theme')
@section('content')
<?php
  use App\classes\GetApps;
?>
  <a href="/collections/new"><button class="btn btn-success">New</button></a><hr />
  <div class="row row-eq-height" style="margin: 0px;">
    <div class="col-md-3 col-xs-12" style="background: #fff; display: inline-block;">
      <?php
        $apps = GetApps::getAllApps();
        $appsHtml = GetApps::getAllAppsHtml($apps);
        echo $appsHtml;
      ?>
    </div>
    <div class="col-md-9" style="background: #fff; border-left: 2px solid #f2f4f7;">
      <div id="requests">

      </div>
    </div>
  </div>

  <script type="text/javascript" src="/js/apps.js"></script>

@stop
