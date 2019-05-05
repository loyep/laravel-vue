<main class="py-4 py-md-5">
    <div class="container">
        @if (!empty($post->image))
        <div class="post-cover">
            <div class="d-flex flex-fill bg-img bg-dark text-center h-v-33" style="background-image: url('{{ $post->image }}');">
                <div class="d-flex flex-fill flex-column align-items-center bg-dark-overlay py-5">
                    <div class="m-auto p-4">
                        <h1 class="h3 text-white">{{ $post->title }}</h1>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="row justify-content-lg-center">
            <div class="col-12 col-lg-10 px-lg-5">
                <div class="post">
                    @include('components.post.meta', compact('post'))
                    <div class="content-style content">
                        {!! $content !!}
                    </div>
                    <div class="post-tags mt-3 mt-md-4">
                        @foreach($post->tags as $tag)
                            <a href="{{ $tag->permLink }}" rel="tag">{{ $tag->name }}</a>
                        @endforeach
                    </div>
                    @include('components.post.copyright', compact('post'))
                    @include('components.post.footer', compact('post'))
                    @include('components.post.nav-link', compact('post'))
                </div>
            </div>
        </div>
    </div>
</main>
