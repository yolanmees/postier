@extends('layout.app', [
  'pagetitle'=> 'Workflows - postier',
  'title'=> 'Workflows',
  'sidebar' => false,
  'sideover' => false,
  'newButton' => false,
  'saveButton' => true,
  'cancelButton' => true
])

@section('sidebar')
  @include('workflows.components.sidebar')
@endsection


@section('content')
  <div class="w-full">
    <p class="text-gray-500">Custom Request</p>
  </div>
  <div class="shadow sm:rounded-md sm:overflow-hidden">
    <div class="flex bg-gray-300 w-full h-12">
      <div class="flex ">
        <div class="p-4 hover:bg-gray-100">
          HTTP
        </div>
        <div class="p-4 hover:bg-gray-100">
          Auth
        </div>
        <div class="p-4 hover:bg-gray-100">
          Headers
        </div>
        <div class="p-4 hover:bg-gray-100">
          Body
        </div>
      </div>

      <div class="flex justify-self-end">
        <div class="p-4 hover:bg-gray-100">
          Test
        </div>
      </div>
    </div>
    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
      <div class="col-span-3 sm:col-span-2">
        <label for="company-website" class="block text-sm font-medium text-gray-700"> URL </label>
        <div class="mt-1 flex rounded-md shadow-sm">
          <input type="text" name="company-website" id="company-website" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" placeholder="">
        </div>
      </div>
      <div>
        <label for="parameters" class="block text-sm font-medium text-gray-700"> Parameters </label>
        <label for="parameters" class="block text-xs font-medium text-gray-500"> Bulk edit </label>
        <div class="flex mt-1">
          <div class="w-1/2">
            <input type="text" name="company-website" id="parameters" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" placeholder="Key">
          </div>
          <div class="w-1/2 ml-4">
            <input type="text" name="company-website" id="parameters" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" placeholder="Value">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="flex w-full m-4 justify-center">
    <div class="bg-gray-500 text-white rounded-full hover:bg-gray-600">
      <svg class="" style="width: 50px" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
    </div>
  </div>
  <div class="shadow sm:rounded-md sm:overflow-hidden">
    <div class="flex bg-gray-300 w-full h-12">
      <div class="p-4 hover:bg-gray-100">
        HTTP
      </div>
      <div class="p-4 hover:bg-gray-100">
        Auth
      </div>
      <div class="p-4 hover:bg-gray-100">
        Headers
      </div>
      <div class="p-4 hover:bg-gray-100">
        Body
      </div>
    </div>
    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
      <div class="col-span-3 sm:col-span-2">
        <label for="company-website" class="block text-sm font-medium text-gray-700"> URL </label>
        <div class="mt-1 flex rounded-md shadow-sm">
          <input type="text" name="company-website" id="company-website" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" placeholder="">
        </div>
      </div>
      <div>
        <label for="parameters" class="block text-sm font-medium text-gray-700"> Parameters </label>
        <label for="parameters" class="block text-xs font-medium text-gray-500"> Bulk edit </label>
        <div class="flex mt-1">
          <div class="w-1/2">
            <input type="text" name="company-website" id="parameters" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" placeholder="Key">
          </div>
          <div class="w-1/2 ml-4">
            <input type="text" name="company-website" id="parameters" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" placeholder="Value">
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
