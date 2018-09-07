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

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'/>
    <link href="https://fonts.googleapis.com/css?family=Concert+One|Quicksand:400,700" rel="stylesheet">
    <link href="/css/app.css" rel='stylesheet' type='text/css'>
</head>
<body>
    @yield('navigation')

    @yield('header')

    @if(Auth::check())
        @include('layouts.partials.user-nav')
    @endif
    <div class="dashboard-layout clearfix">
        @if(Auth::check())
            @include('layouts.partials.site-nav')
        @endif
        <div class="container-max">
            @yield('body')
        </div>
    </div>

    @yield('footer')

    @if(env('APP_ENV') == 'local')
        <script src="https://unpkg.com/react@16/umd/react.development.js" crossorigin></script>
        <script src="https://unpkg.com/react-dom@16/umd/react-dom.development.js" crossorigin></script>
    @else
        <script src="https://unpkg.com/react@16/umd/react.production.min.js" crossorigin></script>
        <script src="https://unpkg.com/react-dom@16/umd/react-dom.production.min.js" crossorigin></script>
    @endif

    <script>
        window.Laravel = {!! json_encode(['csrfToken' => csrf_token()]) !!};
    </script>

    <script src="/js/common.js"></script>
    <script src="/js/app.js"></script>
</body>
</html>
