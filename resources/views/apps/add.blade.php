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
       <div class="grid grid-cols-3 gap-6">
         <div class="col-span-3 sm:col-span-2">
           <label for="company-website" class="block text-sm font-medium text-gray-700"> Name </label>
           <div class="mt-1 flex rounded-md shadow-sm">
             <input type="text" name="company-website" id="company-website" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" placeholder="Name your app..">
           </div>
         </div>
       </div>
       <div>
         <label for="about" class="block text-sm font-medium text-gray-700"> Description </label>
         <div class="mt-1">
           <textarea id="about" name="about" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="tell us a bit about the app..."></textarea>
         </div>
       </div>

     </div>
   </div>
 </form>
@endsection
