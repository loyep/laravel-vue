@php
    $showCat = isset($showCat) ? $showCat : true;
@endphp

@foreach($posts as $post)
    <div class="col-6 col-md-3 d-flex">
        <div class="list-item block">
            <div class="media media-3x2">
                <a class="media-content" href="{{ $post->link }}" target="_blank"
                   style="background-image: url('{{ $post->image }}');"
                   title="{{ $post->title }}">
                    <span class="overlay"></span>
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
                </a>
            </div>
            <div class="list-content">
                <div class="list-body">
                    <div class="d-none d-lg-block text-xs mb-1 list-cat-style">
                        <a href="{{ $post->category->link }}" class="text-muted" target="_blank">{{ $post->category->name }}</a>
                    </div>
                    <a href="{{ $post->link }}" class="list-title text-md h-2x" target="_blank">{{ $post->title }}</a>
                </div>
                <div class="list-footer d-flex align-items-center text-muted text-xs mt-2">
                    <div>{{ $post->published_date }}</div>
                    <div class="flex-fill"></div>
                    <div class="text-nowrap">
                        <span class="d-none d-lg-inline-block pr-2">
                            <i class="text-md iconfont icon-comment"></i> {{ $post->comments_count ?? 0 }}
                        </span>
                        <span class="d-none d-lg-inline-block">
                            <i class="text-md iconfont icon-eye"></i> {{ $post->views_count ?? 0 }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
