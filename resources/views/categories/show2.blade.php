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
        /* <![CDATA[ */
        var globals = {
          'ajax_url': '',
          'url_theme': '',
          'image_popup': 'gallery',
          'new_comment_position': 'asc',
          'single': '1',
          'post_style': 'two',
          'home': '0',
          'page': '0',
          'silide': '0',
        };
        /* ]]> */
    </script>
</head>
<body class="{{ implode(' ', $bodyClass) }}">
@include('partials.header')

<section class="nice-top-content no-backdrop">
    <div class="black-gradient"></div>
    <div class="backdrop" style="background-image: url('..')"></div>
    <div class="overlay"></div>
    <div class="name">
        <div class="container">
            <h5 class="font-30 font-md-24 '.get_title_font_weight().' text-white"># {{ $category->name }} # </h5>
            <p class="desc font-14 text-white mt-2">{{ $category->description }}</p>
        </div>
    </div>
</section>
@if ($posts->count() > 0)
    <section class="nice-warp nice-warp-single mt-3 mt-md-5 mb-4 mb-md-5">
        <div class="container">
            <main class="nice-main">
                <div class="posts-list">
                    <div class="list-inner home-list row  row-10 row-xs-15 ">
                        @foreach($posts as $post)
                            <div class="item-card d-flex col-12 col-sm-6 col-md-3 col-lg-3">
                                <article class="card flex-fill mb-4 mb-sm-4-2 mb-md-4 mb-lg-4-2">
                                    <div class="image">
                                        <a class=""
                                           href="{{ $post->permLink }}"
                                           title="{{ $post->title }}">
                                            <div class="custom-hover d-block">
                                                <img class="timthumb_php"
                                                     src="{{ $post->image }}"
                                                     title="{{ $post->title }}" alt="{{ $post->title }}">
                                            </div>
                                            {{--$post_extend = wp_parse_args( (array) $post_extend, array(--}}
                                            {{--'post_layout' => 'one',--}}
                                            {{--'head_img'    => '',--}}
                                            {{--)--}}
                                            {{--);--}}
                                            {{--if( $post_extend['post_layout'] == 'six' || $post_extend['post_layout'] == 'seven' ){--}}
                                            {{--echo '<div class="post-format-icon"><i class="fas fa-play"></i></div>';--}}
                                            {{--}else if( $post_extend['post_layout'] == 'five' && $post_extend['post_layout_gallery'] ){--}}
                                            {{--echo '<div class="post-format-icon"><i class="fas fa-camera"></i></div>';--}}
                                            {{--}--}}
                                            {{--<div class="post-format-icon"><i class="fas fa-play"></i></div>--}}
                                        </a>
                                    </div>
                                    <div class="card-body d-flex flex-column content mt-1 mt-md-2">

                                        <div class="meta mt-2 light-12 ">
                                        <span class="u-cat-name font-12 d-block u-cat-dot u-color-red">
                                            <a class="text-primary" href="{{ $post->category->permLink }}">
                                                {{ $post->category->name }}
                                            </a>
                                        </span>
                                        </div>
                                        <div class="title flex-grow-1 mt-2">
                                            <h2 class="font-16 font-md-14 font-xs-16 text-l2 font-weight-bold light-14">
                                                <a href="{{ $post->permLink }}" title="{{ $post->title }}">
                                                    {{ $post->title }}
                                                </a>
                                            </h2>
                                        </div>
                                        <div class="desc mt-2 d-none d-md-block">
                                            <p class="text-l2 font-md-12 text-secondary">
                                                {{ $post->excerpt }}
                                            </p>
                                        </div>

                                        <div class="data nodots d-flex align-items-center flex-row font-12 font-md-10 text-muted mt-2 mt-lg-3 light-12 d-flex d-lg-flex">
                                            <div class="flex-fill d-flex ">
                                                <span class="u-time">{{ $post->published_date }}</span>
                                            </div>
                                            <div class="text-nowrap">
                                                <span class="u-view d-none d-lg-none"><i class="icon icon-eye"></i> {{ $post->views_count }}</span>

                                                <span class="u-comment d-none d-lg-inline-block"><i
                                                            class="fal fa-comment-alt-lines"></i>  {{ $post->comments_count }}</span>

                                                <span class="u-like d-inline-block d-lg-none d-lg-inline-block"><i
                                                            class="fal fa-heart"></i> {{ $post->likes_count }}</span>
                                            </div>
                                        </div>

                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>
                    <div class="m-3 m-md-4">
                        {{ $posts->links() }}
                    </div>
                </div>
            </main>
        </div>
    </section>
@else
    <section class="nice-warp">
        <div class="container">
            <div class="data-null">
                <p><i class="icon-null"></i></p>
                <p>抱歉，没有你要找的内容...</p>
                <div class="data-search">
                    <form role="search" method="get" action="{{ route('search') }}">
                        <div class="form-group">
                            <input type="search" class="form-control" name="q" id="s" placeholder="键入要搜索的关键词">
                            <button type="submit" class="btn btn-primary btn-search"><i class="fa fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endif
@include('partials.footer')
<script src="{{ mix('js/app.js', 'static/app') }}" type="text/javascript"></script>
</body>
</html>
