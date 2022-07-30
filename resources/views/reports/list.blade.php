@extends('layout.app', [
  'pagetitle'=> 'Reports - Postier',
  'title'=> 'Reports',
  'sidebar' => true,
  'sideover' => false,
  'newButton' => "reports.new",
  'saveButton' => false,
  'cancelButton' => false
])

@section('sidebar')
  @include('reports.components.sidebar')
@endsection


@section('content')

@endsection
