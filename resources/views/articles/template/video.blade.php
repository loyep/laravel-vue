@extends('layouts.app')

@section('content')
    @include('partials.header')
    <main class="py-4 py-md-5">
        <div class="container">
            @include('articles.partials.breadcrumbs', compact('article'))
            <div class="row no-gutters">
                <div class="col-12 col-lg-9 pr-lg-5">
                    <div class="post">
                        <h1 class="post-title h3">{{ $article->title }}</h1>
                        @include('articles.partials.meta', compact('article'))
                        <?php //get_template_part('template-parts/list-video-nav') ?>
                        <div class="content-style content">
                            {!! $content !!}
                        </div>
                        <?php //get_template_part('template-parts/ad/single-ad'); ?>
                        <div class="post-tags mt-3 mt-md-4">
                            @foreach($article->tags as $tag)
                                <a href="{{ $tag->permLink }}" rel="tag">{{ $tag->name }}</a>
                            @endforeach
                        </div>
                        @include('articles.partials.copyright', compact('article'))
                        @include('articles.partials.footer', compact('article'))
                        @include('articles.partials.nav-link', compact('article'))
                    </div>
                    @include('partials.comments', compact('article'))
                </div>
                <div class="sidebar col-lg-3 d-none d-lg-block">
                    @include('partials.sidebar', compact('article'))
                </div>
            </div>
        </div>
    </main>
    @include('articles.partials.related', compact('article'))
    @include('partials.footer')
@endsection
