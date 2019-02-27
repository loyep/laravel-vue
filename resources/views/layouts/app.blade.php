<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>{{ Galaxy::title() }}</title>
    <link href="{{ mix('css/app.css', 'assets/app') }}" rel="stylesheet">
</head>
<body>

<script src="{{ mix('js/app.js', 'assets/app') }}" type="text/javascript"></script>
</body>
</html>
