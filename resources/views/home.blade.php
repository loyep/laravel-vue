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
    <script>
      var globals = {
        'image_popup': 'null',
        'new_comment_position': 'asc',
        'single': '0',
        'post_style': '0',
        'home': '1',
        'page': '0',
        'silide': '0',
      };
    </script>
</head>
<body class="{{ implode(' ', $bodyClass) }}">
@include('partials.header')
@include('partials.magazine', ['posts' => $posts->take(5)])
@include('partials.pushes')
{{--@include('partials.tab-cats')--}}
{{--@include('partials.slides')--}}
{{--@include('components.search')--}}
<section class="nice-warp nice-warp-single my-4 my-md-5">
    <div class="container">
        <main class="nice-main">
            <div class="posts-list">
                <div class="list-inner home-list row  row-10 row-xs-15 ">
                    @foreach($posts as $post)
                        <div class="item-card d-flex col-12 col-sm-6 col-md-3 col-lg-3">
                            <article class="card flex-fill mb-4 mb-sm-4-2 mb-md-4 mb-lg-4-2">
                                <div class="image">
                                    <a class=""
                                       href="{{ route('post.show', ['slug'=> $post->slug]) }}"
                                       title="{{ $post->title }}">
                                        <div class="custom-hover d-block">
                                            <img class="timthumb_php"
                                                 src="http://wp.loyep.com/wp-content/themes/cosy2.05/timthumb.php?src=http://wp.loyep.com/wp-content/themes/cosy2.05/static/images/default.png&h=270&w=360&zc=1&a=c&q=100&s=1"
                                                 title="{{ $post->title }}" alt="{{ $post->title }}">
                                        </div>
                                        <div class="post-format-icon"><i class="fas fa-camera"></i></div>
                                    </a>
                                </div>
                                <div class="card-body d-flex flex-column content mt-1 mt-md-2">

                                    <div class="meta mt-2 light-12 ">
                                        <span class="u-cat-name font-12 d-block  ">
                                            <a class="text-primary"
                                               href="{{ route('category.show', ['slug' => $post->category->slug]) }}">{{ $post->category->name }}</a></span>
                                    </div>
                                    <div class="title flex-grow-1 mt-2">
                                        <h2 class="font-16 font-md-14 font-xs-16 text-l2 font-weight-bold light-14">
                                            <a href="{{ route('post.show', ['slug'=> $post->slug]) }}"
                                               title="{{ $post->title }}">
                                                {{ $post->title }}</a>
                                        </h2>
                                    </div>
                                    <div class="desc mt-2 d-none d-md-block">
                                        <p class="text-l2 font-md-12 text-secondary">
                                            {{ $post->excerpt }}
                                        </p>
                                    </div>

                                    <div class="data nodots d-flex align-items-center flex-row font-12 font-md-10 text-muted mt-2 mt-lg-3 light-12 d-flex d-lg-none">
                                        <div class="flex-fill d-flex ">
                                            <span class="u-time">{{ $post->published_at }}</span>
                                        </div>
                                        <div class="text-nowrap">
                                            <span class="u-view d-none d-lg-none"><i class="icon icon-eye"></i> {{ $post->views }}</span>

                                            <span class="u-comment d-none d-lg-inline-block"><i
                                                        class="fal fa-comment-alt-lines"></i>  0</span>

                                            <span class="u-like d-inline-block d-lg-none d-lg-inline-block"><i
                                                        class="fal fa-heart"></i> 0</span>
                                        </div>
                                    </div>

                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
                <div class="m-3 m-md-4"></div>
            </div>
        </main>
    </div>
</section>
@include('partials.footer')
<script src="{{ mix('js/app.js', 'static/app') }}" type="text/javascript"></script>
</body>
</html>
