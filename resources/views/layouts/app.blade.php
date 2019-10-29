<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('page_title', 'Dawn')</title>
    <link rel="apple-touch-icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <link href="{{ mix('css/app.css', 'static/app') }}" rel="stylesheet" type="text/css" media="all">
    @stack('styles')
</head>
<body class="cosy-style-shadow">
<div id="app">
    @include('commons.header')
    @yield('content')
    @include('commons.footer')
</div>
<script src="{{ mix('js/app.js', 'static/app') }}" ></script>
@stack('scripts')
</body>
</html>
