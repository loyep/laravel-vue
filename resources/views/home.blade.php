@extends('layouts.app')

@section('content')
    @include('partials.header', ['fixed' => true])
    @include('partials.magazine')
    <main class="py-3 py-md-5">
        <div class="container">
            @include('partials.notice')
            @include('partials.pushes')
            <section class="list-home row-md list-grouped list-tb-padding">
                @foreach($posts as $post)
                    @include('components.card.post', compact('post'))
                @endForeach
            </section>
            {!! $posts->links() !!}
        </div>
    </main>
    @include('partials.footer', ['name' => 'Prism'])
@endsection
