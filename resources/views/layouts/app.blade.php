<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('page_title', 'Dawn')</title>
    <meta name="keywords" content="{{ $keywords ?? '' }}" />
    <meta name="description" content="{{ $description ?? '' }}" />
    <link rel="apple-touch-icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <link href="{{ mix('css/app.css', 'static/app') }}" rel="stylesheet" type="text/css" media="all">
    @stack('styles')
</head>
<body class="nice-style-radius nice-style-shadow nice-style-border">
<div id="app">
    @include('partials.app-header')
    @yield('content')
    @cache('partials.app-footer')
</div>
<script src="{{ mix('js/app.js', 'static/app') }}" ></script>
@stack('scripts')
</body>
</html>
