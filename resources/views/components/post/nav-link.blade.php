@php
    $prevPost = \App\Models\Post::where('id', '<', $post->id)->orderBy('id', 'desc')->first();
    $nextPost = \App\Models\Post::where('id', '>', $post->id)->orderBy('id', 'asc')->first();

    $prevClass = empty($nextPost) ? 'col d-flex py-1' : 'col-12 col-md-6 d-flex py-1';
    $nextClass = empty($prevPost) ? 'col d-flex py-1' : 'col-12 col-md-6 d-flex py-1';
@endphp

<div class="row-sm my-n1 pt-5">
    @if (!empty($prevPost))
        <div class="{{ $prevClass }}">
            <div class="list-item list-auto-overlay custom-hover">
                <div class="media media-4x1">
                    <a class="media-content custom-hover-img" style="background-image: url('{{ $prevPost->image }}')">
                        <span class="overlay"></span>
                    </a>
                </div>
                <a href="{{ $prevPost->perm_link }}" class=" list-content">
                    <div class="list-body ">
                        <div class="list-title">
                            <div class="text-xs text-muted mb-2">{{ __('Previous') }}</div>
                            <div class="h-md-1x h-2x h6 text-white">
                                {{ $prevPost->title }}
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    @endif

    @if (!empty($nextPost))
        <div class="{{ $nextClass }}">
            <div class="list-item list-auto-overlay custom-hover">
                <div class="media media-4x1">
                    <a class="media-content custom-hover-img" style="background-image: url('{{ $nextPost->image }}')">
                        <span class="overlay"></span>
                    </a>
                </div>
                <a href="{{ $nextPost->perm_link }}" class="list-content">
                    <div class="list-body ">
                        <div class="list-title">
                            <div class="text-xs text-muted mb-2">{{ __('Next') }}</div>
                            <div class="h-md-1x h-2x h6 text-white">
                                {{ $nextPost->title }}
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    @endif
</div>