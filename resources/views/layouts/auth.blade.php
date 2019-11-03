<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('page_title', 'Dawn')</title>
    <meta name="keywords" content="{{ $keywords ?? '' }}" />
    <meta name="description" content="{{ $description ?? '' }}" />

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
    <link href="{{ mix('css/app.css', 'static/app') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <div class="auth-container" style="background-color: #f6f6f7">
        <div class="sign-container d-flex flex-fill align-items-md-center h-v">
            <main class="main-container d-flex flex-fill flex-column">
                <div class="auth-sign-inner row no-gutters d-flex flex-fill">
                    <div class="col-12 col-md-5 col-lg-6 col-xl-7">
                        <div class="sign-cover d-flex flex-column bg-secondary bg-img bg-cover w-100 h-100 p-4" style="background-image: url('{{ asset('images/bg-sign.jpg') }}');" >
                            <a href="{{ url('/') }}" title="{{ config('dawn.name') }}" class="auth-sign-logo m-md-2">
                                <img src="{{ asset('images/logo.png') }}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-md-7 col-lg-6 col-xl-5 px-3 px-md-4 px-lg-5 py-md-5">
                       @yield('content')
                    </div>
                </div>
            </main>
        </div>
        <footer>
            <div class="container">
                <div class="footer-copyright text-muted text-center text-xs py-5">
                    Copyright © {{ date('Y') }} <a href="{{ url('/') }}" title="{{ config('dawn.name') }}" rel="home">
                        {{ config('dawn.name') }}
                    </a>
                </div>
            </div>
        </footer>
    </div>
</div>

<script src="{{ mix('js/app.js', 'static/app') }}"></script>
</body>
</html>
