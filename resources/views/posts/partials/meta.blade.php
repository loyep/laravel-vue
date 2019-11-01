<div class="post-meta d-flex align-items-center flex-row text-muted my-3 my-md-4">
    <div class="d-flex flex-fill align-items-center">
        <div class="author-popup  flex-avatar w-40">
            <img alt="" src="{{ $post->user->avatar }}" height="40" width="40">
        </div>
        <div class="author-name d-flex flex-wrap flex-column mx-2 mx-md-3">
            <div class="text-md">
                <a class="author-popup" href="{{ $post->user->link }}">
                    {{ $post->user->display_name }}
                </a>
            </div>
            <div class="text-xs text-muted">
                <time class="date mr-1">{{ $post->published_date }}</time><i class="d-none d-md-inline-block">发布在</i> <a class="text-secondary" href="{{ $post->category->link }}" target="_blank">{{ $post->category->name }}</a>
            </div>
        </div>
    </div>
    <div class="post-data d-none d-md-flex text-nowrap text-md ">
        <span class="mx-1 mx-md-2">
            <i class="text-lg iconfont icon-eye"></i>
            <small class="font-theme">{{ $post->views_count ?? 0 }}</small>
        </span>
        <span class="mx-1 mx-md-2">
            <a href="#comments">
                <i class="text-lg iconfont icon-comment"></i>
                <small class="font-theme">{{ $post->comments_count ?? 0 }}</small>
            </a>
        </span>
        <like-link id="{{ $post->id }}" class="{{ $isLiked ? 'current': '' }} post-like mx-1 mx-md-2">
            <i class="text-lg iconfont icon-unlike"></i>
            <small class="like-count font-theme">{{ number_format($post->likes_count) }}</small>
        </like-link>
    </div>
</div>
