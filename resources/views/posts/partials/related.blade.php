@php
    $related = $post->related();
@endphp

@if ($related->isNotEmpty())
    <section class="list-related bg-light py-4 py-md-5">
        <div class="container">
            <div class="list-header h5 mb-3 mb-md-4">
                <i class="text-xl text-primary iconfont icon-listview mr-1"></i>
                相关文章
            </div>
            <div class="list-grouped list-scroll-x">
                <div class="row-md">
                    @foreach($related as $relatedPost)
                        <div class="col-6 col-md-3">
                            <div class="list-item list-nice-overlay block custom-hover">
                                <div class="media media-3x2">
                                    <a href="{{ $relatedPost->link }}" class="media-content custom-hover-img"
                                       style="background-image:url('{{ $relatedPost->image }}')">
                                        <span class="overlay"></span>
                                    </a>
                                    @if ('image' === $relatedPost->type)
                                        <div class="media-action">
                                             <span class="btn btn-icon btn-secondary btn-md rounded-circle">
                                                 <span><i class="text-lg iconfont icon-picture"></i></span>
                                             </span>
                                        </div>
                                    @elseif ('video' === $relatedPost->type)
                                        <div class="media-action">
                                             <span class="btn btn-icon btn-secondary btn-md rounded-circle">
                                                 <span><i class="text-lg iconfont icon-music"></i></span>
                                             </span>
                                        </div>
                                    @elseif ('audio' === $relatedPost->type)
                                        <div class="media-action">
                                             <span class="btn btn-icon btn-secondary btn-md rounded-circle">
                                                 <span><i class="text-lg iconfont icon-play"></i></span>
                                             </span>
                                        </div>
                                    @endif
                                </div>
                                <div class="list-content">
                                    <div class="list-body">
                                        <a href="{{ $relatedPost->link }}"
                                           class="list-title h-2x">{{ $relatedPost->title }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endif
