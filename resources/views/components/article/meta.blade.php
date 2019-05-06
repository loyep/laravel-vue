<div class="post-meta d-flex align-items-center flex-row text-sm text-muted my-4">
    <div class="flex-fill d-flex align-items-center">
        <div class="author-avatar">
            <a href="{{ $article->user->getLink() }}" class="author-popup">
                <img alt='{{ $article->user->display_name }}' src='{{ $article->user->avatar }}' class='avatar w-40' height='40' width='40'/>
            </a>
        </div>
        <div class="author-name d-flex flex-wrap flex-column mx-2 mx-md-3">
            <div class="text-md">
                <a href="{{ $article->user->getLink() }}" class="author-popup">
                    {{ $article->user->display_name }}
                </a>
            </div>
            <div class="text-xs text-muted">
                <time class="date mr-1">{{ $article->getPublishedDate() }}</time><i class="d-none d-md-inline-block">{{ __('prism.article.on') }}</i>
                <a class="text-secondary" href="{{ $article->category->getLink() }}" rel="category tag" target="_blank">
                    {{ $article->category->name }}
                </a>
            </div>
        </div>
    </div>
    <div class="post-data text-nowrap align-items-center">
        <span class="d-none d-md-inline-block">
            <i class="text-lg iconfont icon-view"></i>
            <small>{{ number_format($article->views_count) }}</small>
        </span>
        @if ($article->allow_comment)
            <span class="d-none d-md-inline-block">
            <a href="#comments">
                <i class="text-lg iconfont icon-duanxin"></i>
                <small>{{ number_format($article->comments_count) }}</small>
            </a>
        </span>
        @endif
        <span class="d-inline-block">
            <like-button id="{{ $article->id }}" count="{{ number_format($article->likes_count) }}" value="{{ $article->isLiked() }}">
                <i class="text-lg iconfont icon-shoucang"></i>
            </like-button>
        </span>
    </div>
</div>
