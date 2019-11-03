<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('page_title', 'Dawn')</title>
    <meta name="keywords" content="{{ $keywords ?? config('blog.keywords') }}"/>
    <meta name="description" content="{{ $description ?? config('blog.description') }}"/>
    <link rel="apple-touch-icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <link href="{{ mix('css/app.css', 'static/app') }}" rel="stylesheet" type="text/css" media="all">

    <meta property="og:type" content="article">
    <meta property="og:title" content="@yield('page_title', 'Dawn')">
    <meta property="og:description" content="{{ $description ?? config('blog.description') }}">
    <meta property="og:image" content="{{ asset('favicon.ico') }}">

    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="@yield('page_title', 'Dawn')">
    <meta name="twitter:description" content="{{ $description ?? config('blog.description') }}">
    <meta name="twitter:image" content="{{ asset('favicon.ico') }}">

    <link rel="apple-touch-icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}">
    <meta name="msapplication-TileImage" content="{{ asset('favicon.ico') }}">
    @stack('styles')
</head>
<body class="nice-style-radius nice-style-shadow nice-style-border">
<div id="app">
    @include('partials.app-header')
    @yield('content')
    @cache('partials.app-footer')
</div>
<script src="{{ mix('js/app.js', 'static/app') }}"></script>
@stack('scripts')
</body>
</html>
