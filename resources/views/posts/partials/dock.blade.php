<div id="page-tabbar" class="page-tabbar">
    <div class="container d-flex flex-row justify-content-around align-items-center py-1 h-100">

        <a class="py-2 d-inline-block" href="#comments">
            <el-badge class="comments-badge" value="{{ $post->comments_count ?? 0 }}" :max="99">
                <i class="text-height-xs iconfont icon-comment"></i>
            </el-badge>
        </a>

        <like-link id="{{ $post->id }}" class="{{ $isLiked ? 'current': '' }} post-like py-2 d-inline-block">
            <el-badge class="like-badge" value="{{ $post->likes_count ?? 0 }}" :max="99">
                <i class="text-height-xs iconfont icon-unlike"></i>
            </el-badge>
        </like-link>

        @auth
            <favorite-link id="{{ $post->id }}" class="py-2 d-inline-block post-collection" href="javascript:;">
                <el-badge class="collection-badge" value="3" :max="99">
                    <i class="text-height-xs iconfont icon-uncollect"></i>
                </el-badge>
            </favorite-link>
        @endauth

        <a class="py-2 d-inline-block" id="btn-bigger-cover" href="javascript:;">
            <i class="text-height-xs iconfont icon-zhuanfa"></i>
        </a>
    </div>
</div>