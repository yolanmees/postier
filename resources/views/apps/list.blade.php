@extends('layout.app', [
  'pagetitle'=> 'The Postier - Apps',
  'title'=> 'Apps',
  'sidebar' => false,
  'sideover' => false,
  'newButton' => "apps.new",
  'saveButton' => false,
  'cancelButton' => false
])

@section('sidebar')
  @include('apps.components.sidebar')
@endsection


@section('content')

@endsection
