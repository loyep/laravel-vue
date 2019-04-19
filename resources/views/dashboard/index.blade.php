<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0">
    <title>{{ $config['name'] }}</title>
    <link rel="icon" href="{{ asset('static/img/logo.png') }}" type="image/x-icon">
    <link href="{{ asset('static/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('static/css/chunk-vendors.css') }}" rel="stylesheet">
    <script>
      window.config = @json($config)
    </script>
    <style>
        #prism-loader {
            background: #F9F9F9;
            position: fixed;
            width: 100%;
            height: 100%;
            left: 0px;
            top: 0px;
            z-index: 99;
        }

        #prism-loader span {
            width: 60px;
            height: 60px;
            position: absolute;
            top: 50%;
            left: 50%;
            margin-top: -60px;
            margin-left: -30px;
            margin-right: -30px;

            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
            -webkit-animation: gRotate 1.2s infinite linear;
            animation: gRotate 1.2s infinite linear;
        }

        #prism-loader i:nth-child(1) {
            left: 0;
            top: 0;
        }

        #prism-loader i:nth-child(2) {
            right: 0;
            top: 0;
            -webkit-animation-delay: 0.4s;
            animation-delay: 0.4s;
        }

        #prism-loader i:nth-child(3) {
            right: 0;
            bottom: 0;
            -webkit-animation-delay: 0.8s;
            animation-delay: 0.8s;
        }

        #prism-loader i:nth-child(4) {
            left: 0;
            bottom: 0;
            -webkit-animation-delay: 1.2s;
            animation-delay: 1.2s;
        }

        #prism-loader i {
            width: 30px;
            height: 30px;
            border-radius: 100%;
            background-color: #1890ff;
            -webkit-transform: scale(0.75);
            -ms-transform: scale(0.75);
            transform: scale(0.75);
            display: block;
            position: absolute;
            opacity: 0.3;
            -webkit-animation: spinMove 1s infinite linear alternate;
            animation: spinMove 1s infinite linear alternate;
            -webkit-transform-origin: 50% 50%;
            -ms-transform-origin: 50% 50%;
            transform-origin: 50% 50%;
        }

        @-webkit-keyframes spinMove {
            to {
                opacity: 1;
            }
        }

        @keyframes spinMove {
            to {
                opacity: 1;
            }
        }

        @-webkit-keyframes gRotate {
            to {
                -webkit-transform: rotate(405deg);
                transform: rotate(405deg);
            }
        }

        @keyframes gRotate {
            to {
                -webkit-transform: rotate(405deg);
                transform: rotate(405deg);
            }
        }
    </style>
</head>
<body>
<noscript><strong>We're sorry but Prism doesn't work properly without JavaScript enabled. Please enable it to continue.</strong></noscript>
<div id="prism-loader"><span class="ant-spin-dot2 ant-spin-dot-spin2"><i></i><i></i><i></i><i></i></span>
</div>
<div id="app"></div>
<script src="{{ asset('static/js/app.js')}}" type="text/javascript"></script>
<script src="{{ asset('static/js/chunk-vendors.js')}}" type="text/javascript"></script>
</body>
</html>
