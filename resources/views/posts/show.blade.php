@extends('layouts.app')

@section('content')
    @include('partials.header')
    @include('components.content.' . ( $post->type ?? 'default' ), compact('post', 'content'))
    @include('components.post.related', compact('post'))
    @include('partials.footer')
@endsection
