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
  <form action="/apps/create" id="postierForm" method="POST">
    {{ csrf_field() }}
   <div class="shadow sm:rounded-md sm:overflow-hidden">
     <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
       <div class="grid grid-cols-3 gap-6">
         <div class="col-span-3">
           <label for="app_name" class="block text-sm font-medium text-gray-700"> Name </label>
           <div class="mt-1 flex rounded-md shadow-sm">
             <input type="text" name="app_name" id="app_name" value="{{ $app->app_title }}" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" placeholder="Name your app..">
           </div>
         </div>
       </div>
       <div>
         <label for="app_description"  class="block text-sm font-medium text-gray-700"> Description </label>
         <div class="mt-1">
           <textarea id="app_description" value="{{ $app->app_description }}" name="app_description" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="tell us a bit about the app...">{{ $app->app_description }}</textarea>
         </div>
       </div>

     </div>
   </div>

 <div>
     <div class="shadow sm:rounded-md sm:overflow-hidden my-4" x-data="{ auth: 'no' }">
         <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
             <h2 class="text-2xl font-semibold">Auth</h2>
             <label for="auth_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select an option</label>
             <select id="auth_type" x-model="auth"
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                 {{-- <option selected>Choose a Auth type</option> --}}
                 <option value="no" selected>No Auth</option>
                 <option value="api">Api key</option>
                 <option value="basic">Basic</option>
                 <option value="bearer">Bearer</option>
                 <option value="oauth">OAuth</option>
             </select>

             {{-- BASIC AUTH --}}
             <div class="" x-show="auth == 'api'">
               <div class="grid grid-cols-3 gap-6">
                   <div class="col-span-3">
                       <label for="api_key" class="block text-sm font-medium text-gray-700"> Api key </label>
                       <div class="mt-1 flex rounded-md shadow-sm">
                           <input type="text" name="api_key" id="api_key" wire:model="auth_type" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" placeholder="Api key">
                       </div>
                   </div>
               </div>
             </div>

             {{-- BASIC AUTH --}}
             <div class="" x-show="auth == 'basic'">
               <div class="grid grid-cols-3 gap-6">
                   <div class="col-span-3">
                       <label for="username" class="block text-sm font-medium text-gray-700"> Username </label>
                       <div class="mt-1 flex rounded-md shadow-sm">
                           <input type="text" name="username" id="username" wire:model="auth_type" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" placeholder="Username">
                       </div>
                   </div>
               </div>
               <div class="grid grid-cols-3 gap-6">
                   <div class="col-span-3">
                       <label for="password" class="block text-sm font-medium text-gray-700"> Password </label>
                       <div class="mt-1 flex rounded-md shadow-sm">
                           <input type="text" name="password" id="password" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" placeholder="Password">
                       </div>
                   </div>
               </div>
             </div>


             {{-- BEARER AUTH --}}
             <div class="" x-show="auth == 'bearer'">
               <div class="grid grid-cols-3 gap-6">
                   <div class="col-span-3">
                       <label for="bearer" class="block text-sm font-medium text-gray-700"> Bearer Token </label>
                       <div class="mt-1 flex rounded-md shadow-sm">
                           <input type="text" name="bearer" id="bearer" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" placeholder="Bearer Token">
                       </div>
                   </div>
               </div>
             </div>

             {{-- OAUTH --}}
             <div class="" x-show="auth == 'oauth'">
               <div class="grid grid-cols-3 gap-6">
                   <div class="col-span-3">
                       <label for="bearer" class="block text-sm font-medium text-gray-700"> Consumer key </label>
                       <div class="mt-1 flex rounded-md shadow-sm">
                           <input type="text" name="bearer" id="bearer" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" placeholder="Consumer key">
                       </div>
                   </div>
               </div>
               <div class="grid grid-cols-3 gap-6">
                   <div class="col-span-3">
                       <label for="bearer" class="block text-sm font-medium text-gray-700"> Consumer secret </label>
                       <div class="mt-1 flex rounded-md shadow-sm">
                           <input type="text" name="bearer" id="bearer" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" placeholder="Consumer secret">
                       </div>
                   </div>
               </div>
               <div class="grid grid-cols-3 gap-6">
                   <div class="col-span-3">
                       <label for="bearer" class="block text-sm font-medium text-gray-700"> Access Token </label>
                       <div class="mt-1 flex rounded-md shadow-sm">
                           <input type="text" name="bearer" id="bearer" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" placeholder="Access Token">
                       </div>
                   </div>
               </div>

               <div class="grid grid-cols-3 gap-6">
                   <div class="col-span-3">
                       <label for="bearer" class="block text-sm font-medium text-gray-700"> Token Secret </label>
                       <div class="mt-1 flex rounded-md shadow-sm">
                           <input type="text" name="bearer" id="bearer" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" placeholder="Token Secret">
                       </div>
                   </div>
               </div>
             </div>






         </div>
     </div>
 </div>


</form>

@endsection
