@php
    $style = isset($style) ? $style : 'small';
    $gridClass = 'row-md list-archive list-grouped list-bordered-padding';

    if ($style == 'plain') $grid_class = 'list-archive list-grid list-grid-padding list-bordered list-bordered-padding my-n3 my-md-n4';
    if ($style == 'medium') $grid_class = 'row-lg list-archive list-grouped list-bordered-padding';
    if ($style == 'small') $grid_class = 'row-md list-archive list-grouped list-bordered-padding';
@endphp

@extends('layouts.app')

@section('content')
    <main class="py-4 py-md-5">
        <div class="container">
            @if($style === 'plain')
                <div class="row justify-content-md-center">
                    <div class="col-md-9">
                        @endif
                        <div class="list-header p-0 mb-3">
                            <div class="h4">
                                搜索：<span>{{ $search ?? '' }}</span>
                            </div>
                        </div>
                        @if($posts->isNotEmpty())
                            <div class="{{ $grid_class }}" id="posts">
                                @include('posts.lists.small')
                            </div>

                            {{ $posts->links() }}
                        @else
                            <div class="content-error h-v-66">
                                <div class="w-128 mx-auto mb-4">
                                    @include('partials.not-found-svg')
                                </div>
                                <p class="text-lg text-muted mt-5">看起来这里没有任何东西…</p>
                            </div>
                        @endif
                        @if($style === 'plain')
                    </div>
                </div>
            @endif
        </div>
    </main>
@endsection
