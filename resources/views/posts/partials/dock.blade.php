<div id="page-tabbar" class="page-tabbar">
    <div class="container d-flex flex-row justify-content-around align-items-center py-1 h-100">
        <a class="py-2 d-inline-block" href="#comments">
            <i class="text-xl text-height-xs iconfont icon-comment"></i>
            <span class="font-theme badge badge-pill badge-danger">{{ $post->comments_count ?? 0 }}</span>
        </a>

        <like-link id="{{ $post->id }}" class="{{ $isLiked ? 'current': '' }} post-like py-2 d-inline-block">
            <i class="text-xl iconfont icon-unlike"></i>
            <span class="font-theme badge badge-pill badge-danger like-count">{{ $post->likes_count ?? 0 }}</span>
        </like-link>

        @auth
            <a class="py-2 d-inline-block" href="javascript:;">
                <i class="text-xl text-height-xs iconfont icon-uncollect"></i>
                <span class="font-theme badge badge-pill badge-danger collection-count">0</span>
            </a>
        @endauth

        <a class="py-2 d-inline-block" id="btn-bigger-cover" href="javascript:;">
            <i class="text-xl text-height-xs iconfont icon-zhuanfa"></i>
        </a>
    </div>
</div>