<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel fixed-top">
            <div class="container  justify-content-center">
                <a class="navbar-brand title" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>
        </nav>

        <main class="">
            <div class="container-fluid">
                <div class="row no-gutters justify-content-end">
                    <div class="col-2 nav-area fixed-top">
                        @yield('navarea')
                    </div>
                    <div class="col-10 content-container">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
    </div>
    <footer class="navbar ">
        <div class="container justify-content-center">
            <div>
                Copyright 2018 <a href="/">AndrewEarls.com</a>
            </div>
        </div>
        @yield('scripts')
    </footer>
</body>
</html>
