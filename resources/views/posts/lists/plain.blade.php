@php
    $showCat = isset($showCat) ? $showCat : true;
@endphp

@foreach($posts as $post)
    <div class="list-item">
        <div class="media media-3x2 col-5 col-md-4">
            <a class="media-content" href="https://apollo.2.demo.nicetheme.xyz/4621" target="_blank" style="background-image: url(&quot;https://apollo.2.demo.nicetheme.xyz/wp-content/uploads/2019/06/photo-1520358889634-04b1a67b3f0c.jpg&quot;);" title="电商混战618：数字狂欢背后，或现“水逆”隐忧" data-bg=" url('https://apollo.2.demo.nicetheme.xyz/wp-content/uploads/2019/06/photo-1520358889634-04b1a67b3f0c.jpg')" data-nclazyload="true" data-was-processed="true">
                <span class="overlay"></span>
            </a>
        </div>
        <div class="list-content py-lg-2">
            <div class="list-body">
                <a href="https://apollo.2.demo.nicetheme.xyz/4621" class="list-title text-lg h-2x">电商混战618：数字狂欢背后，或现“水逆”隐忧</a>
                <div class="list-subtitle text-sm text-muted d-none d-lg-block mt-lg-3"><span class="h-2x">编者按：本文来自微信公众号“iFeng科技”（ID：ifeng_tech），作者 孙洪，编辑 于浩。36氪经授权转载。
数字狂欢背后，电商行业或已陷入集体焦虑。
...</span></div>
            </div>
            <div class="list-footer d-flex align-items-center text-muted text-xs m-0">
                <div>4月前</div>
                <div class="flex-fill"></div>
                <div class="text-nowrap">
                                <span class="d-inline-block d-lg-none ">
                    <i class="text-md iconfont icon-preview"></i>
                    <small>1,143</small>
                </span>
                    <span class="d-none d-lg-inline-block  px-2 px-md-3">
                    <i class="text-md iconfont icon-comment"></i> 13                </span>
                    <span class="d-none d-lg-inline-block ">
                    <i class="text-md iconfont icon-like"></i> 51                </span>
                </div>
            </div>
        </div>
    </div>

    <div class="list-item custom-hover">
        <div class="media media-3x2 col-5 col-md-4">
            <a class="media-content" href="{{ $post->link }}" title="{{ $post->title }}">
                <img src="{{ url($post->image) }}" alt="{{ $post->title }}">
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
        <div class="list-content py-lg-2">
            <div class="list-body">
                @if ($showCat)
                    <div class="d-none d-lg-block text-xs mb-1 list-cat-style list-cat-dot-circle">
                        <i class="cat-dot" style="{{ 'border-color: #5d86dc;' }}"></i>
                        <a href="{{ $post->category->link }}"
                           class="text-muted">{{ $post->category->name }}</a>
                    </div>
                @endif
                <a href="{{ $post->link }}" class="list-title text-lg h-2x">{{ $post->title }}</a>
                <div class="list-subtitle text-sm text-muted d-none d-lg-block mt-lg-3">
                    <span class="h-2x">{{ $post->excerpt }}</span>
                </div>
            </div>
            <div class="list-footer d-flex align-items-center text-muted text-xs m-0">
                <div>{{ $post->published_date }}</div>
                <div class="flex-fill"></div>
                <div class="text-nowrap">
                    <span class="d-none d-lg-inline-block pr-2 px-md-2">
                        <i class="iconfont icon-comment"></i>
                        {{ $post->comments_count }}
                    </span>
                    <span class="d-none d-lg-inline-block">
                        <i class="iconfont icon-like"></i>
                        {{ $post->likes_count }}
                    </span>
                </div>
            </div>
        </div>
    </div>
@endforeach
