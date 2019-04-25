<div class="col-6 col-md-3 d-flex">
    <div class="list-item block custom-hover">
        <div class="media media-3x2">
            <a class="media-content" href="{{ $post->perm_link }}" target="_blank">
                <img src="{{ $post->image }}" alt="{{ $post->title }}">
                <span class="overlay"></span>
            </a>

            @if ('image' === $post->format)
                <div class="media-action">
                    <i class="iconfont icon-pic-s"></i>
                </div>
            @endif

            @if ('video' === $post->format)
                <div class="media-action">
                    <i class="iconfont icon-bofang"></i>
                </div>
            @endif

            @if ('audio' === $post->format)
                <div class="media-action">
                    <i class="iconfont icon-yinle"></i>
                </div>
            @endif
        </div>
        <div class="list-content">
            <div class="list-body">
                @include('components.card.category', ['style' => 'small', 'cat' => $post->category])
                <a href="{{ $post->perm_link }}" class="list-title text-md h-2x"
                   target="_blank">{{ $post->title }}</a>
            </div>
            <div class="list-footer d-flex align-items-center text-muted text-xs mt-2">
                <div>{{ $post->published_at }}</div>
                <div class="flex-fill"></div>
                <div class="text-nowrap">
                     <span class="d-none d-lg-none ">
                        <i class="text-sm iconfont icon-view"></i>
                        <small>{{ $post->views }}</small>
                    </span>

                    @if ($post->allow_comment)
                        <span class="d-none d-lg-inline-block px-2">
                            <i class="text-sm iconfont icon-duanxin"></i>
                            {{ $post->comments_count }}
                        </span>
                    @endif

                    <span class="d-none d-lg-inline-block ">
                        <i class="iconfont icon-shoucang"></i> {{ $post->likes }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
