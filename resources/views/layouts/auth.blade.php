<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Dawn') }}</title>
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
