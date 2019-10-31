@if($post->cover)
<div class="post-cover post-image-cover bg-dark py-3 py-md-5">
    <div class="bg-effect bg-image-color"></div>
    <div class="bg-effect bg-cover bg-image-cover" style="background-image: url('{{ $post->cover }}')"></div>
    <div class="container">
        <div class="post-header text-center p-3 p-md-4">
            <h1 class="h3">{{ $post->title }}</h1>
            @include('posts.partials.meta-center')
        </div>
        <div class="block">
            <div class="media media-21x9">
                <div class="media-content " style="background-image: url('{{ $post->cover }}')"></div>
            </div>
        </div>
    </div>
</div>
@else
<div class="bg-light text-center py-5">
    <div class="container">
        <h1 class="post-title h3">{{ $post->title }}</h1>
        @include('posts.partials.meta-center')
    </div>
</div>
@endif
<main class="py-4 py-md-5">
    <div class="container">
        <div class="row justify-content-lg-center">
            <div class="col-12 col-lg-10 px-lg-5">
                <div class="post">
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
