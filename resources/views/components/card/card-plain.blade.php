<div class="list-item custom-hover">
    <div class="media media-3x2 col-5 col-md-4">
        <a class="media-content" href="{{ $article->getLink() }}" target="_blank">
            <img src="{{ $article->image }}" alt="{{ $article->title }}">
            <span class="overlay"></span>
        </a>

        @if ('image' === $article->type)
            <div class="media-action">
                <i class="iconfont icon-pic-s"></i>
            </div>
        @endif

        @if ('video' === $article->type)
            <div class="media-action">
                <i class="iconfont icon-bofang"></i>
            </div>
        @endif

        @if ('audio' === $article->type)
            <div class="media-action">
                <i class="iconfont icon-yinle"></i>
            </div>
        @endif
    </div>
    <div class="list-content py-lg-2">
        <div class="list-body">
            <?php //if (!is_single() && !(is_category() || $template_params['type'] == 'cat')): ?>
            <?php //get_template_part_with_vars("template-parts/post-cards/partials/card-cat", array('style' => 'plain', 'cat' => $category[0])); ?>
            <?php //endif; ?>
            <a href="{{ $article->getLink() }}" class="list-title text-lg h-2x">{{ $article->title }}</a>
            <div class="list-subtitle text-sm text-muted d-none d-lg-block mt-lg-3">
                <span class="h-2x">{{ $article->excerpt }}</span>
            </div>
        </div>
        <div class="list-footer d-flex align-items-center text-muted text-xs m-0">
            <div>{{ $article->getPublishedDate() }}</div>
            <div class="flex-fill"></div>
            <div class="text-nowrap">
                <span class="d-none d-lg-inline-block pr-2">
                    <i class="text-sm iconfont icon-view"></i>
                    {{ $article->views_count }}
                </span>

                @if ($article->allow_comment)
                    <span class="d-none d-lg-inline-block pr-2 px-md-3">
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
