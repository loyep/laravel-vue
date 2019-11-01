@extends('layouts.user')

@section('content')
    <main class="py-4">
        <div class="container">
            @if($posts->isNotEmpty())
                <div class="row-md list-grouped list-bordered-padding" id="articles">
                    @include('user.partials.post-card')
                </div>
                {!! $posts->links() !!}
            @else
                <div class="content-error h-v-50">
                    <div class="text-center m-auto">
                        <div class="w-96 mx-auto">
                            @include('user.partials.empty')
                        </div>
                        <div class="text-sm text-muted mt-4">看起来这里没有任何东西…</div>
                    </div>
                </div>
            @endif
        </div>
    </main>
@endsection