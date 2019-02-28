<?php

$header_layout = (isset($header_layout) && $header_layout == 'center') ? 'container' : 'container-fluid';
$footer_style = 1;
?>

@if ($footer_style === 1)
    <footer class="nice-footer footer-black py-5">
        <div class="{{ $header_layout }} footer-container">
            <div class="d-flex w-100 flex-column">
                <ul class="d-flex justify-content-center footer-social"></ul>
                <div class="d-flex justify-content-center footer-copyright">
                    <p class="text-center text-muted font-12">Copyright © {{ date('Y') }}
                        <a href="{{ url('/') }}" title="'{{ config('app.name') }}" rel="home">{{ config('app.name') }}</a>. {{ footer_info() }}
                        Designed by <a href="https://github.com/loyep/grace" target="_blank">Grace</a>.
                    </p>
                </div>
            </div>
        </div>
    </footer>
@else
    <footer class="nice-footer footer-style-2 {{ $footer_style === 2 ? '' : 'footer-black' }}">
        <div class="container">
            <div class="footer-top">
                <div class="row">
                    <div class="col-12 col-lg-5 mb-5 mb-lg-0">
                        <aside class="footer-widget footer-widget-text">
                            <h3 class="widget-title">
                                关于我们
                            </h3>
                            <div class="text-widget">
                                <p>{{ '' }}</p>
                            </div>
                        </aside>
                        <aside class="footer-widget footer-widget-social mt-3">
                            <ul>
                                <li data-toggle="tooltip" title="微信">
                                    <a data-selector="#footer_qrcode-1" data-module="miPopup" href="javascript:void(0);"
                                       class="link btn-social-weixin">
                                        <i class="fab fa-weixin"></i>
                                    </a>
                                    <div id="footer_qrcode-1" class="dialog-suxing">
                                        <div class="dialog-content dialog-wechat-content">
                                            <p class="text-secondary">微信</p>
                                            <img src="#" alt="微信">
                                            <div class="btn-close">
                                                <i class="icon icon-close"></i>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a data-toggle="tooltip" href="#" class="link" title="微博" target="_blank">
                                        <i class="fab fa-weibo">
                                        </i>
                                    </a>
                                </li>
                            </ul>
                        </aside>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 offset-lg-1 mb-4 mb-lg-0">
                        <aside class="footer-widget footer-widget-categories">
                            <h3 class="widget-title">目录</h3>
                            <ul>
                                <li class="menu-item"><a href="{{ url('/') }}">首页</a></li>
                            </ul>
                        </aside>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <aside class="footer-widget footer-widget-links">
                            <h3 class="widget-title">朋友</h3>
                            <ul>
                                <li><a href="https://get233.com/" title="Hran 的博客" target="_blank">Hran</a></li>
                            </ul>
                        </aside>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="row">
                    <div class="col-12 col-md-12 footer-copyright">
                        <p class="text-center text-muted font-12">Copyright © {{ date('Y') }}
                            <a href="{{ url('/') }}" title="'{{ config('app.name') }}" rel="home">{{ config('app.name') }}</a>. {{ footer_info() }}
                            Designed by <a href="https://github.com/loyep/grace" target="_blank"
                                           class="text-secondary">Grace</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
@endif

<div class="scroll-to-top floating-button d-sm-none d-none d-sm-block">
    <a href="#">
        <i class="fal fa-angle-up">
        </i>
    </a>
</div>
