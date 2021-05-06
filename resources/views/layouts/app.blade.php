<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/custom.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">


    <!-- Links -->

    <!-- Styles -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Links -->
    <script src="https://kit.fontawesome.com/8f497d50ac.js" crossorigin="anonymous"></script>


</head>
<body class="auth">
@include('layouts.navbar')

<!-- Bootstrap row -->
<div class="row" id="body-row">
    
    @include('layouts.sidebar')
    <div class="col">
    @include('layouts.alerts')

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</div>



</body>
</html>
