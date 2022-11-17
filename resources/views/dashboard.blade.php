@extends('layout.app', [
  'pagetitle'=> 'Dashboard - Postier',
  'title'=> 'Dashboard',
  'sidebar' => false,
  'sideover' => false,
  'newButton' => false,
  'saveButton' => false,
  'cancelButton' => false
])

@section('sidebar')
    <div class="min-w-max	">
      This is the side content.
    </div>
@endsection


@section('content')

@endsection
