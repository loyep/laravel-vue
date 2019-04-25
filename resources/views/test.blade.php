@php


@endphp<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="icon" href="{{ asset('favicon.png') }}" sizes="32x32"/>
    <link rel="icon" href="{{ asset('favicon.png') }}" sizes="192x192"/>
    <link rel="apple-touch-icon-precomposed" href="{{ asset('favicon.png') }}"/>
    <title>@yield('page_title', Prism::title())</title>
    <link href="{{ mix('/css/app.css', 'app') }}" rel="stylesheet">
</head>
<body class="nice-style-shadow">
    <div id="app">
        @component('layouts.partials.header', ['name' => 'Prism'])@endComponent
        @include('layouts.partials.magazine')
        <main class="py-3 py-md-5">
            <div class="container">
                @include('layouts.partials.notice')
                @include('layouts.partials.pushes')
                <section class="list-home row-md list-grouped list-tb-padding">
                    @foreach($posts as $post)
                        @component('layouts.partials.post-card', compact('post'))
                        @endComponent
                    @endForeach
                </section>

                {!! $posts->links() !!}
            </div>
    	</main>
        <section class="list-style-1 py-3 py-md-5 bg-light">
            <div class="container">
                <div class="list-header h4 mb-3">
                    随笔 <small class="d-block d-md-inline-block text-md text-muted px-md-2">Essay</small>
                </div>
        <div class="row-sm">
            <div class="col-12 col-md-3 d-flex mb-3 mb-md-0">
                <div class="list-item list-overlay custom-hover flex-fill">
                    <div class="media media-3x2 d-flex flex-fill">
                        <a class="media-content" href="category/syst.html"
                           style='background-image:url("{{ asset('/app/images/bg.jpg') }}")'
                           data-bg=" url(/images/bg.jpg)" data-nclazyload="true"><span class="overlay"></span></a>
                    </div>
                    <div class="list-content p-3">
                        <div class="list-body">
                            <a href="category/syst.html" class="list-title h4 text-left m-0">
                                深夜食堂
                            </a>
                        </div>
                        <div class="list-footer d-flex align-items-center text-muted text-xs m-0">
                            <div>分类</div>
                            <div class="flex-fill"></div>
                            <div class="text-nowrap">
                                <span class="d-inline-block pl-2">
                                    9 篇文章
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-9">
                <div class="row-sm my-n2">
                                    <div class="col-6 col-md-3 py-2">
                        <div class="list-item list-nice-overlay custom-hover">
                            <div class="media media-3x2">
                                <a class="media-content" href="#">
                                    <img src="/app/images/bg.jpg" data-src="/app/images/bg.jpg" data-nclazyload="true"><span class="overlay"></span>
                                </a>
                            </div>
                            <div class="list-content p-2">
                                <div class="list-body ">
                                    <a href="#" class="list-title h-2x">
                                        很高兴遇见你——初次漫步抚仙湖                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 py-2">
                        <div class="list-item list-nice-overlay custom-hover">
                            <div class="media media-3x2">
                                <a class="media-content" href="#">
                                    <img src="/app/images/bg.jpg" data-src="/app/images/bg.jpg" data-nclazyload="true"><span class="overlay"></span>
                                </a>
                            </div>
                            <div class="list-content p-2">
                                <div class="list-body ">
                                    <a href="#" class="list-title h-2x">
                                        跟着米芷萍的朋友圈去游历中国，与文字相拥，与名师相见，与美景相伴                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 py-2">
                        <div class="list-item list-nice-overlay custom-hover">
                            <div class="media media-3x2">
                                <a class="media-content" href="#">
                                    <img src="/app/images/bg.jpg" data-src="/app/images/bg.jpg" data-nclazyload="true"><span class="overlay"></span>
                                </a>
                            </div>
                            <div class="list-content p-2">
                                <div class="list-body ">
                                    <a href="#" class="list-title h-2x">
                                        春光正好，圆梦正当时——相约弦外之音·西藏站                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 py-2">
                        <div class="list-item list-nice-overlay custom-hover">
                            <div class="media media-3x2">
                                <a class="media-content" href="#">
                                    <img src="/app/images/bg.jpg" data-src="wp-content/themes/Cosy199/timthumb.php-src=https---beta.nicetheme.xyz-wp-content-uploads-2019-03-2019030802292626.jpg&amp;h=200&amp;w=300&amp;zc=1&amp;a=c&amp;q=100&amp;s=1.jpeg" data-nclazyload="true"><span class="overlay"></span>
                                </a>
                            </div>
                            <div class="list-content p-2">
                                <div class="list-body ">
                                    <a href="#" class="list-title h-2x">
                                        浮光掠影看世界之《墨西哥印象~度假天堂坎坤》                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                                    <div class="col-6 col-md-3 py-2">
                        <div class="list-item list-nice-overlay custom-hover">
                            <div class="media media-3x2">
                                <a class="media-content" href="#">
                                    <img src="/app/images/bg.jpg" data-src="wp-content/themes/Cosy199/timthumb.php-src=https---beta.nicetheme.xyz-wp-content-uploads-2019-03-2019030802294784.jpg&amp;h=200&amp;w=300&amp;zc=1&amp;a=c&amp;q=100&amp;s=1.jpeg" data-nclazyload="true"><span class="overlay"></span>
                                </a>
                            </div>
                            <div class="list-content p-2">
                                <div class="list-body ">
                                    <a href="#" class="list-title h-2x">
                                        走进北京胡同，感受繁华城市下的淳朴与自然                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                                    <div class="col-6 col-md-3 py-2">
                        <div class="list-item list-nice-overlay custom-hover">
                            <div class="media media-3x2">
                                <a class="media-content" href="#">
                                    <img src="/app/images/bg.jpg" data-src="wp-content/themes/Cosy199/timthumb.php-src=https---beta.nicetheme.xyz-wp-content-uploads-2019-03-2019030802283991.jpg&amp;h=200&amp;w=300&amp;zc=1&amp;a=c&amp;q=100&amp;s=1.jpeg" data-nclazyload="true"><span class="overlay"></span>
                                </a>
                            </div>
                            <div class="list-content p-2">
                                <div class="list-body ">
                                    <a href="#" class="list-title h-2x">
                                        苏格兰印象之十日谈第九天：远方的姑娘，凯恩戈姆国家森林公园-福尔柯克-爱丁堡                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                                    <div class="col-6 col-md-3 py-2">
                        <div class="list-item list-nice-overlay custom-hover">
                            <div class="media media-3x2">
                                <a class="media-content" href="#">
                                    <img src="/app/images/bg.jpg" data-src="wp-content/themes/Cosy199/timthumb.php-src=https---beta.nicetheme.xyz-wp-content-uploads-2019-03-2019030802292433.jpg&amp;h=200&amp;w=300&amp;zc=1&amp;a=c&amp;q=100&amp;s=1.jpeg" data-nclazyload="true"><span class="overlay"></span>
                                </a>
                            </div>
                            <div class="list-content p-2">
                                <div class="list-body ">
                                    <a href="#" class="list-title h-2x">
                                        一个人到中国最北极寻北：如果你迷失了方向，那就一路向北吧！                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                                    <div class="col-6 col-md-3 py-2">
                        <div class="list-item list-nice-overlay custom-hover">
                            <div class="media media-3x2">
                                <a class="media-content" href="#">
                                    <img src="/app/images/bg.jpg" data-src="wp-content/themes/Cosy199/timthumb.php-src=https---beta.nicetheme.xyz-wp-content-uploads-2019-03-2019030802284875.jpg&amp;h=200&amp;w=300&amp;zc=1&amp;a=c&amp;q=100&amp;s=1.jpeg" data-nclazyload="true"><span class="overlay"></span>
                                </a>
                            </div>
                            <div class="list-content p-2">
                                <div class="list-body ">
                                    <a href="#" class="list-title h-2x">
                                        如果你来重庆，这些一定不能错过的拍摄地                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                                </div>
            </div>
        </div>
    </div>
</section><section class="list-style-2 py-3 py-md-5 bg-white"><div class="container">
        <div class="list-header h4 mb-3">十七楼 <small class="d-block d-md-inline-block text-md text-muted px-md-2">此处可填写标题的英文翻译</small>
</div>
        <div class="row-sm">
            <div class="col-12 col-md-9  order-2 order-md-1">
                <div class="row-sm my-n2">
                                    <div class="col-6 col-md-3 py-2">
                        <div class="list-item list-nice-overlay custom-hover">
                            <div class="media media-3x2">
                                <a class="media-content" href="#">
                                    <img src="/app/images/bg.jpg" data-src="wp-content/themes/Cosy199/timthumb.php-src=https---beta.nicetheme.xyz-wp-content-uploads-2019-03-2019030804423838.jpeg&amp;h=300&amp;w=300&amp;zc=1&amp;a=c&amp;q=100&amp;s=1.jpeg" data-nclazyload="true"><span class="overlay"></span>
                                </a>
                            </div>
                            <div class="list-content p-2">
                                <div class="list-body ">
                                    <a href="#" class="list-title h-2x">
                                        苏格兰印象之十日谈第七天：此景只应天上有，威廉堡-格林芬南大桥-天空岛                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                                    <div class="col-6 col-md-3 py-2">
                        <div class="list-item list-nice-overlay custom-hover">
                            <div class="media media-3x2">
                                <a class="media-content" href="#">
                                    <img src="/app/images/bg.jpg" data-src="wp-content/themes/Cosy199/timthumb.php-src=https---beta.nicetheme.xyz-wp-content-uploads-2019-03-2019030804425582.jpeg&amp;h=300&amp;w=300&amp;zc=1&amp;a=c&amp;q=100&amp;s=1.jpeg" data-nclazyload="true"><span class="overlay"></span>
                                </a>
                            </div>
                            <div class="list-content p-2">
                                <div class="list-body ">
                                    <a href="#" class="list-title h-2x">
                                        在彩云之南吹！我的骄傲放纵，一份迟到3年的游记                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                                    <div class="col-6 col-md-3 py-2">
                        <div class="list-item list-nice-overlay custom-hover">
                            <div class="media media-3x2">
                                <a class="media-content" href="#">
                                    <img src="/app/images/bg.jpg" data-src="wp-content/themes/Cosy199/timthumb.php-src=https---beta.nicetheme.xyz-wp-content-uploads-2019-03-2019030802292769.jpg&amp;h=300&amp;w=300&amp;zc=1&amp;a=c&amp;q=100&amp;s=1.jpeg" data-nclazyload="true"><span class="overlay"></span>
                                </a>
                            </div>
                            <div class="list-content p-2">
                                <div class="list-body ">
                                    <a href="#" class="list-title h-2x">
                                        苏格兰印象之十日谈第八天：此景应属魔法界，天空岛老人峰-爱莲朵娜城堡                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                                    <div class="col-6 col-md-3 py-2">
                        <div class="list-item list-nice-overlay custom-hover">
                            <div class="media media-3x2">
                                <a class="media-content" href="#">
                                    <img src="/app/images/bg.jpg" data-src="wp-content/themes/Cosy199/timthumb.php-src=https---beta.nicetheme.xyz-wp-content-uploads-2019-03-2019030802275822.jpg&amp;h=300&amp;w=300&amp;zc=1&amp;a=c&amp;q=100&amp;s=1.jpeg" data-nclazyload="true"><span class="overlay"></span>
                                </a>
                            </div>
                            <div class="list-content p-2">
                                <div class="list-body ">
                                    <a href="#" class="list-title h-2x">
                                        在海口，来一场民国的穿越之旅                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                                    <div class="col-6 col-md-3 py-2">
                        <div class="list-item list-nice-overlay custom-hover">
                            <div class="media media-3x2">
                                <a class="media-content" href="#">
                                    <img src="/app/images/bg.jpg" data-src="wp-content/themes/Cosy199/timthumb.php-src=https---beta.nicetheme.xyz-wp-content-uploads-2019-03-2019030802282598.jpg&amp;h=300&amp;w=300&amp;zc=1&amp;a=c&amp;q=100&amp;s=1.jpeg" data-nclazyload="true"><span class="overlay"></span>
                                </a>
                            </div>
                            <div class="list-content p-2">
                                <div class="list-body ">
                                    <a href="#" class="list-title h-2x">
                                        旅行四川成都，这3只大熊猫把我萌到了，原来后面这种也是熊猫！                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                                    <div class="col-6 col-md-3 py-2">
                        <div class="list-item list-nice-overlay custom-hover">
                            <div class="media media-3x2">
                                <a class="media-content" href="#">
                                    <img src="/app/images/bg.jpg" data-src="wp-content/themes/Cosy199/timthumb.php-src=https---beta.nicetheme.xyz-wp-content-uploads-2019-03-2019030802281146.jpg&amp;h=300&amp;w=300&amp;zc=1&amp;a=c&amp;q=100&amp;s=1.jpeg" data-nclazyload="true"><span class="overlay"></span>
                                </a>
                            </div>
                            <div class="list-content p-2">
                                <div class="list-body ">
                                    <a href="#" class="list-title h-2x">
                                        苏格兰印象之十日谈第十天：归去来，爱丁堡-伦敦-佛克斯同                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                                </div>
            </div>
            <div class="col-12 col-md-3 d-flex order-1 order-md-2 mb-3 mb-md-0">
                <div class="list-item list-overlay custom-hover flex-fill">
                    <div class="media media-3x2 d-flex flex-fill">
                        <a href="category/ghjh.html" class="media-content"
                           style='background-image:url("{{ asset('/app/images/bg.jpg') }}")'
                           data-bg=" url(https://beta.nicetheme.xyz/wp-content/uploads/2019/03/2019030802270178.jpg)"
                           data-nclazyload="true"><span class="overlay"></span></a>
                    </div>
                    <div class="list-content p-3">
                        <div class="list-body ">
                            <a href="category/ghjh.html" class="list-title h4 text-left m-0">
                                十七楼                            </a>
                        </div>
                        <div class="list-footer d-flex align-items-center text-muted text-xs m-0">
                            <div>分类</div>
                            <div class="flex-fill"></div>
                            <div class="text-nowrap">
                                <span class="d-inline-block pl-2">
                                    6 篇文章
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><section class="list-style-3 py-3 py-md-5 bg-light"><div class="container">
        <div class="list-header h4 text-center mb-3">简旅记 <small class="text-md text-muted px-2 d-block">显示于标题右侧，可填写标题的英文翻译</small>
</div>
        <div class="row-sm my-n2">
                        <div class="col-6 col-md-3 py-2">
                <div class="list-item list-nice-overlay custom-hover">
                    <div class="media media-3x2">
                        <a class="media-content" href="#">
                            <img src="/app/images/bg.jpg" data-src="wp-content/themes/Cosy199/timthumb.php-src=https---beta.nicetheme.xyz-wp-content-uploads-2019-03-2019030804424379.jpeg&amp;h=200&amp;w=300&amp;zc=1&amp;a=c&amp;q=100&amp;s=1.jpeg" data-nclazyload="true"><span class="overlay"></span>
                        </a>
                    </div>
                    <div class="list-content p-2">
                        <div class="list-body ">
                            <a href="#" class="list-title h-2x">
                                Gallerie degli Uffizi 乌菲兹美术馆                            </a>
                        </div>
                    </div>
                </div>
            </div>
                        <div class="col-6 col-md-3 py-2">
                <div class="list-item list-nice-overlay custom-hover">
                    <div class="media media-3x2">
                        <a class="media-content" href="#">
                            <img src="/app/images/bg.jpg" data-src="wp-content/themes/Cosy199/timthumb.php-src=https---beta.nicetheme.xyz-wp-content-uploads-2019-03-2019030804424914.jpeg&amp;h=200&amp;w=300&amp;zc=1&amp;a=c&amp;q=100&amp;s=1.jpeg" data-nclazyload="true"><span class="overlay"></span>
                        </a>
                    </div>
                    <div class="list-content p-2">
                        <div class="list-body ">
                            <a href="#" class="list-title h-2x">
                                苏格兰印象之十日谈第五天：世界最美A82公路自驾记                            </a>
                        </div>
                    </div>
                </div>
            </div>
                        <div class="col-6 col-md-3 py-2">
                <div class="list-item list-nice-overlay custom-hover">
                    <div class="media media-3x2">
                        <a class="media-content" href="#">
                            <img src="/app/images/bg.jpg" data-src="wp-content/themes/Cosy199/timthumb.php-src=https---beta.nicetheme.xyz-wp-content-uploads-2019-03-2019030804424836.jpeg&amp;h=200&amp;w=300&amp;zc=1&amp;a=c&amp;q=100&amp;s=1.jpeg" data-nclazyload="true"><span class="overlay"></span>
                        </a>
                    </div>
                    <div class="list-content p-2">
                        <div class="list-body ">
                            <a href="#" class="list-title h-2x">
                                旅行四川绵阳，这座绵州第一山不能错过！空气好景美能玩一整天！                            </a>
                        </div>
                    </div>
                </div>
            </div>
                        <div class="col-6 col-md-3 py-2">
                <div class="list-item list-nice-overlay custom-hover">
                    <div class="media media-3x2">
                        <a class="media-content" href="#">
                            <img src="/app/images/bg.jpg" data-src="wp-content/themes/Cosy199/timthumb.php-src=https---beta.nicetheme.xyz-wp-content-uploads-2019-03-2019030804424427.jpeg&amp;h=200&amp;w=300&amp;zc=1&amp;a=c&amp;q=100&amp;s=1.jpeg" data-nclazyload="true"><span class="overlay"></span>
                        </a>
                    </div>
                    <div class="list-content p-2">
                        <div class="list-body ">
                            <a href="#" class="list-title h-2x">
                                取一瓢深蓝色甜甜的湖水，甜到我的心底解忧愁！                            </a>
                        </div>
                    </div>
                </div>
            </div>
                        <div class="col-6 col-md-3 py-2">
                <div class="list-item list-nice-overlay custom-hover">
                    <div class="media media-3x2">
                        <a class="media-content" href="#">
                            <img src="/app/images/bg.jpg" data-src="wp-content/themes/Cosy199/timthumb.php-src=https---beta.nicetheme.xyz-wp-content-uploads-2019-03-2019030804424524.jpeg&amp;h=200&amp;w=300&amp;zc=1&amp;a=c&amp;q=100&amp;s=1.jpeg" data-nclazyload="true"><span class="overlay"></span>
                        </a>
                    </div>
                    <div class="list-content p-2">
                        <div class="list-body ">
                            <a href="#" class="list-title h-2x">
                                离人犹记江南事，烟水桃花过谢桥
                            </a>
                        </div>
                    </div>
                </div>
            </div>
                        <div class="col-6 col-md-3 py-2">
                <div class="list-item list-nice-overlay custom-hover">
                    <div class="media media-3x2">
                        <a class="media-content" href="#">
                            <img src="/app/images/bg.jpg" data-src="wp-content/themes/Cosy199/timthumb.php-src=https---beta.nicetheme.xyz-wp-content-uploads-2019-03-2019030804425174.jpeg&amp;h=200&amp;w=300&amp;zc=1&amp;a=c&amp;q=100&amp;s=1.jpeg" data-nclazyload="true"><span class="overlay"></span>
                        </a>
                    </div>
                    <div class="list-content p-2">
                        <div class="list-body ">
                            <a href="#" class="list-title h-2x">
                                一天徒步36000步！迪士尼，你究竟让姑娘受了什么刺激？                            </a>
                        </div>
                    </div>
                </div>
            </div>
                        <div class="col-6 col-md-3 py-2">
                <div class="list-item list-nice-overlay custom-hover">
                    <div class="media media-3x2">
                        <a class="media-content" href="#">
                            <img src="/app/images/bg.jpg" data-src="wp-content/themes/Cosy199/timthumb.php-src=https---beta.nicetheme.xyz-wp-content-uploads-2019-03-2019030802291463.jpg&amp;h=200&amp;w=300&amp;zc=1&amp;a=c&amp;q=100&amp;s=1.jpeg" data-nclazyload="true"><span class="overlay"></span>
                        </a>
                    </div>
                    <div class="list-content p-2">
                        <div class="list-body ">
                            <a href="#" class="list-title h-2x">
                                月游美国3~大峡谷国家公园（Grand Canyon National Park）                            </a>
                        </div>
                    </div>
                </div>
            </div>
                        <div class="col-6 col-md-3 py-2">
                <div class="list-item list-nice-overlay custom-hover">
                    <div class="media media-3x2">
                        <a class="media-content" href="#">
                            <img src="/app/images/bg.jpg" data-src="wp-content/themes/Cosy199/timthumb.php-src=https---beta.nicetheme.xyz-wp-content-uploads-2019-03-2019030802293625.jpg&amp;h=200&amp;w=300&amp;zc=1&amp;a=c&amp;q=100&amp;s=1.jpeg" data-nclazyload="true"><span class="overlay"></span>
                        </a>
                    </div>
                    <div class="list-content p-2">
                        <div class="list-body ">
                            <a href="#" class="list-title h-2x">
                                15天，3,000公里，风景如画新西兰                            </a>
                        </div>
                    </div>
                </div>
            </div>
                    </div>
    </div>
</section>
        @component('layouts.partials.footer', ['name' => 'Prism'])

        @endcomponent
        <aside class="sidebar-collapse"><div class="sidebar-mobile bg-light">
					<div class="sidebar-mobile-action bg-white">
				<button type="button" class="link-action text-muted" id="sidebar-mobile-close"><i class="iconfont icon-iconfontradiobox"></i></button>
			</div>
				<div class="sidebar-mobile-tab-menu">
	        <ul id="mobile-tab-menu-id" class="mobile-tab-menu">
<li class="menu-item   menu-item-has-children ">
<a>目录样式</a>
<ul class="sub-menu">
<li class="menu-item "><a class="nav-link" href="category/ghjh.html"><i class="iconfont icon-biaoqian"></i>十七楼</a></li>
	<li class="menu-item "><a class="nav-link" href="category/yhty.html"><i class="iconfont icon-duanxin"></i>简旅记</a></li>
	<li class="menu-item "><a class="nav-link" href="category/syst.html"><i class="iconfont icon-star-1"></i>深夜食堂</a></li>
</ul>
</li>
<li class="menu-item   menu-item-has-children ">
<a>页面模版</a>
<ul class="sub-menu">
<li class="menu-item"><a class="nav-link" href="#"><i class="iconfont icon-biaoqian-"></i>专题</a></li>
	<li class="menu-item"><a class="nav-link" href="#"><i class="iconfont icon-duanxin"></i>小伙伴</a></li>
                </ul>
                </li>
	            </ul>
            </div>
	    </div>
    </aside>
    @include('components.popup.search')
    <div id="author-popup-wrap">
        <div class="author-popup-cover">
            <div class="media media-16x9 bg-dark-gradient">
                <div class="bg-effect bg-dark-gradient bg-author"></div>
                    <div class="bg-effect bg-cover" data-img="https://secure.gravatar.com/avatar/afa39accf8700cbbe7b13e1d01aa5b17?s=96&amp;d=mm&amp;r=g"></div>
                </div>
            <div class="mt-n5">
            <div class="px-4">
                <div class="d-flex align-items-center justify-content-center">
                    <a href="author/suxing.html" class="avatar mx-2 w-96" taget="_blank">
                        <img alt="" src="https://cdn.v2ex.com/gravatar/afa39accf8700cbbe7b13e1d01aa5b17?s=96&amp;d=mm&amp;r=g" srcset="https://cdn.v2ex.com/gravatar/afa39accf8700cbbe7b13e1d01aa5b17?s=192&amp;d=mm&amp;r=g 2x" class="avatar avatar-96 photo nc-no-lazy" height="96" width="96"></a>
                </div>
                <div class="text-center mt-3">
                    <a href="author/suxing.html" class="h5" target="_blank">Prism</a>
                    <div class="d-block text-sm text-muted mt-2"><span class="h-2x">美好源于热爱。</span></div>
                </div>
            </div>
            <div class="row no-gutters text-center">
                <a href="author/suxing.html" class="col py-3" target="_blank">
                    <span class="font-theme text-lg d-block">32</span>
                    <small class="text-xs text-muted">文章</small>
                </a>
                <div class="col py-3">
                    <span class="font-theme text-lg d-block">23</span>
                    <small class="text-xs text-muted">评论</small>
                </div>
                <div class="col py-3">
                    <span class="font-theme text-lg d-block">201</span>
                    <small class="text-xs text-muted">喜欢</small>
                </div>
            </div>
        </div>
    </div>
</div>
<back-to-top>
    <span class="icon-stack">
        <i class="text-xs iconfont icon-up"></i>
    <span class="back-to-top-text">Top</span>
    </span>
</back-to-top>
</div>
<script src="{{ mix('/js/manifest.js', 'app') }}" type="text/javascript"></script>
<script src="{{ mix('/js/app.js', 'app') }}" type="text/javascript"></script>
<script src="{{ mix('/js/vendor.js', 'app') }}" type="text/javascript"></script>
</body>
</html>
