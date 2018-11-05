@extends('includes.theme')
@section('content')
<?php
use App\classes\UploadPostCol;
use App\classes\functions\createTable;
 ?>
<meta name="csrf-token" content="{{ csrf_token() }}" />

<div class="row" style="margin: 10px 0px;">
  <div class="col-md-6" style="background: #fff;">
    <h3>Upload Postman Collection </h3><hr />
    <form class="" action="{{URL::to('/collections/postman')}}" enctype="multipart/form-data" method="post">
      <input type="file" name="" value="">
      <input type="text" name="_token" value="{{ csrf_token() }}" style="display: none;" >
      <button type="submit" name="button">Submit</button>
    </form>
  </div>
  <div class="col-md-6" style="background: #fff;">
    <h3>Upload Postman Enviromment</h3><hr />
  </div>
</div>

@stop
