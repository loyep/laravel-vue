@extends('layouts.user')

@section('content')
    <main class="py-3 py-md-4">
        <div class="container">
            <div class="row-md list-grouped list-bordered-padding" id="articles">
                @foreach($comments as $comment)
                    <div class="col-12 col-md-4 d-flex py-2 py-md-3">
                        <div class="post-card p-4 block">
                            <div class="post-card-header  apollo-comment-header mb-3">
                                <div class="d-flex flex-fill  align-items-center">
                                    <div class="apollo-comment-avatar flex-avatar w-32 mr-2">
                                        <img src="{{ !empty($comment->user) ? $comment->user->avatar : getAvatar($comment->email) }}"
                                             height="32" width="32" alt="">
                                    </div>
                                    <div class="apollo-comment-name text-sm">{{ !empty($comment->user) ? $comment->user->display_name : $comment->name }}</div>
                                    <div class="flex-fill"></div>
                                    <div class="apollo-comment-action">
                                        <a href="javascript:;" class="d-inline-block btn-popup-user-comments">
                                            <i class="text-lg nice-icon apollo-iconcomment mr-1"></i>
                                            <small class="font-theme text-sm">0</small>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="post-card-body apollo-comment-body">
                                <div class="h-2x">
                                    {!! $comment->html() !!}
                                </div>
                            </div>
                            <div class="post-card-footer">
                                <div class="mt-2">
                                    <time class="text-xs text-muted">{{ $comment->created_at }}</time>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
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