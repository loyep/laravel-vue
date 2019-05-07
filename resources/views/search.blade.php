@php
    $style = 'small';
    $grid_class = 'row-md list-archive list-grouped list-tb-padding';
@endphp

@extends('layouts.app')

@section('content')
    @include('partials.header', ['name' => Prism::name(), 'fixed' => false])
    <main class="py-4 py-md-5">
        <div class="container">
            @if($style === 'plain')
                <div class="row justify-content-md-center">
                    <div class="col-md-9">
                        @endif
                        <div class="list-header p-0 mb-3">
                            <div class="h4">
                                {{ __('prism.search.title') }}<span>{{ request()->q }}</span>
                            </div>
                        </div>
                        @if($articles->count() > 0)
                            <div class="{{ $grid_class }}" id="articles">
                                @foreach($articles as $article)
                                    @include('components.card.article', compact('article'))
                                @endforeach
                            </div>

                            @if (config('prism.app.ajax.home', true))
                                @include('components.article.navigation')
                            @else
                                {!! $articles->links() !!}
                            @endif
                        @else
                            <div class="content-error h-v-66">
                                @include('components.not-found-svg')
                                <p class="text-lg text-muted mt-5">
                                    {{  __('It looks like nothing was found at this location. Maybe try one of the links below or a search?') }}
                                </p>
                            </div>
                        @endif
                        <?php //get_template_part('template-parts/ad/tax-ad');?>
                        @if($style === 'plain')
                    </div>
                </div>
            @endif
        </div>
    </main>
    @include('partials.footer')
@endsection
