{{--<aside id="sidebar" class="widget-area pt-5 pt-lg-0">--}}
{{--    @if($posts && count($posts) > 0)--}}
{{--    <section class="widget">--}}
{{--        <div class="widget-title">聚合文章</div>--}}
{{--        <div class="list-grid list-grid-padding list-bordered list-bordered-padding my-n3">--}}
{{--            @foreach($posts as $p)--}}
{{--                <div class="list-item py-3">--}}
{{--                    <div class="media media-4x3 col-4">--}}
{{--                        <a href="{{ $p->link }}" target="_blank" class="media-content"--}}
{{--                           style="background-image:url('{{ $p->image }}')"></a>--}}
{{--                        @if ('image' === $p->type)--}}
{{--                            <div class="media-action">--}}
{{--                             <span class="btn btn-icon btn-secondary btn-md rounded-circle">--}}
{{--                                 <span><i class="text-lg iconfont icon-picture"></i></span>--}}
{{--                             </span>--}}
{{--                            </div>--}}
{{--                        @elseif ('video' === $p->type)--}}
{{--                            <div class="media-action">--}}
{{--                             <span class="btn btn-icon btn-secondary btn-md rounded-circle">--}}
{{--                                 <span><i class="text-lg iconfont icon-music"></i></span>--}}
{{--                             </span>--}}
{{--                            </div>--}}
{{--                        @elseif ('audio' === $p->type)--}}
{{--                            <div class="media-action">--}}
{{--                             <span class="btn btn-icon btn-secondary btn-md rounded-circle">--}}
{{--                                 <span><i class="text-lg iconfont icon-play"></i></span>--}}
{{--                             </span>--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                    </div>--}}
{{--                    <div class="list-content">--}}
{{--                        <div class="list-body">--}}
{{--                            <a href="{{ $p->link }}" target="_blank" class="list-title text-sm h-2x">--}}
{{--                                {{ $p->title }}--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <div class="list-footer text-muted text-xs m-0">--}}
{{--                            <div>{{ $p->published_at }}</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </section>--}}
{{--        @endif--}}
{{--</aside>--}}