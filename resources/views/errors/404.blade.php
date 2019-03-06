<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="icon" href="{{ asset('favicon.png') }}" sizes="32x32" />
    <link rel="icon" href="{{ asset('favicon.png') }}" sizes="192x192" />
    <link rel="apple-touch-icon-precomposed" href="{{ asset('favicon.png') }}" />
    <title>@yield('page_title', Grace::title())</title>
    <link href="{{ mix('css/app.css', 'assets/app') }}" rel="stylesheet">
</head>
<body>
<section class="nice-warp mt-30 mb-5">
    <div class="container">
        <div class="data-null">
            <p><i class="icon-null"></i></p>
            <h1 class="font-theme">404</h1>
            <p>抱歉，没有你要找的内容...</p>
            <div class="data-search">
                <form role="search" method="get" action="/">
                    <div class="form-group">
                        <input type="search" class="form-control" name="s" id="s" placeholder="键入要搜索的关键词">
                        <button type="submit" class="btn btn-primary btn-search"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script src="{{ mix('js/app.js', 'assets/app') }}" type="text/javascript"></script>
</body>
</html>
