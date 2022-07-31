@extends('layout.app', [
  'pagetitle'=> 'The Postier - Apps',
  'title'=> 'Apps',
  'sidebar' => false,
  'sideover' => false,
  'newButton' => "apps.new",
  'saveButton' => false,
  'cancelButton' => false
])

@section('sidebar')
  @include('apps.components.sidebar')
@endsection


@section('content')

@if ($apps)

<div class="overflow-x-auto relative shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Title
                </th>
                <th scope="col" class="py-3 px-6">
                    Descriptiom
                </th>
                <th scope="col" class="py-3 px-6">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
        </thead>
        <tbody>
          @foreach ($apps as $app)

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $app->app_title }}
                </th>
                <td class="py-4 px-6">
                    {{ $app->app_description}}
                </td>
                <td class="py-4 px-6 text-right">
                    <a href="/apps/{{ $app->id }}/edit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
          @endforeach

        </tbody>
    </table>
</div>

@endif

@endsection
