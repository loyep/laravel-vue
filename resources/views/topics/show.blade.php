@php
    $style = $topic->list_style ?? 'small';
    $gridClass = 'row-md list-archive list-grouped list-bordered-padding';

    if ($style == 'plain') $grid_class = 'list-grid list-grid-padding list-bordered list-bordered-padding my-n4';
    if ($style == 'medium') $grid_class = 'row-lg list-archive list-grouped list-bordered-padding';
    if ($style == 'small') $grid_class = 'row-md list-archive list-grouped list-bordered-padding';
@endphp

@extends('layouts.app')

@section('content')
    <main class="py-3 py-md-5">
        <div class="container">
            <div class="card card-special-cover bg-dark mb-3 mb-md-5">
                <div class="bg-effect bg-dark bg-special"></div>
                <div class="bg-effect bg-cover"
                     style="background-image: url('{{ thumbnail($topic->image ?? 'images/bg.jpg') }}')"></div>
                <div class="bg-dark-overlay d-flex flex-fill">
                    <div class="position-relative text-center px-4 py-5 m-auto">
                        <div class="media rounded d-inline-block w-96">
                            <div class="media-content media-special"
                                 style="background-image: url('{{ thumbnail($topic->image ?? 'images/bg.jpg') }}')"></div>
                        </div>
                        <div class="pt-3">
                            <div class="h5 text-white">{{ $topic->name }}</div>
                            <div class="text-sm text-white h-2x mt-2 mt-md-2">{{ $topic->description }}</div>
                            <div class="text-xs text-light mt-2 mt-md-3">
                                <span class="px-2">文章 {{ $topic->posts_count ?? 0 }}</span>
                                <span class="px-2">阅读 {{ $topic->views_count ?? 0 }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="arrow-next d-md-none"><i class="iconfont icon-arrowdown"></i></div>
            </div>
            @if($style === 'plain')
                <div class="row justify-content-md-center">
                    <div class="col-lg-9">
                        @endif
                        @if($posts->isNotEmpty())
                            <div class="{{ $gridClass }}" id="articles">
                                @include('posts.lists.' . $style ?? 'small', ['showCat' => true])
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
