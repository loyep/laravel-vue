<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0">
    <title>{{ Prism::name() }}</title>
    <link rel="icon" href="{{ asset('static/img/logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ mix('prism.css', 'vendor/prism') }}">
    <link href="{{ asset('static/css/chunk-vendors.css') }}" rel="stylesheet">
</head>
<body>
<noscript><strong>We're sorry but Prism doesn't work properly without JavaScript enabled. Please enable it to continue.</strong></noscript>
<div id="app"></div>
<script src="{{ asset('static/js/app.js')}}" type="text/javascript"></script>
<script src="{{ asset('static/js/chunk-vendors.js')}}" type="text/javascript"></script>
</body>
</html>
