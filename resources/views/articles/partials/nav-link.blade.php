@php
    $prevArticle = $article->prevArticle();
    $nextArticle = $article->nextArticle();

    $prevClass = empty($nextArticle) ? 'col d-flex py-1' : 'col-12 col-md-6 d-flex py-1';
    $nextClass = empty($prevArticle) ? 'col d-flex py-1' : 'col-12 col-md-6 d-flex py-1';
@endphp

<div class="row-sm my-n1 pt-5">
    @if (!empty($prevArticle))
        <div class="{{ $prevClass }}">
            <div class="list-item list-auto-overlay custom-hover">
                <div class="media media-4x1">
                    <a class="media-content custom-hover-img" style="background-image: url('{{ $prevArticle->image }}')">
                        <span class="overlay"></span>
                    </a>
                </div>
                <a href="{{ $prevArticle->getLink() }}" class=" list-content">
                    <div class="list-body ">
                        <div class="list-title">
                            <div class="text-xs text-muted mb-2">{{ __('Previous') }}</div>
                            <div class="h-md-1x h-2x h6 text-white">
                                {{ $prevArticle->title }}
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    @endif

    @if (!empty($nextArticle))
        <div class="{{ $nextClass }}">
            <div class="list-item list-auto-overlay custom-hover">
                <div class="media media-4x1">
                    <a class="media-content custom-hover-img" style="background-image: url('{{ $nextArticle->image }}')">
                        <span class="overlay"></span>
                    </a>
                </div>
                <a href="{{ $nextArticle->getLink() }}" class="list-content">
                    <div class="list-body ">
                        <div class="list-title">
                            <div class="text-xs text-muted mb-2">{{ __('Next') }}</div>
                            <div class="h-md-1x h-2x h6 text-white">
                                {{ $nextArticle->title }}
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    @endif
</div>
