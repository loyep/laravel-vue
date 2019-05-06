@extends('layouts.app')

@section('content')
    @include('partials.header', ['name' => Prism::name(), 'fixed' => false])

    <main class="py-4 py-md-5">
        <div class="container">
            <div class="list-header p-0 mb-3 mb-lg-4">
                <div class="h4 mb-2">{{ __('prism.history.title') }}</div>
                <p class="text-muted">{{ __('prism.history.description') }}</p>
            </div>
            @if($articles->count() > 0)
                <div class="row-md list-history list-grouped list-tb-padding">
                    @foreach($articles as $article)
                        @include('components.card.article', compact('article'))
                    @endforeach
                </div>
                {!! $articles->links() !!}
            @else
                <div class="content-error h-v-66">
                    @include('components.not-found-svg')
                    <p class="text-lg text-muted mt-5">
                        {{ __('It looks like nothing was found at this location. Maybe try one of the links below or a search?') }}
                    </p>
                </div>
            @endif
        </div>
    </main>
    @include('partials.footer')
@endsection
