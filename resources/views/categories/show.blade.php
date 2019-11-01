@php
    $style = $category->list_style ?? 'small';
    $gridClass = 'row-md list-archive list-grouped list-bordered-padding';

    if ($style == 'plain') $grid_class = 'list-archive list-grid list-grid-padding list-bordered list-bordered-padding my-n3 my-md-n4';
    if ($style == 'medium') $grid_class = 'row-lg list-archive list-grouped list-bordered-padding';
    if ($style == 'small') $grid_class = 'row-md list-archive list-grouped list-bordered-padding';
@endphp

@extends('layouts.app')

@section('page_title', getTitle($category->name))

@section('content')
{{--    @include('components.top.article')--}}
    <div class="category-cover">
        <div class="media media-5x1">
            <div class="media-content"
                 style="background-image: url('{{ thumbnail($category->image ?? 'images/bg.jpg') }}')">
                <div class="overlay"></div>
            </div>
            <div class="media-overlay">
                <div class="m-auto text-center">
                    <div class="text-xl">{{ $category->name }}</div>
                    <div class="text-md mt-lg-1"></div>
                </div>
            </div>
        </div>
    </div>
    <main class="py-3 py-md-5">
        <div class="container">
            @if($style === 'plain')
                <div class="row justify-content-md-center">
                    <div class="col-md-9">
                        @endif
                        @if($posts->isNotEmpty())
                            <div class="{{ $gridClass }}" id="articles">
                                @include('posts.lists.' . $style ?? 'small', ['showCat' => false])
                            </div>
                        @else
                            <div class="content-error h-v-66">
                                @include('components.not-found-svg')
                                <p class="text-lg text-muted mt-5">
                                    {{  __('It looks like nothing was found at this location. Maybe try one of the links below or a search?') }}
                                </p>
                            </div>
                        @endif
                        {{ $posts->links() }}
                        @if($style === 'plain')
                    </div>
                </div>
            @endif
        </div>
    </main>
@endsection
