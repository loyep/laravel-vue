@php

$navClass = '';
$logo = '';
$index_menu_style = 'dark';
 if (isset($index_menu_style) && ($index_menu_style == 'immersed' || $index_menu_style == 'dark' || $index_menu_style == 'image')) {
    $navClass = 'fixed-top';
    $logo = asset('images/logo-dark.png');
} else {
    $logo = asset('images/logo.png');
}

@endphp
<header class="header">
    <nav class="{{ $navClass }}">
        <div class="navbar navbar-expand-lg">
            <div class="container">
                <a href="{{ url('/') }}" rel="home" class="navbar-brand m-0 order-1 order-lg-1">
                    @if (!empty($logo))
                        <img src="{{ $logo }}" class="" alt="{{ 'Prism' }}">
                    @else
                        <span class="text-white">PRISM</span>
                    @endif
                </a>
                <div class="collapse navbar-collapse order-lg-2">
                    <ul class="navbar-nav main-menu mx-auto px-4">
                        <?php
                        //                        if ( function_exists( 'wp_nav_menu' ) && has_nav_menu('menu-1') ) {
                        //                            wp_nav_menu( array( 'container' => false, 'items_wrap' => '%3$s', 'theme_location' => 'menu-1' ) );
                        //                        } else {
                        //                            _e('<li><a href="/wp-admin/nav-menus.php">Please set up your first menu at [Admin -> Appearance -> Menus]</a></li>', 'cosy19');
                        //                        }
                        ?>
                    </ul>
                </div>
                <ul class="nav nav-pills nav-submenu align-items-center order-2 order-lg-3">
                    <li class="nav-item">
                        <a href="#" class="nav-link search-popup"><i class="text-lg iconfont icon-sousuo"></i></a>
                    </li>
                    <li class="nav-item d-none d-lg-inline-block">
                        <a href="#" class="nav-link" target="_blank"><i class="text-lg iconfont icon-time"></i></a>
                    </li>
                    <li class="nav-item d-lg-none">
                        <a class="nav-link" href="#" id="sidebar-mobile-trigger"><i class="text-lg iconfont icon-menu-outline"></i></a>
                    </li>
                    @auth
                    <li class="nav-item">
                        <a href="#" class="nav-link pr-lg-0">
                            <span class="avatar w-32">
                                <img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}"/>
                            </span>
                        </a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link sign-link active" href="#">登录</a>
                    </li>
                    @endauth
                </ul>
                <form role="search" method="get" class="navbar-search-wrap" action="{{ route('search') }}"
                      style="display: none;">
                    <input type="search" class="form-control navbar-search-input" placeholder="Type Something..." name="s">
                    <i class="iconfont icon-quxiao" id="navbar-search-close"></i>
                </form>
            </div>
        </div>
        <div class="navbar-collapse navbar-scroll d-lg-none">
            <div class="container">
                <ul class="navbar-nav flex-row">
                    <?php
                    //                    if ( function_exists( 'wp_nav_menu' ) && has_nav_menu('menu-3') ) {
                    //                        wp_nav_menu( array( 'container' => false, 'items_wrap' => '%3$s', 'theme_location' => 'menu-3', 'depth' => 1 ) );
                    //                    } else {
                    //                        _e('<li><a href="/wp-admin/nav-menus.php">Please set up your first menu at [Admin -> Appearance -> Menus]</a></li>', 'cosy19');
                    //                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
</header>

