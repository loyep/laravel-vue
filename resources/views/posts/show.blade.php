@extends('layouts.app')

@section('content')
    @include('layouts.partials.header', ['name' => 'Prism', 'fixed' => false])

    @include('layouts.partials.footer', ['name' => 'Prism'])
@endsection
