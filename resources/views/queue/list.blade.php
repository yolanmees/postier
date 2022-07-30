@extends('layout.app', [
  'pagetitle'=> 'Queue - Postier',
  'title'=> 'Queue',
  'sidebar' => true,
  'sideover' => false,
  'newButton' => "queue.new",
  'saveButton' => false,
  'cancelButton' => false
])

@section('sidebar')
  @include('queue.components.sidebar')
@endsection


@section('content')

@endsection
