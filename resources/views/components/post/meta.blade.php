@php
    $is_liked = true;
@endphp

<div class="post-meta d-flex align-items-center flex-row text-sm text-muted my-4">
    <div class="flex-fill d-flex align-items-center">
        <div class="author-avatar">
            <a href="{{ $post->user->perm_link }}" class="author-popup">
                <img alt='{{ $post->user->display_name }}' src='{{ $post->user->avatar }}' class='avatar w-40'
                     height='40'
                     width='40'/>
            </a>
        </div>
        <div class="author-name d-flex flex-wrap flex-column mx-2 mx-md-3">
            <div class="text-md">
                <a href="{{ $post->user->perm_link }}" class="author-popup">
                    {{ $post->user->display_name }}
                </a>
            </div>
            <div class="text-xs text-muted">
                <time class="date mr-1">{{ $post->published_at }}</time><i class="d-none d-md-inline-block">{{ __('Posted on') }}</i>
                <a class="text-secondary" href="{{ $post->category->perm_link }}" rel="category tag" target="_blank">
                    {{ $post->category->name }}
                </a>
            </div>
        </div>
    </div>
    <div class="post-data text-nowrap align-items-center">
        <span class="d-none d-md-inline-block">
            <i class="text-lg iconfont icon-view"></i>
            <small>{{ $post->views }}</small>
        </span>
        @if ($post->allow_comment)
            <span class="d-none d-md-inline-block">
            <a href="#comments">
                <i class="text-lg iconfont icon-duanxin"></i>
                <small>{{ $post->comments_count ?? 0 }}</small>
            </a>
        </span>
        @endif
        <span class="d-inline-block">
            <like-button id="{{ $post->id }}" likes="{{ $post->likes }}" liked="{{ $post->isLiked() }}">
                <i class="text-lg iconfont icon-shoucang"></i>
            </like-button>
        </span>
    </div>
</div>
