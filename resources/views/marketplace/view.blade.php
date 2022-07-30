@extends('layout.app', [
  'pagetitle'=> 'The Postier - Marketplace',
  'title'=> 'Marketplace',
  'sidebar' => false,
  'sideover' => false,
  'newButton' => false,
  'saveButton' => false,
  'cancelButton' => false
])

@section('sidebar')
  @include('apps.components.sidebar')
@endsection


@section('content')

@endsection
