@extends('layout.app', [
  'pagetitle'=> 'The Postier - Apps',
  'title'=> 'Apps',
  'sidebar' => false,
  'sideover' => false,
  'newButton' => false,
  'saveButton' => true,
  'cancelButton' => true
])

@section('sidebar')
  @include('apps.components.sidebar')
@endsection


@section('content')
  <form action="#" method="POST">
   <div class="shadow sm:rounded-md sm:overflow-hidden">
     <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
       <div class="flex">
         <a href="{{ route('marketplace.home') }}" class="w-1/3 border border-gray-300 h-32 text-center mx-2">
           Install Community App
         </a>

         <a href="{{ route('apps.add') }}" class="w-1/3 border border-gray-300 h-32 text-center mx-2">
           Create Private App
         </a>

         <a href="{{ route('apps.import') }}" class="w-1/3 border border-gray-300 h-32 text-center mx-2">
           Import An App
         </a>

       </div>
     </div>
   </div>
 </form>
@endsection
