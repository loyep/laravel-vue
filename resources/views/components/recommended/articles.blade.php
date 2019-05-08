@php
    $articles = \App\Models\Article::take(8)->get();
@endphp

@if ($articles->count() > 0)
    <section class="list-style-3 py-3 py-md-5 bg-light">
        <div class="container">
            <div class="list-header h4 text-center mb-3">最受欢迎
                <small class="text-md text-muted px-2 d-block">
                </small>
            </div>
            <div class="row-sm my-n2">
                @foreach($articles as $article)
                    <div class="col-6 col-md-3 py-2">
                        <div class="list-item list-nice-overlay custom-hover">
                            <div class="media media-3x2">
                                <a class="media-content" href="{{ $article->getLink() }}">
                                    <img src="{{ thumbnail($article->image) }}">
                                    <span class="overlay"></span>
                                </a>
                            </div>
                            <div class="list-content p-2">
                                <div class="list-body ">
                                    <a href="{{ $article->getLink() }}" class="list-title h-2x">
                                        {{ $article->title }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif

