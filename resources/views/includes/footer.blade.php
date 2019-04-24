@php

    $socials = [
        //'weibo' => '#'
    ]



@endphp

@if (config('prism.footer.layout', 'footer3') === 'footer1')
    <footer class="footer bg-white border-top border-light text-center py-4 py-md-5">
        <div class="container">
            @if (!empty($socials))
                <div class="footer-social text-md">
                    @foreach($socials as $name => $link)
                        <a href="{{ $link }}" target="_blank"
                           class="btn btn-light btn-icon btn-md btn-rounded mx-md-1">
                            <span><i class="iconfont icon-{{ $name }}"></i></span></a>
                    @endforeach
                </div>
            @endif
            <div class="footer-copyright text-muted mt-4">
                <?php
                //if (is_home() && $gabeian_button) : $footer_text .= ' <a href="' . $gabeian_link . '" target="_blank" rel="nofollow" class="d-none d-lg-inline-block"><i class="icon icon-beian"></i>' . $gabeian . '</a> '; endif;
                //if (is_home() && $miitbeian_button) : $footer_text .= ' <a href="http://www.miitbeian.gov.cn/" target="_blank" rel="nofollow" class="d-none d-lg-inline-block">' . $miitbeian . '</a>'; endif;
                //echo 'Copyright © ' . cosy19_get_footer_year() . ' <a href="' . get_bloginfo('url') . '" title="' . get_bloginfo('name') . '" rel="home">' . get_bloginfo('name') . '</a>. Designed by <a href="https://www.nicetheme.cn" title="NICETHEME-坚持有品位且光芒四射的用户体验设计" target="_blank">nicetheme</a>. ' . $footer_text;
                ?>
                Copyright © {{ date('Y') }} <a href="{{ url('/') }}" title="{{ 'Prism' }}" rel="home">{{ 'Prism' }}</a>.
                Designed by <a href="https://loyep.com" title="Prism" target="_blank">Prism</a>.
            </div>
        </div>
    </footer>
@else
    <footer class="footer bg-dark pt-4 pt-md-5">
        <div class="container">
            <div class="row my-n3">
                <div class="col py-3">
                    <div class="footer-widget pr-lg-5">
                        <div class="footer-widget-header">Prism</div>
                        <div class="footer-widget-content">
                            <p>美好源于热爱</p>
                        </div>
                        <div class="footer-widget-social mx-n2 mt-2">
                            @foreach($socials as $name => $link)
                                <a href="{{ $link }}" target="_blank" class="{{ $name }} px-2">
                                    <span><i class="iconfont icon-{{ $name }}"></i></span></a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 py-3">
                    <div class="footer-widget">
                        <div class="footer-widget-header">标签</div>
                        <div class="footer-widget-content">
                            <div class="footer-widget-links">
                                @php
                                    $tags = \App\Models\Tag::all();
                                @endphp

                                @foreach($tags as $tag)
                                <a href="{{ $tag->perm_link }}"
                                   target="">{{ $tag->name }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 py-3">
                    @if (Route::currentRouteName() === 'home')
                        <div class="footer-widget">
                            <div class="footer-widget-header">友链</div>
                            <div class="footer-widget-content">
                                <div class="footer-widget-links">
                                    @php
                                        $links = [
                                            [
                                                'url' => 'https://loyep.com',
                                                'name' => 'Loyep',
                                                'target' => '__blank'
                                            ]
                                        ];
                                        $links = json_decode(json_encode($links));
                                    @endphp
                                    @foreach($links as $link)
                                        <a href="{{ $link->url }}"
                                           target="{{ $link->target }}">{{ $link->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="footer-widget">
                            <div class="footer-widget-header">分类</div>
                            <div class="footer-widget-content">
                                <div class="footer-widget-links m-n1">
                                    <?php //if ($footer_widgets['third']['not_home_content']['type'] == 'menu'): ?>
                                    <?php
                                    //                                    echo strip_tags(wp_nav_menu(array(
                                    //                                        'menu' => $footer_widgets['third']['not_home_content']['menu'],
                                    //                                        'container' => false,
                                    //                                        'echo' => false,
                                    //                                        'items_wrap' => '%3$s',
                                    //                                        'depth' => 0,
                                    //                                    )), '<a>');
                                    ?>
                                    <?php //endif; ?>
                                    <?php //if ($footer_widgets['third']['not_home_content']['type'] == 'bookmark'): ?>
                                    <?php
                                    //                                $bookmarks = get_bookmarks(array(
                                    //                                    'category' => $footer_widgets['third']['not_home_content']['bookmarks']
                                    //                                ));
                                    ?>
                                    <?php //foreach($bookmarks as $bookmark): ?>
                                    <a href="<?php //echo $bookmark->link_url ?>"
                                       target="<?php // echo $bookmark->link_target ?>"><?php //echo $bookmark->link_name ?></a>
                                    <?php //endforeach; ?>
                                    <?php //endif; ?>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="footer-copyright border-top py-4 mt-4">
                Copyright © {{ date('Y') }} <a href="{{ url('/') }}" title="{{ 'Prism' }}" rel="home">{{ 'Prism' }}</a>.
                Designed by <a href="https://loyep.com" title="Prism" target="_blank">Prism</a>.
            </div>
        </div>
    </footer>
@endif
