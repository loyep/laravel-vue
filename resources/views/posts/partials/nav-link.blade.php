@php
    $previous = $post->previous();
    $next = $post->next();

    $classes = empty($next) || empty($previous) ? 'col py-1' : 'col-12 col-md-6 py-1';
@endphp

<div class="post-next-prev list-grouped row-sm my-n1 pt-5">
    @if (!empty($previous))
        <div class="{{ $classes }}">
            <div class="list-item list-overlay block">
                <div class="media media-3x1">
                    <a class="media-content" style="background-image: url('{{ $previous->image }}')">
                        <span class="overlay"></span>
                    </a>
                </div>
                <div class="list-content p-3 p-md-4">
                    <div class="list-body ">
                        <a href="{{ $previous->link }}" class="list-title" title="{{ $previous->title }}">
                            <div class="h-2x h6 text-white">
                                {{ $previous->title }}
                            </div>
                        </a>
                    </div>
                    <div class="list-footer">
                        <div class="text-xs text-muted">上一篇</div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if (!empty($next))
        <div class="{{ $classes }}">
            <div class="list-item list-overlay block">
                <div class="media media-3x1">
                    <a class="media-content" style="background-image: url('{{ $next->image }}')">
                        <span class="overlay"></span>
                    </a>
                </div>
                <div class="list-content p-3 p-md-4">
                    <div class="list-body ">
                        <a href="{{ $next->link }}" class="list-title" title="{{ $next->title }}">
                            <div class="h-2x h6 text-white">
                                {{ $next->title }}
                            </div>
                        </a>
                    </div>
                    <div class="list-footer">
                        <div class="text-xs text-muted">下一篇</div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
