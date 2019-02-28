<?php
$config = [
    'base' => config('grace.path'),
    'name' => config('grace.name'),
    'description' => 'Ant Design 是西湖区最具影响力的 Web 设计规范'
];
?>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0">
    <title>{{ $config['name'] }}</title>
    <link rel="icon" href="{{ asset('assets/admin/images/logo.png') }}" type="image/x-icon">
    <script>
      window.config = @json($config)
    </script>
</head>
<body>
<div id="app"></div>
<script src="{{ mix('admin.js', 'assets/admin')}}" type="text/javascript"></script>
</body>
</html>
