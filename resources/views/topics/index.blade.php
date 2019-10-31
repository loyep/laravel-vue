@extends('layouts.app')

@section('content')
    <div class="bg-light py-4 py-md-5">
        <div class="container">
            <div class="row list-topic">
                @foreach($topTopics as $topTopic)
                    <div class="col-6 col-md-3">
                        <div class="list-item list-overlay block">
                            <div class="media">
                                <div class="media-content"
                                     style="background-image: url('{{ thumbnail($topTopic->image ?? 'images/bg.jpg') }}')">
                                    <span class="overlay"></span>
                                </div>
                            </div>
                            <div class="list-content">
                                <div class="list-body ">
                                    <a class="list-title m-auto text-center" href="{{ $topTopic->link }}"
                                       title="{{ $topTopic->name }}">
                                        <div class="h6 mb-2">{{ $topTopic->name }}</div>
                                        @if ($topTopic->description)
                                            <div class="list-subtitle d-none d-lg-block text-sm mb-2">
                                                <div class="h-2x">{{ $topTopic->description }}</div>
                                            </div>
                                        @endif
                                        <div class="list-meta text-xs">{{ $topTopic->posts_count ?? 0 }} 篇文章</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <main class="py-3 py-md-5">
        <div class="container">
            <div class="row list-topic my-n3">
                @foreach($topics as $topic)
                <div class="col-6 col-md-3 py-3">
                    <div class="list-item list-overlay block">
                        <div class="media">
                            <div class="media-content" style="background-image: url('{{ thumbnail($topic->image ?? 'images/bg.jpg') }}')">
                                <span class="overlay"></span>
                            </div>
                        </div>
                        <div class="list-content">
                            <div class="list-body ">
                                <a class="list-title m-auto text-center" href="{{ $topic->link }}" title="{{ $topic->name }}">
                                    <div class="h6 mb-2">{{ $topic->name }}</div>
                                    @if ($topic->description)
                                        <div class="list-subtitle d-none d-lg-block text-sm mb-2">
                                            <div class="h-2x">{{ $topic->description }}</div>
                                        </div>
                                    @endif
                                    <div class="list-meta text-xs">{{ $topic->posts_count ?? 0 }} 篇文章</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection
