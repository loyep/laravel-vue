@php
    $relatedArticles = \App\Models\Article::take(4)->get();
@endphp

<section class="list-related bg-light py-4 py-md-5">
    <div class="container">
        <div class="list-header h4 mb-3 mb-md-4">{{ __('prism.article.related') }}</div>
        <div class="list-grouped list-scroll-x">
            <div class="row-md">
                @foreach($relatedArticles as $relatedArticle)
                <div class="col-6 col-md-3">
                    <div class="list-item list-nice-overlay custom-hover">
                        <div class="media media-3x2">
                            <a href="{{ $relatedArticle->getLink() }}" class="media-content custom-hover-img" style="background-image:url('{{ $relatedArticle->image }}')">
                                <span class="overlay"></span>
                            </a>
                            @include('components.card.media-icon', ['type' => $relatedArticle->type])
                        </div>
                        <div class="list-content">
                            <div class="list-body">
                                <a href="{{ $relatedArticle->getLink() }}" class="list-title h-2x">{{ $relatedArticle->title }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
