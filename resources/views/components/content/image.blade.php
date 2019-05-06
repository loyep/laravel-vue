<main class="py-4 py-md-5">
    <div class="container">
        @if (!empty($article->image))
        <div class="post-cover">
            <div class="d-flex flex-fill bg-img bg-dark text-center h-v-33" style="background-image: url('{{ $article->image }}');">
                <div class="d-flex flex-fill flex-column align-items-center bg-dark-overlay py-5">
                    <div class="m-auto p-4">
                        <h1 class="h3 text-white">{{ $article->title }}</h1>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="row justify-content-lg-center">
            <div class="col-12 col-lg-10 px-lg-5">
                <div class="post">
                    @include('components.article.meta', compact('article'))
                    <div class="content-style content">
                        {!! $content !!}
                    </div>
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
        </div>
    </div>
</main>
