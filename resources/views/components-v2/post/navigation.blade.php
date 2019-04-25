<?php
$prev_post = \App\Models\Post::where('id', '<', $post->id)->orderBy('id', 'desc')->first();
$next_post = \App\Models\Post::where('id', '>', $post->id)->orderBy('id', 'asc')->first();

$prev_class = empty($next_post) ? 'col-12 col-sm-12 col-md-12 col-lg-12' : 'col-12 col-sm-12 col-md-12 col-lg-6';
$next_class = empty($prev_post) ? 'col-12 col-sm-12 col-md-12 col-lg-12' : 'col-12 col-sm-12 col-md-12 col-lg-6';
?>
<div class="post-navigation-with-image my-2">
    <div class="row row-10">
        @if (!empty($prev_post))
            <div class="item prev {{ $prev_class }}">
                <article>
                    <a href="{{ $prev_post->permLink }}" title="{{ $prev_post->title }}" target="_blank"
                       class="custom-hover d-block">
                        <div class="custom-hover-img image" style="background-image: url('{{ $next_post->image }}');">
                        </div>
                        <div class="d-flex align-items-center justify-content-center flex-column text-center content p-2 p-md-3">
                            <div class="meta font-12 text-light mb-1"><i class="fas fa-caret-left"></i> 上一篇</div>
                            <div class="title">
                                <h2 class="font-16 weight-600 text-l2 color-white">{{ $prev_post->title }}</h2>
                            </div>
                        </div>
                    </a>
                </article>
            </div>
        @endif
        @if (!empty($next_post))
            <div class="item next {{ $next_class }} mt-3 mt-lg-0">
                <article>
                    <a href="{{ $next_post->permLink }}" title="{{ $next_post->title }}" target="_blank"
                       class="custom-hover d-block">
                        <div class="custom-hover-img image" style="background-image: url('{{ $next_post->image }}');">
                        </div>
                        <div class="d-flex align-items-center justify-content-center flex-column text-center content p-2 p-md-3">
                            <div class="meta font-12 text-light mb-1">下一篇 <i class="fas fa-caret-right"></i></div>
                            <div class="title">
                                <h2 class="font-16 weight-600 text-l2 color-white">{{ $next_post->title }}</h2>
                            </div>
                        </div>
                    </a>
                </article>
            </div>
        @endif
    </div>
</div>
