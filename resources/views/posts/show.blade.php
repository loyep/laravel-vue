@extends('layouts.app')

@section('page_title', getTitle($post->title))

@section('content')
    @include('posts.contents.' . $post->type ?? 'default')
    @include('posts.partials.dock')
    @include('posts.partials.related')
@endsection
