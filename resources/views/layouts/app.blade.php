<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @stack('meta')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="icon" href="{{ asset('favicon.png') }}" sizes="32x32"/>
    <link rel="icon" href="{{ asset('favicon.png') }}" sizes="192x192"/>
    <link rel="apple-touch-icon-precomposed" href="{{ asset('favicon.png') }}"/>
    <title>@yield('page_title', Prism::getTitle())</title>
    <link href="{{ mix('/css/app.css', 'app') }}" rel="stylesheet">
    @stack('styles')
</head>
<body class="nice-style-shadow">
<div id="app">
    @yield('content')
</div>
<script src="{{ mix('/js/manifest.js', 'app') }}" type="text/javascript"></script>
<script src="{{ mix('/js/app.js', 'app') }}" type="text/javascript"></script>
<script src="{{ mix('/js/vendor.js', 'app') }}" type="text/javascript"></script>
@stack('scripts')
</body>
</html>
