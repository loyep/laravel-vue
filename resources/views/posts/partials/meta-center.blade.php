
<div class="post-meta d-flex align-items-center justify-content-center text-xs text-muted mt-3 mt-md-4">
    <div class="author-popup flex-avatar w-28 mr-2">
        <img alt="" src="{{ $post->user->avatar }}" class="avatar avatar-28 photo w-28" height="28" width="28">
    </div>
    <div class="author-name author-popup">{{ $post->user->display_name }}</div>
    <time class="date mx-1 mx-md-2">{{ $post->published_date }}</time>
    <span class="d-none d-md-inline-block mx-md-2"><i class="d-none d-md-inline-block mr-2">发布在</i><a href="{{ $post->category->link }}" rel="category tag" target="_blank">{{ $post->category->name }}</a></span>

    <span class="d-none d-md-inline-block mx-1 mx-md-2">
        <i class="text-md iconfont icon-eye"></i>
        <small class="font-theme">{{ $post->views_count ?? 0 }}</small>
    </span>
    <span class="d-none d-md-inline-block mx-1 mx-md-2">
        <a href="#comments">
            <i class="text-md iconfont icon-comment"></i>
            <small class="font-theme">{{ $post->comments_count ?? 0 }}</small>
        </a>
    </span>
    <like-link id="{{ $post->id }}" class="{{ $isLiked ? 'current': '' }} post-like d-none d-md-inline-block mx-1 mx-md-2">
        <i class="text-md iconfont icon-unlike"></i>
        <small class="like-count font-theme">{{ number_format($post->likes_count) }}</small>
    </like-link>
</div>
