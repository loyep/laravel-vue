@extends('layouts.app')

@section('content')
    @include('partials.header', ['fixed' => true])
    @include('partials.magazine')
    <main class="py-3 py-md-5">
        <div class="container">
            @include('partials.notice')
            @include('partials.pushes')
            <section class="list-home row-md list-grouped list-tb-padding" id="articles">
                @foreach($articles as $article)
                    @include('components.card.article', compact('article'))
                @endForeach
            </section>
            @if (config('prism.app.ajax.home', true))
                @include('partials.navigation')
            @else
                {!! $articles->links() !!}
            @endif
        </div>
    </main>
    @include('components.recommended.articles')
    @include('partials.footer', ['name' => 'Prism'])
@endsection
