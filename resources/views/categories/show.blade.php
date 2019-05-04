@php
    $style = $category->style;
    $gridClass = 'row-md list-archive list-grouped list-tb-padding';

    if ($style === 'plain') $gridClass = 'list-archive list-grid list-grid-padding list-bordered list-tb-padding my-n4';
    if ($style === 'medium') $gridClass = 'row-lg list-archive list-grouped list-tb-padding';
    if ($style === 'small') $gridClass = 'row-md list-archive list-grouped list-tb-padding';
@endphp

@extends('layouts.app')

@section('content')
    @include('partials.header')
    @include('components.top.post', compact('topPosts', 'style'))
    <main class="py-4 py-md-5">
        <div class="container">
            @if($style === 'plain')
                <div class="row justify-content-md-center">
                    <div class="col-md-9">
                        @endif
                        <div class="list-header mb-3 mb-md-4">
                            <div class="h4">
                                <span>{{ $category->name }}</span>
                            </div>
                        </div>
                        @if($posts->count() > 0)
                            <div class="{{ $gridClass }}">
                                @foreach($posts as $post)
                                    @include('components.card.card-' . $category->style , compact('post'))
                                @endforeach
                            </div>
                            {!! $posts->links() !!}
                        @else
                            <div class="content-error h-v-66">
                                @include('components.not-found-svg')
                                <p class="text-lg text-muted mt-5">
                                    {{  __('It looks like nothing was found at this location. Maybe try one of the links below or a search?') }}
                                </p>
                            </div>
                        @endif
                        <?php //get_template_part('template-parts/ad/tax-ad');?>
                        @if($style === 'plain')
                    </div>
                </div>
            @endif
        </div>
    </main>
    @include('partials.footer')
@endsection
