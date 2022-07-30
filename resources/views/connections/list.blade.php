@extends('layout.app', [
  'pagetitle'=> 'The Postier - Apps',
  'title'=> 'Apps',
  'sidebar' => true,
  'sideover' => false,
  'newButton' => "function()",
  'saveButton' => false,
  'cancelButton' => false
])

@section('sidebar')
  @include('apps.components.sidebar')
@endsection


@section('content')

@endsection
