<main class="py-4 py-md-5">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-12 col-lg-10 p-lg-5">
                <div class="post">
                    @if (!empty($article->image))
                        <div class="post-cover mb-3 mb-md-5">
                            <div class="media media-2x1">
                                <div class="media-content" style="background-image:url('{{ $article->image }}')"></div>
                            </div>
                        </div>
                    @endif
                    <h1 class="post-title h3">{{ $article->title }}</h1>
                    @include('components.article.meta', compact('article'))
                    <div class="content-style content">
                        {!! $content !!}
                    </div>
                    @include('components.ad.article')
                    <div class="post-tags mt-3 mt-md-4">
                        @foreach($article->tags as $tag)
                            <a href="{{ $tag->permLink }}" rel="tag">{{ $tag->name }}</a>
                        @endforeach
                    </div>
                    @include('components.article.copyright', compact('article'))
                    @include('components.article.footer', compact('article'))
                    @include('components.article.nav-link', compact('article'))
                </div>
            </div>
            <div class="sidebar col-lg-3 d-none d-lg-block">
                <?php //get_template_part('template-parts/toc')?>
                @include('partials.sidebar')
            </div>
        </div>
    </div>
</main>
