@extends('includes.theme')
@section('content')
<?php
  use App\classes\GetApps;
  $apps = GetApps::getAllCollections();
  //echo $apps;


  $html = '';
  foreach ($apps as $key => $app) {
    $html .= '<div class="col-md-12"><h3><span class="fal fa-folders">&nbsp;</span>&nbsp;';
      $html .= $app->collection_name;
    $html .= '</h3></div>';
    $html .= '<div class="col-md-12">';
      $subCollections = GetApps::getAllCollectionsHead($app->collection_id);
      $html .= collectionsToHtml($subCollections, $app->collection_id);
    $html .= '</div>';
  }
  function collectionsToHtml($subCollections, $collection){
    $html = '';
    foreach ($subCollections as $subCollection) {
      $html .= '<div class="col-md-12"><h4><span class="fal fa-folder">&nbsp;</span>&nbsp;';
      $subColl = GetApps::getSubCollectionsHead($subCollection->int_id, $collection);
      $html .= collectionsToHtml($subColl, $collection);
      $html .= $subCollection->name;
      $html .= '</h4></div>';
    }
    return $html;
  }

?>
<style>
  .tree, .tree ul {
      margin:0;
      padding:0;
      list-style:none
  }
  .tree ul {
      margin-left:1em;
      position:relative
  }
  .tree ul ul {
      margin-left:.5em
  }
  .tree ul:before {
      content:"";
      display:block;
      width:0;
      position:absolute;
      top:0;
      bottom:0;
      left:0;
      border-left:1px solid
  }
  .tree li {
      margin:0;
      padding:0 1em;
      line-height:2em;
      color:#369;
      font-weight:700;
      position:relative
  }
  .tree ul li:before {
      content:"";
      display:block;
      width:10px;
      height:0;
      border-top:1px solid;
      margin-top:-1px;
      position:absolute;
      top:1em;
      left:0
  }
  .tree ul li:last-child:before {
      background:#fff;
      height:auto;
      top:1em;
      bottom:0
  }
  .indicator {
      margin-right:5px;
  }
  .tree li a {
      text-decoration: none;
      color:#369;
  }
  .tree li button, .tree li button:active, .tree li button:focus {
      text-decoration: none;
      color:#369;
      border:none;
      background:transparent;
      margin:0px 0px 0px 0px;
      padding:0px 0px 0px 0px;
      outline: 0;
  }
</style>
  <a href="/collections/new"><button class="btn btn-success">New</button></a><hr />
  <div class="row row-eq-height" style="margin: 0px;">
    <div class="col-md-3 col-xs-12" style="background: #fff; display: inline-block;">
      <?php echo $html; ?>

    </div>
    <div class="col-md-9" style="background: #fff; border-left: 2px solid #f2f4f7;">
      <div id="requests">
      </div>
    </div>
  </div>

  <script type="text/javascript" src="/js/apps.js"></script>
@stop
