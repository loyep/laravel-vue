@php
    $socials = [
        'github' => 'https://github.com/loyep/dawn'
    ]; //Blog::socials();
    $info = []; //Blog::info();
    $description = $info['description'] ?? '';
    $name = config('app.name'); //Cosy::name();
    $year = implode('-', array_flip(array_flip([$info['year'] ?? date('Y'), date('Y')])));
@endphp

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
        <div class="footer-copyright text-xs border-top py-4 mt-4">
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

<el-backtop>
    <div class="icon-stack">
        <i class="text-xs el-icon-arrow-up"></i>
        <span class="back-to-top-text">Top</span>
    </div>
</el-backtop>

@includeIf('components.popup.search')
