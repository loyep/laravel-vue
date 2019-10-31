
<main class="py-4 py-md-5">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-12 col-lg-10 p-lg-5">
                <div class="post">
                    @if($post->cover)
                    <div class="post-cover mb-3 mb-md-4">
                        <div class="media media-2x1">
                            <div class="media-content" style="background-image:url('{{ thumbnail($post->cover) }}')">
                                <div class="overlay"></div>
                            </div>
                            <div class="media-overlay overlay-top justify-content-end p-3 p-md-4">
                                <like-link id="{{ $post->id }}" class="mx-1 mx-md-2">
                                    <a class="{{ $isLiked ? 'current' : '' }} post-like" href="javascript:;">
                                        <i class="text-xl iconfont icon-unlike"></i>
                                        <small class="like-count font-theme text-lg">{{ number_format($post->likes_count) }}</small>
                                    </a>
                                </like-link>
                            </div>
                            <div class="media-overlay overlay-bottom flex-column align-items-start p-3 p-md-4">
                                <h1 class="post-title h3 text-white mb-2 mb-md-3">{{ $post->title }}</h1>
                                <div class="post-data text-sm d-flex align-items-center w-100">
                                    <div class="d-flex align-items-center">
                                        <a href="#" class="author-popup flex-avatar w-28">
                                            <img alt="" src="{{ $post->user->avatar }}" height="28" width="28">
                                        </a>
                                        <a href="{{ $post->user->link }}" class="author-popup text-white mx-2">{{ $post->user->display_name }}</a>
                                        <time class="date mr-2">{{ $post->published_date }}</time>
                                        <i class="d-none d-md-inline-block">发布在</i>
                                        <a class="d-none d-md-inline-block text-white" href="{{ $post->category->link }}" rel="category tag" target="_blank">{{ $post->category->name }}</a>
                                    </div>
                                    <div class="flex-md-fill"></div>
                                    <div>
                                        <span class="d-none d-md-inline-block mx-2">
                                             <i class="text-lg iconfont icon-eye"></i>
                                             <small class="font-theme">{{ $post->views_count ?? 0 }}</small>
                                        </span>
                                        <span class="d-none d-md-inline-block">
                                            <i class="text-lg iconfont icon-comment"></i>
                                            <small class="font-theme">{{ $post->comments_count ?? 0 }}</small>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <h1 class="post-title h3">{{ $post->title }}</h1>
                        @include('posts.partials.meta')
                    <div class="border-top py-2 py-md-3"></div>
                    @endif
                    <div class="post-content">
                        {!! $post->html() !!}
                    </div>
                    <div class="post-tags mt-3 mt-md-4">
                        @foreach($post->tags as $tag)
                            <a href="{{ $tag->link }}" rel="tag">{{ $tag->name }}</a>
                        @endforeach
                    </div>
                    @include('posts.partials.copyright')
                    @include('posts.partials.footer')
                    @include('posts.partials.nav-link')
                </div>
            </div>
        </div>
    </div>
</main>
