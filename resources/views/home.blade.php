@extends('layouts.app', ['fixed' => $slides->isNotEmpty() ])

@section('content')
    @include('partials.app-slide')
    <main class="py-3 py-md-4">
        <div class="container">
            {{--            @include('partials.notice')--}}
            {{--            @include('partials.pushes')--}}
            <section id="articles" class="row-md list-grouped list-bordered-padding">
                @include('posts.lists.small')
            </section>
            {{ $posts->links() }}
        </div>
    </main>
    {{--    @include('components.recommended.articles')--}}
@endsection
