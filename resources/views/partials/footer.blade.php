@inject('prism', 'App\Services\PrismService')

@php
    $socials = $prism->socials();
    $description = $prism->description();
    $name = Prism::name();
    $year = $prism->year();
    $style = config('prism.theme.footer', 'light');
@endphp

@if($style === 'light')
    <footer class="footer bg-white border-top border-light text-center py-4 py-md-5">
        <div class="container">
            <div class="footer-widget-social text-md">
                @foreach($socials as $social => $link)
                    <a href="{{ $link }}" target="_blank" rel="nofollow"
                       class="btn btn-light btn-icon btn-md btn-rounded mx-md-1">
                        <span><i class="fa fa-{{ $social }}"></i></span>
                    </a>
                @endforeach
            </div>
            <div class="footer-copyright text-muted mt-4">
                Copyright © {{ $year }} <a href="{{ url('/') }}" title="{{ $name }}" rel="home">{{ $name }}</a>.
                Designed by <a href="https://loyep.com" title="Prism" target="_blank">Loyep</a>.
                @if(Route::currentRouteName() === 'home' && !empty(config('prism.app.miitbeian')))
                    <a href="http://beian.miit.gov.cn/" target="_blank" rel="nofollow"
                       class="d-none d-lg-inline-block">{{ config('prism.app.miitbeian') }}
                    </a>
                @endif
            </div>
        </div>
    </footer>
@else
    <footer class="footer bg-dark pt-4 pt-md-5">
        <div class="container">
            <div class="row my-n3">
                <div class="col py-3">
                    <div class="footer-widget pr-lg-5">
                        <div class="footer-widget-header">{{ $name }}</div>
                        <div class="footer-widget-content">
                            <p>{{ $description }}</p>
                        </div>
                        <div class="footer-widget-social mx-n2 mt-2">
                            @foreach($socials as $social => $link)
                                <a href="{{ $link }}" target="_blank" class="px-2" rel="nofollow">
                                    <span><i class="fa fa-{{ $social }}"></i></span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 py-3">
                    <div class="footer-widget">
                        <div class="footer-widget-header">{{ __('prism.footer.tags') }}</div>
                        <div class="footer-widget-content">
                            <div class="footer-widget-links">
                                @foreach($prism->footerTags() as $tag)
                                    <a href="{{ $tag->getLink() }}" target="_self">{{ $tag->name }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 py-3">
                    @routeis('home')
                        <div class="footer-widget">
                            <div class="footer-widget-header">{{ __('prism.footer.links') }}</div>
                            <div class="footer-widget-content">
                                <div class="footer-widget-links">
                                    @foreach($prism->links() as $link)
                                        <a href="{{ $link->url }}" target="{{ $link->target }}">
                                            {{ $link->name }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="footer-widget">
                            <div class="footer-widget-header">{{ __('prism.footer.categories') }}</div>
                            <div class="footer-widget-content">
                                <div class="footer-widget-links m-n1">
                                    @foreach($prism->footerCategories() as $category)
                                        <a href="{{ $category->getLink() }}" target="_self">
                                            {{ $category->name }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endrouteis
                </div>
            </div>
            <div class="footer-copyright border-top py-4 mt-4">
                Copyright © {{ $year }} <a href="{{ url('/') }}" title="{{ $name }}" rel="home">{{ $name }}</a>.
                Designed by <a href="https://loyep.com" title="Prism" target="_blank">Loyep</a>.
                @if(Route::currentRouteName() === 'home' && !empty(config('prism.app.miitbeian')))
                    <a href="http://beian.miit.gov.cn/" target="_blank" rel="nofollow"
                       class="d-none d-lg-inline-block">{{ config('prism.app.miitbeian') }}
                    </a>
                @endif
            </div>
        </div>
    </footer>
@endif

<back-top>
    <span class="icon-stack">
        <i class="text-xs iconfont icon-up"></i>
        <span class="back-to-top-text">{{ __('Top') }}</span>
    </span>
</back-top>
