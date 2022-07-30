@extends('layout.app', [
  'pagetitle'=> 'The Postier - Apps',
  'title'=> 'Apps',
  'sidebar' => true,
  'sideover' => false,
  'newButton' => false,
  'saveButton' => true,
  'cancelButton' => true
])

@section('sidebar')
  @include('apps.components.sidebar')
@endsection


@section('content')

@endsection
