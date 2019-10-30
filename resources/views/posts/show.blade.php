@extends('layouts.app')

@section('content')
    @include('posts.contents.default')
    @include('posts.partials.dock')
    @include('posts.partials.related')
@endsection