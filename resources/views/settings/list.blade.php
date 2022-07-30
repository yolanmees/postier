@extends('layout.app', [
  'pagetitle'=> 'Settings - Postier',
  'title'=> 'Settings',
  'sidebar' => true,
  'sideover' => false,
  'newButton' => false,
  'saveButton' => false,
  'cancelButton' => false
])

@section('sidebar')
  @include('settings.components.sidebar')
@endsection


@section('content')

@endsection
