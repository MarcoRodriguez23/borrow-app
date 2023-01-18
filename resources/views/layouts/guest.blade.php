<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
      @include('layouts.navg')
      <div class="min-h-screen md:grid md:grid-cols-2 justify-evenly items-center pt-6 sm:pt-0 bg-gray-100">
          <div>
              <img class="h-48 md:h-screen w-full object-cover" src="{{asset('img/login.jpg')}}" alt="img login">
          </div>

          <div class="w-full sm:max-w-md mx-auto mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
              {{ $slot }}
          </div>
      </div>
      @include('layouts.footer')
    </body>
</html>
