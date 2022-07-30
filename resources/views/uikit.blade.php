@extends('layout.app', [
  'pagetitle'=> 'The Postier - UiKit',
  'title'=> 'UiKit',
  'sidebar' => true,
  'sideover' => false,
  'newButton' => "function()",
  'saveButton' => false,
  'cancelButton' => "fun"
])

@section('sidebar')
    <div class="min-w-max	">
      This is the side content.
    </div>
@endsection


@section('content')

@endsection
