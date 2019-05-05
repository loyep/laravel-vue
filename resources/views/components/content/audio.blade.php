<main class="py-4 py-md-5">
    <div class="container">
        @include('components.breadcrumbs', compact('post'))
        <div class="row no-gutters">
            <div class="col-12 col-lg-9 pr-lg-5">
                <div class="post">
                    <h1 class="post-title h3">{{ $post->title }}</h1>
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
            <div class="sidebar col-lg-3 d-none d-lg-block">
                <?php //get_sidebar() ?>
            </div>
        </div>
    </div>
</main>
