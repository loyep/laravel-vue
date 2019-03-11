<?php

$header_layout = get_option('header_layout', 'center');
$header_layout = $header_layout === 'center' ? 'container' : 'container-fluid';
?>

<section class="nice-mobile-overlay no-user-sign" id="nice-mobile-overlay">
    <div class="mobile-action">
        <button id="mobile-close-icon" class="btn btn-transparent btn-sm navbar-close color-white font-22 light-10">
            <i class="fal fa-times"></i>
        </button>
    </div>

    <nav class="mobile-navigation">
        <ul id="mobile-menu-id" class="mobile-menu">
            <?php
            //            if (function_exists('wp_nav_menu') && has_nav_menu('mobile-warp-nav')) {
            //                wp_nav_menu(array('container' => false, 'items_wrap' => '%3$s', 'theme_location' => 'mobile-warp-nav', 'depth' => 2));
            //            } else {
            //                echo '<li><a href="/wp-admin/nav-menus.php">请到[后台->外观->菜单]中设置菜单。</a></li>';
            //            }
            ?>
            <li><a href="/wp-admin/nav-menus.php">请到[后台->外观->菜单]中设置菜单。</a></li>
        </ul>
        @include('components.search.mobile')
    </nav>
</section>
@include('components.search.inner')
{{--Loading--}}
{{--<section class="main-preloader">--}}
{{--<div class="preloader-inner">--}}
{{--<div class="loader-inner ball-scale-multiple"><div></div><div></div><div></div></div>--}}
{{--</div>--}}
{{--</section>--}}
{{--End loading--}}
<header class="nice-header {{ get_option( 'mobile_header_layout', 'mobile-style01') }}">
    <div class="{{ $header_layout }} m-header">
        <div class="navbar navbar-expand-lg d-none d-lg-flex">
            <div class="navbar-header d-inline-block">
                <a class="navbar-brand text-center" href="{{ url('/') }}">
                    <span class="text-white">{{ config('grace.name') }}</span>
                </a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav navbar-site align-items-center flex-fill flex-nowrap">
                    <li><a href="{{ url('/') }}">首页</a></li>
                    @forelse ([] as $topMenu)

                    @empty
                        {{--<li><a href="#">请到[后台->外观->菜单]中设置菜单。</a></li>--}}
                    @endforelse
                </ul>
                <ul class="navbar-nav navbar-sign align-items-center">
                    <li>
                        <button class="btn btn-link btn-sm btn-search font-16 text-secondary px-2 py-0">
                            <i class="fal fa-search"></i>
                        </button>
                    </li>
                    <li>
                        <a href="{{ route('dashboard') }}" class="btn btn-outline-primary btn-sm btn-signin ml-2">登录</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="navbar mobile-navbar flex-row flex-nowrap d-flex d-lg-none">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ url('/') }}"
                   style="background-image: url('{{ asset('assets/admin/images/logo.png') }}');">
                    {{--{{ get_option('site_info')->name }}--}}
                </a>
                <a class="navbar-brand mobile-navbar-brand d-none d-lg-none" href="{{ url('/') }}"
                   style="background-image: url('{{ asset('assets/admin/images/logo.png') }}');">
                    {{--{{ get_option('site_info')->name }}--}}
                </a>
            </div>
            <div class="navbar-collapse">
                <ul class="navbar-nav flex-row">
                    <li><a href="/wp-admin/nav-menus.php">请到[后台->外观->菜单]中设置菜单。</a></li>
                </ul>
            </div>
            <button class="navbar-toggle mobile-navbar-toggle" id="mobile-menu-icon" type="button">
                <i class="icon icon-menu"></i>
            </button>
        </div>
    </div>
</header>
