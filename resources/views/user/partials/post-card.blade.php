<div class="row my-n2 my-md-n3">
    @foreach($posts as $post)
        <div class="col-12 col-md-4 col-xl-3 d-flex py-2 py-md-3">
            <div class="post-card list-item block">
                <div class="post-card-header">
                    <div class="d-flex flex-fill align-items-center p-3">
                        <a class="flex-avatar w-36 mr-2">
                            <img alt="" src="{{ $post->user->avatar }}" height="36" width="36">
                        </a>
                        <div class="flex-fill text-height-xs">
                            <div>
                                <a href="{{ $post->user->link }}"
                                   class="d-inline-block text-sm">{{ $post->user->display_name }}
                                    <i class="cut"></i>
                                    <span class="badge badge-rank badge-primary text-xs mx-1">Administrator</span>
                                </a>
                            </div>
                            <div>
                                <time class="d-inline-block text-muted text-xs">{{ $post->published_date }}</time>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="post-card-body">
                    <div class="media media-3x2 mb-3">
                        <a class="media-content" href="{{ $post->link }}" target="_blank" style="background-image: url('{{ thumbnail($post->image ?? 'images/bg.jpg') }}');">
                            <span class="overlay"></span>
                        </a>
                        <div class="media-overlay overlay-top"></div>
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
                    <div class="post-card-content px-3">
                        <a href="{{ $post->link }}" class="text-md h-2x" target="_blank"></a>
                    </div>
                </div>
                <div class="post-card-footer">
                    <div class="font-theme text-muted text-xs p-3">
                        <span class="mr-3">
                            <i class="text-lg iconfont icon-comment"></i> <small>{{ $post->comments_count ?? 0 }}</small>
                        </span>
                        <span class="pr-3">
                            <i class="text-lg iconfont icon-eye"></i> <small>{{ $post->views_count ?? 0 }}</small>
                        </span>
                        <span class="pr-3">
                            <i class="text-lg iconfont icon-unlike"></i> <small>{{ $post->likes_count ?? 0 }}</small>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
