@if(!empty($topPosts))
    <div class="bg-light py-4 py-md-5">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-lg-9">
                    <div class="list-header h4 mb-3 mb-md-4">{{ __('Top Posts') }}</div>
                    <div class="list-grouped list-scroll-x">
                        <div class=" ">
                            @foreach($topPosts as $topPost)
                                <div class="">
                                    <div class="list-item list-nice-overlay custom-hover">
                                        <div class="media media-3x2">
                                            <a href="{{ $topPost->perm_link }}" class="media-content custom-hover-img"
                                               style="background-image:url('{{ $topPost->image }}')">
                                                <span class="overlay"></span>
                                            </a>
                                        </div>
                                        <div class="list-content ">
                                            <div class="list-body">
                                                <a href="{{ $topPost->perm_link }}"
                                                   class="list-title h-2x">{{ $topPost->title }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
