@php
    $style = 'small';
    $grid_class = 'row-md list-archive list-grouped list-tb-padding';
@endphp

@extends('layouts.app')

@section('content')
    @include('partials.header', ['name' => Prism::name(), 'fixed' => false])
    @include('components.top.post', compact('topPosts'))
    <main class="py-4 py-md-5">
        <div class="container">
            <div class="card bg-dark bg-cover rounded mb-4 mb-md-5">
                <div class="bg-dark-overlay rounded">
                    <div class="d-md-flex align-items-md-center">
                        <div class="position-relative p-5">
                            <div class="d-flex flex-column flex-md-row justify-content-start">
				               	<span class="avatar w-64">
                                    <img src="{{ $user->avatar }}" alt="{{ $user->name }}" height="64" width="64"/>
								</span>
                                <div class="mx-md-3">
                                    <h5 class="text-white mt-3 mt-md-2">{{ $user->display_name }}</h5>
                                    <div class="text-white text-sm mt-2 mt-md-0">
                                        <span class="h-2x">{!! $user->description !!}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <span class="flex-fill"></span>
                        <div class="d-flex flex-nowrap align-items-center flex-shrink-0 p-5 mx-n2">
				            <span class="text-white text-md-center p-2">
				                <span class="font-theme text-xl">{{ $user->posts_count }}</span>
				                <small class="d-md-block text-light">文章</small>
				            </span>
                            <span class="text-white text-md-center p-2">
				                <span class="font-theme text-xl">0</span>
				                <small class="d-md-block text-light">评论</small>
				            </span>
                            <span class="text-white text-md-center p-2">
				                <span class="font-theme text-xl">0</span>
				                <small class="d-md-block text-light">赞</small>
				            </span>
                        </div>
                    </div>
                </div>
            </div>
            @if($style === 'plain')
                <div class="row justify-content-md-center">
                    <div class="col-md-9">
                        @endif
                        @if($posts->count() > 0)
                            <div class="search-list {{  $grid_class }}">
                                @foreach($posts as $post)
                                    @include('components.card.post', compact('post'))
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
                        @if($style === 'plain')
                    </div>
                </div>
            @endif
        </div>
    </main>
    @include('partials.footer')
@endsection
