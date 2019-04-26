@extends('layouts.app')

@section('content')
    @include('partials.header', ['name' => Prism::name(), 'fixed' => false])
    @include('partials.footer', ['name' => Prism::name()])
@endsection
