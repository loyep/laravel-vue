<div id="post-action" class="post-action pt-5">
    <div class="d-none d-md-block text-center">
        <div class="mx-1">
            <like-link id="{{ $post->id }}" class="btn btn-light btn-xl btn-icon btn-rounded {{ $isLiked ? ' current' : '' }} post-like">
                <span class="flex-column text-height-xs">
                    <i class="text-lg iconfont icon-like"></i>
                    <small class="font-theme like-count">{{ number_format($post->likes_count) }}</small>
                </span>
            </like-link>
        </div>
    </div>
    <div class="d-md-none text-center mb-3">
        <span class="d-inline-block w-80 border-bottom border-light mb-1"></span>
        <span class="font-theme text-xs text-muted mx-2">分享本文</span>
        <span class="d-inline-block w-80 border-bottom border-light mb-1"></span>
    </div>
    @include('posts.partials.share', compact('post'))
</div>

{{--@include('components.popup.author', ['author' => $post->user])--}}