@php
    $socials = [
        'github' => 'https://github.com/loyep/dawn'
    ]; //Blog::socials();
    $info = []; //Blog::info();
    $description = $info['description'] ?? '';
    $name = config('app.name'); //Cosy::name();
    $year = implode('-', array_flip(array_flip([$info['year'] ?? date('Y'), date('Y')])));
@endphp

@if(config('blog.footer.theme', 'dark') === 'dark')
    <footer class="footer bg-dark pt-4 pt-md-5">
        <div class="container">
            <div class="row my-n3">
                <div class="col py-3">
                    <div class="footer-widget pr-lg-5">
                        <div class="footer-widget-header">关于我</div>
                        <div class="footer-widget-content">
                            <p>{{ $description }}</p>
                        </div>
                        <div class="footer-widget-social mx-n2 mt-2">
                            @foreach($socials as $social => $value)
                                @if (is_array($value))
                                    <a href="javascript:" class="single-popup {{ $social }} px-2"
                                       data-img="{{ $value['img'] }}" data-title="{{ $value['title'] }}"
                                       data-desc="{{ $value['desc'] }}"><i class="iconfont icon-{{ $social }}"></i></a>
                                @else
                                    <a href="{{ $value }}" target="_blank" class="px-2" rel="nofollow">
                                        <span><i class="iconfont icon-{{ $social }}"></i></span>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 py-3">
                    <div class="footer-widget">
                        <div class="footer-widget-header">{{ __('专题推荐') }}</div>
                        <div class="footer-widget-content">
                            <div class="footer-widget-links">
                                @foreach($topics as $topic)
                                    <a href="{{ $topic->link }}" target="_self">{{ $topic->name }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 py-3">
                    <div class="footer-widget">
                        <div class="footer-widget-header">{{ __('友情链接') }}</div>
                        <div class="footer-widget-content">
                            <div class="footer-widget-links">
                                @foreach($links as $link)
                                    <a href="{{ $link->url }}" target="{{ $link->target }}">
                                        {{ $link->name }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-copyright text-xs border-top border-secondary py-3 py-md-4 mt-3 mt-md-4">
                Copyright © {{ $year }} <a href="{{ url('/') }}" title="{{ $name }}" rel="home">{{ $name }}</a>.
                Designed by <a href="https://loyep.com" title="Dawn" target="_blank">Loyep</a>.
                @if(routeIs('home') && !empty(config('dawn.app.miitbeian')))
                    <a href="http://beian.miit.gov.cn/" target="_blank" rel="nofollow"
                       class="d-none d-lg-inline-block">{{ config('dawn.app.miitbeian') }}
                    </a>
                @endif
            </div>
        </div>
    </footer>
@else
    <footer class=" border-top border-light py-3 py-md-5">
        <div class="container">
            <div class="footer-top footer-siteinfo d-flex flex-fill align-items-lg-center flex-column flex-lg-row">
                <div class="flex-fill text-muted text-xs  order-2 order-lg-1">
                    <span class="d-inline-block">Copyright © {{ $year }} <a href="{{ url('/') }}" title="{{ $name }}" rel="home">{{ $name }}</a>. All rights reserved.</span>
                    <span class="d-inline-block">Designed by <a class="text-muted" href="https://www.loyep.com" target="_blank">Loyep</a>.</span>
                </div>
                <div class="list-site-social d-lg-flex flex-lg-nowrap order-1 order-lg-2 mt-2 mt-md-0 mb-3 mb-lg-0">
                    @foreach($socials as $social => $value)
                        @if (is_array($value))
                            <a href="javascript:" class="{{ $social }} btn btn-icon btn-light btn-rounded mr-2 mr-lg-0 ml-lg-2"
                               data-img="{{ $value['img'] }}" data-title="{{ $value['title'] }}"
                               data-desc="{{ $value['desc'] }}"><i class="iconfont icon-{{ $social }}"></i></a>
                        @else
                            <a href="{{ $value }}" target="_blank" class="btn btn-icon btn-light btn-rounded mr-2 mr-lg-0 ml-lg-2" rel="nofollow">
                                <span><i class="iconfont icon-{{ $social }}"></i></span>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>

        </div>
    </footer>
@endif

<el-backtop>
    <div class="icon-stack">
        <i class="text-xs el-icon-arrow-up"></i>
        <span class="back-to-top-text">Top</span>
    </div>
</el-backtop>

