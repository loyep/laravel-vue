@php
    $magazinePosts = \App\Models\Post::all();
    $index_menu_style = "immersed";
    $magazineClass = '';
    if ($index_menu_style == 'immersed' || $index_menu_style == 'dark' || $index_menu_style == 'image') {
        $magazineClass .= ' list-fixed';
    }

    if ($index_menu_style == 'plain') {
        $magazineClass .= ' bg-light ';
    }

    if ($index_menu_style == 'dark') {
        $magazineClass .= ' bg-dark';
    }
@endphp

<section class="list-magazine {{ $magazineClass}}">
    @if ($index_menu_style == 'immersed')
        <div class="bg-effect bg-dark bg-image-color"></div>
        <div class="bg-effect bg-cover bg-magazine"
             style="background-image: url('{{ asset('/app/images/bg.jpg') }}');"></div>
    @elseif($index_menu_style == 'image')
        <div class="bg-effect bg-cover" style="background-image:url('{{ asset('/app/images/bg.jpg') }}')"></div>
    @endif
    <div class="container">
        <div class="row-sm">
            <div class="col-12 col-md-6 d-flex">
                <div class="list-item list-nice-overlay custom-hover flex-fill">
                    @php
                        $firstPost = $magazinePosts->first();
                    @endphp
                    <div class="media d-flex flex-fill">
                        <a href="{{ $firstPost->perm_link }}" class="media-content"
                           style="background-image: url('{{ asset('/app/images/bg.jpg') }}')">
                            <span class="overlay"></span>
                        </a>
                    </div>
                    <div class="list-content">
                        <div class="list-body">
                            <a href="{{ $firstPost->perm_link }}" class="list-title text-lg h-2x" target="_blank">
                                {{ $firstPost->title }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 mt-2 mt-md-0">
                <div class="list-scroll-2x">
                    <div class="row-sm row-scroll my-n1 my-md-n2">
                        @foreach($magazinePosts->slice(1,4)->all() as $post)
                            <div class="col-6 py-1 py-md-2">
                                <div class="list-item list-nice-overlay custom-hover">
                                    <div class="media">
                                        <a href="{{ $post->perm_link }}" class="media-content"
                                           style="background-image: url('{{ asset('/app/images/bg.jpg') }}')">
                                            <span class="overlay"></span>
                                        </a>
                                    </div>
                                    <div class="list-content">
                                        <div class="list-body">
                                            <div class="mt-auto">
                                                <a href="{{ $post->perm_link }}" class="list-title text-md h-2x ">
                                                    {{ $post->title }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
