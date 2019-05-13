<div class="col-md-4 d-flex">
    <div class="list-item block custom-hover">
        <div class="media media-3x2">
            <a class="media-content" href="{{ $article->getLink() }}" target="_blank">
                <img src="{{ $article->image }}" alt="{{ $article->title }}">
                <span class="overlay"></span>
            </a>
            @include('components.card.media-icon', ['type' => $article->type])
        </div>
        <div class="list-content">
            <div class="list-body">
                <a href="{{ $article->getLink() }}" class="list-title text-md h-2x" target="_blank">{{ $article->title }}</a>
            </div>
            <div class="list-footer d-flex align-items-center text-muted text-xs mt-2">
                <div>{{ $article->getPublishedDate() }}</div>
                <div class="flex-fill"></div>
                <div class="text-nowrap">
                    <span class="d-none d-lg-inline-block pr-2">
                        <i class="text-sm iconfont icon-view"></i>
                        {{ $article->views_count }}
                    </span>
                    @if ($article->allow_comment)
                        <span class="d-none d-lg-inline-block pr-2">
                            <i class="text-sm iconfont icon-duanxin"></i>
                            {{ $article->comments_count }}
                         </span>
                    @endif
                    <span class="d-none d-lg-inline-block">
                    <i class="iconfont icon-shoucang"></i>
                        {{ $article->likes_count }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
