<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title>@yield('title', 'Expense Tracker')</title>
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('layouts.partials.favicon')

    <link href="https://fonts.googleapis.com/css?family=Permanent+Marker|Quicksand:400,700" rel="stylesheet">
    <link href="/css/app.css" rel='stylesheet' type='text/css'>
</head>
<body>
    @yield('navigation')

    @yield('header')

    <div class="container">
        <div class="text-center">
            <h1>Expense Tracker</h1>
            <h2>Money in, money out.</h2>

            @yield('page-title')

            @if (session('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{ session('success') }}
                </div>
            @endif
        </div>

        @yield('body')
    </div>

    @yield('footer')

    @if(env('APP_ENV') == 'local')
        <script src="https://unpkg.com/react@16/umd/react.development.js" crossorigin></script>
        <script src="https://unpkg.com/react-dom@16/umd/react-dom.development.js" crossorigin></script>
    @else
        <script src="https://unpkg.com/react@16/umd/react.production.min.js" crossorigin></script>
        <script src="https://unpkg.com/react-dom@16/umd/react-dom.production.min.js" crossorigin></script>
    @endif

    <script src="/js/app.js"></script>
</body>
</html>
