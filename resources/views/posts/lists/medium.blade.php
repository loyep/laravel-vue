@php
    $showCat = isset($showCat) ? $showCat : true;
@endphp

@foreach($posts as $post)
    <div class="col-md-4 d-flex">
        <div class="list-item block custom-hover">
            <div class="media media-3x2">
                <a class="media-content" href="{{ $article->link }}" title="{{ $article->title }}"  >
                    <img src="{{ $article->thumbnail }}" alt="{{ $article->title }}">
                    <span class="overlay"></span>
                </a>
                @if ('image' === $post->type)
                    <div class="media-action">
                         <span class="btn btn-icon btn-secondary btn-md rounded-circle">
                             <span><i class="text-lg iconfont icon-picture"></i></span>
                         </span>
                    </div>
                @elseif ('video' === $post->type)
                    <div class="media-action">
                         <span class="btn btn-icon btn-secondary btn-md rounded-circle">
                             <span><i class="text-lg iconfont icon-music"></i></span>
                         </span>
                    </div>
                @elseif ('audio' === $post->type)
                    <div class="media-action">
                         <span class="btn btn-icon btn-secondary btn-md rounded-circle">
                             <span><i class="text-lg iconfont icon-play"></i></span>
                         </span>
                    </div>
                @endif
            </div>
            <div class="list-content">
                <div class="list-body">
                    @if ($showCat)
                        <div class="d-none d-lg-block text-xs mb-1 list-cat-style list-cat-dot-circle">
                            <i class="cat-dot" style="{{ 'border-color: #5d86dc;' }}"></i>
                            <a href="{{ $article->category->link }}"
                               class="text-muted">{{ $article->category->name }}</a>
                        </div>
                    @endif
                    <a href="{{ $article->link }}" class="list-title text-md h-2x">{{ $article->title }}</a>
                </div>
                <div class="list-footer d-flex align-items-center text-muted text-xs mt-2">
                    <div>{{ $article->published_date }}</div>
                    <div class="flex-fill"></div>
                    <div class="text-nowrap">
                        <span class="d-none d-lg-inline-block pr-2">
                            <i class="iconfont icon-comment"></i>
                            {{ $article->comments_count }}
                         </span>
                        <span class="d-none d-lg-inline-block">
                        <i class="iconfont icon-like"></i>
                            {{ $article->likes_count }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
