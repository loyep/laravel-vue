@extends('layouts.app')

@section('content')
    @include('partials.header', ['name' => Prism::name(), 'fixed' => false])
    @component('components.content.default', compact('post', 'content'))

    @endcomponent
    @include('partials.footer')
@endsection
