@php
    $relatedPosts = \App\Models\Post::take(4)->get();
@endphp

<section class="list-related bg-light py-4 py-md-5">
    <div class="container">
        <div class="list-header h4 mb-3 mb-md-4">{{ __('prism.post.related') }}</div>
        <div class="list-grouped list-scroll-x">
            <div class="row-md">
                @foreach($relatedPosts as $relatedPost)
                <div class="col-6 col-md-3">
                    <div class="list-item list-nice-overlay custom-hover">
                        <div class="media media-3x2">
                            <a href="{{ $relatedPost->perm_link }}" class="media-content custom-hover-img" style="background-image:url('{{ $relatedPost->image }}')"><span class="overlay"></span></a>
                            <?php //if ('image' == get_post_format()): ?>
{{--                            <div class="media-action">--}}
{{--                                <i class="iconfont icon-pic-s"></i>--}}
{{--                            </div>--}}
                            <?php //endif; ?>
                            <?php //if ('video' == get_post_format()): ?>
{{--                            <div class="media-action">--}}
{{--                                <i class="iconfont icon-bofang"></i>--}}
{{--                            </div>--}}
                            <?php //endif; ?>
                            <?php //if ('audio' == get_post_format()): ?>
{{--                            <div class="media-action">--}}
{{--                                <i class="iconfont icon-yinle"></i>--}}
{{--                            </div>--}}
                            <?php //endif; ?>
                        </div>
                        <div class="list-content">
                            <div class="list-body">
                                <a href="{{ $relatedPost->perm_link }}" class="list-title h-2x">{{ $relatedPost->title }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>