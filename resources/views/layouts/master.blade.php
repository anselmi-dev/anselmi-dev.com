<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Quicksand:wght@300&display=swap" rel="stylesheet">
        {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"> --}}

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        
        @stack('styles')

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased on">

        @include('layouts.structure.loading')
        
        @isset($slot)
            {{ $slot }}
        @else
            @yield('content')
        @endisset

        @livewireScripts

        @stack('scripts')

        <script>
            window.addEventListener("load", function(event) {
                setTimeout(function() {
                    document.body.classList.remove("on");
                    document.body.classList.remove("on2");
                }, 500);
            });

            function callback(e) {
                var e = window.e || e;

                if (e.target.tagName !== 'A')
                    return;
                
                document.body.classList.add("on");                
                document.body.classList.add("on2");                
            }
            if (document.addEventListener)
                document.addEventListener('click', callback, false);
            else
                document.attachEvent('onclick', callback);
        </script>
    </body>
</html>
