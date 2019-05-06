@extends('layouts.app')

@section('content')
    @include('partials.header')
    @include('components.content.' . ( $article->type ?? 'default' ), compact('article', 'content'))
    @include('components.article.related', compact('article'))
    @include('partials.footer')
@endsection
