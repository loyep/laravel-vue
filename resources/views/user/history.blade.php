@extends('layouts.app')

@section('content')
    <main class="py-4 py-md-5">
        <div class="container">
            <div class="list-header p-0 mb-3 mb-lg-4">
                <div class="h4 mb-2">最近浏览记录</div>
                <p class="text-muted">最近浏览记录最多保留20条记录</p>
            </div>

            @if($posts->isNotEmpty())
                <div class="row-md list-history list-grouped list-bordered-padding" id="articles">
                    @include('posts.lists.small')
                </div>
            @else
                <div class="content-error h-v-66">
                    <div class="w-256 mx-auto mb-4">
                        @include('partials.not-found-svg')
                    </div>
                    <p class="text-lg text-muted mt-5">看起来这里没有任何东西…</p>
                </div>
            @endif

            {{ $posts->links() }}
        </div>
    </main>
@endsection