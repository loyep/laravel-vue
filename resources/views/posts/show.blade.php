@extends('layouts.app')

@section('content')
    @include('partials.header')
    @include('components.content.' . $post->format, compact('post', 'content'))
    @include('components.post.related', compact('post'))
    @include('partials.footer')
@endsection
