<?php
$bodyClass = ['black-top', 'grid-hover grid-radius grid-border'];
if (Route::current()->named('home')) {
    $bodyClass[] = 'home';
}
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="icon" href="{{ asset('favicon.png') }}" sizes="32x32"/>
    <link rel="icon" href="{{ asset('favicon.png') }}" sizes="192x192"/>
    <link rel="apple-touch-icon-precomposed" href="{{ asset('favicon.png') }}"/>
    <title>@yield('page_title', Prism::title())</title>
    <link href="{{ mix('css/app.css', 'static/app') }}" rel="stylesheet">
</head>
<body class="{{ implode(' ', $bodyClass) }}">
@include('partials.header')
@include('partials.magazine')
@include('partials.pushes')
{{--@include('partials.tab-cats')--}}
{{--@include('partials.slides')--}}
{{--@include('components.search')--}}
<section class="nice-warp nice-warp-single my-4 my-md-5">
    <div class="container">

        <main class="nice-main">
            <div class="posts-list">
                <div class="list-inner home-list row  row-10 row-xs-15 ">

                </div>
                <div class="m-3 m-md-4"></div>    </div>
        </main>
    </div>
</section>
@include('partials.footer')
{{--<script src="{{ mix('js/app.js', 'static/app') }}" type="text/javascript"></script>--}}
<script src="{{ mix('js/app.js', 'static/app') }}" type="text/javascript"></script>
</body>
</html>
