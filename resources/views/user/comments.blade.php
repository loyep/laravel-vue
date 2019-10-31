@extends('layouts.user')

@section('content')
    <main class="py-3 py-md-4">
        <div class="container">
            <div class="content-error h-v-50">
                <div class="text-center m-auto">
                    <div class="w-96 mx-auto">
                        @include('user.partials.empty')
                    </div>
                    <div class="text-sm text-muted mt-4">看起来这里没有任何东西…</div>
                </div>
            </div>
        </div>
    </main>
@endsection