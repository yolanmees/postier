<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $pagetitle ?? 'Postier'}}</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="//unpkg.com/alpinejs" defer></script>

    </head>
    <body class="min-h-screen	h-full">

      <div class="flex w-full min-h-screen overflow-x-hidden">
        @include('layout.components.sidenav')

        @if ($sidebar)

          <div class="bg-gray-200 w-96 p-4">
              @yield('sidebar')
          </div>
        @endif

        @include('layout.components.topnav')

        @include('layout.components.sideover')



      </div>


    </body>
</html>
