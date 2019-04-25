<?php
$pushes = get_option('pushes_group');
?>

{{--@foreach($pushes as $push)--}}
    {{--<div class="item col-12 col-sm-6 col-md-3 mt-0 mt-md-4">--}}
        {{--<div class="position-relative">--}}
            {{--<a href="{{ $push['pushes_group_link'] }}" target="_blank"--}}
               {{--title="{{ $push['pushes_group_title'] }}" class="custom-hover d-block">--}}
                {{--<div class="custom-hover-img image" style="background-image: url('{{ $image[0] }}');"></div>--}}
                {{--<div class="content d-flex align-items-center justify-content-center align-content-center">--}}
                    {{--@if (!empty($push['pushes_group_title']))--}}
                        {{--<h3 class="title font-18 font-md-16 font-xs-20 color-white">{{ $push['pushes_group_title'] }}</h3>--}}
                    {{--@endif--}}
                {{--</div>--}}
            {{--</a>--}}
        {{--</div>--}}
    {{--</div>--}}
    <div class="item col-12 col-sm-6 col-md-3 mt-0 mt-md-4">
        <div class="position-relative">
            <a href="#" target="_blank" title="故事" class="custom-hover d-block">
                <div class="custom-hover-img image"
                     style="background-image: url('{{ asset('static/images/bg.jpg') }}');"></div>
                <div class="content d-flex align-items-center justify-content-center align-content-center">
                    <h3 class="title font-18 font-md-16 font-xs-20 color-white">故事</h3>
                </div>
            </a>
        </div>
    </div>
{{--@endforeach--}}
