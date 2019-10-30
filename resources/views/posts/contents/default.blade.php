<main class="py-4 py-md-5">
    <div class="container">
        @include('posts.partials.breadcrumbs')
        <div class="row no-gutters">
            <div class="col-12 col-lg-9 pr-lg-5">
                <div class="post">
                    @if($post->cover)
                        <div class="post-cover mb-4">
                            <div class="media media-3x1">
                                <div class="media-content" style="background-image:url('{{ $post->cover }}')"></div>
                            </div>
                        </div>
                    @endif
                    <h1 class="post-title h3">{{ $post->title }}</h1>
                    @include('posts.partials.meta')
                    <div class="border-top py-2 py-md-3"></div>
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
                <?php
                //                    if ( comments_open() || get_comments_number() ) :
                //                        comments_template();
                //                    endif;
                ?>
            </div>
            <div class="sidebar col-lg-3 d-none d-lg-block">
                <?php //get_template_part('template-parts/single-sidebar-control') ?>
            </div>
        </div>
    </div>
</main>