@php
    $style = $author->list_style ?? 'small';
    $gridClass = 'row-md list-author list-grouped list-bordered-padding';

    if ($style == 'plain') $grid_class = 'list-archive list-grid list-grid-padding list-bordered list-bordered-padding my-n3 my-md-n4';
    if ($style == 'medium') $grid_class = 'row-lg list-archive list-grouped list-bordered-padding';
    if ($style == 'small') $grid_class = 'row-md list-archive list-grouped list-bordered-padding';

    if ($style == 'plain') $grid_class = 'list-author list-grid list-grid-padding list-bordered list-bordered-padding my-n4';
    if ($style == 'medium') $grid_class = 'row-lg list-author list-grouped list-bordered-padding';
    if ($style == 'small') $grid_class = 'row-md list-author list-grouped list-bordered-padding';
@endphp

@extends('layouts.app')

@section('page_title', getTitle($author->display_name))

@section('content')
    <div class="bg-dark bg-cover" style="background-image: url('{{ thumbnail($author->cover ?? 'images/bg.jpg') }}')">
        <div class="bg-dark-overlay pt-4 pt-md-5">
            <div class="container">
                <div class="d-flex flex-fill flex-column flex-md-row align-items-md-center py-4 py-md-5">
                    <div class="mb-3 mb-md-0">
                        <span class="flex-avatar w-96 rounded">
                            <img alt="" src="{{ $author->avatar }}" class="avatar avatar-96 photo" height="96"
                                 width="96">
                        </span>
                    </div>
                    <div class="text-white mx-md-4 flex-fill">
                        <div class="name text-lg">{{ $author->display_name }}</div>
                        <div class="desc text-sm mt-2">{{ $author->description }}</div>
                        <div class="data text-lg mt-2">
							<span class="mr-3">
                                <span class="font-theme text-lg text-white">{{ $author->posts_count }}</span>
                                <small class=" text-xs text-light mx-1">文章</small>
							</span>
                            <span class="mr-3">
                                <span class="font-theme text-lg text-white">{{ $author->comments_count ?? 0 }}</span>
                                <small class=" text-xs text-light mx-1">评论</small>
							</span>
                            <span class="mr-3">
                                <span class="font-theme text-lg text-white">{{ $author->likes_count ?? 0 }}</span>
                                <small class=" text-xs text-light mx-1">喜欢</small>
							</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <main class="py-4 py-md-5">
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
