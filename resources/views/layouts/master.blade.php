<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>

    <body class="min-h-screen flex flex-col items-center bg-zinc-900">        

        @include('components.nav')         

        <div id="app" class="min-h-screen flex flex-col items-center p-5 w-full md:max-w-4xl ">

            <a href="{{ route('posts.index') }}" class="font-display text-gray-200 hover:text-orange-300 transition block mb-5 relative top-0 text-center font-bold tracking-wider text-8xl uppercase">Blog</a>
            
            <main class="w-full">
                @yield('content')
            </main>

            <flash-message text="{{ session('flash') }}"></flash-message>
            
        </div>

    </body>

</html>
