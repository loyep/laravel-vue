@extends('layouts.app')

@section('content')
    @include('posts.contents.' . $post->type ?? 'default')
    @include('posts.partials.dock')
    @include('posts.partials.related')
@endsection
