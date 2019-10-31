@php
    $navClass = 'navbar navbar-expand-md';
    $logo = '';
    $index_menu_style = 'dark';
    $fixed = $fixed ?? false;
    if ($fixed && isset($index_menu_style) && ($index_menu_style === 'immersed' || $index_menu_style === 'dark' || $index_menu_style == 'image')) {
        $navClass .= ' fixed-top';
        $logo = asset('images/logo.png');
    } else {
        $logo = asset('images/logo-dark.png');
    }
    $name = $name ?? config('app.name');
    $mainMenu = collect([]); //Blog::navigation('main');
    $mobileMenu = collect([]); //Blog::navigation('mobile', false);
@endphp

<header class="header">
    <nav class="{{ $navClass }}">
        <div class="container">
            <a href="{{ url('/') }}" rel="home" class="navbar-brand m-0 order-1">
                @if (!empty($logo))
                    <img src="{{ $logo }}" alt="{{ $name }}">
                @else
                    <span class="text-white text-uppercase h2">{{ $name }}</span>
                @endif
            </a>
            <ul class="nav nav-submenu align-items-center flex-row flex-shrink-0 order-2 order-md-3">
                <li class="nav-item">
                    <search-link class="nav-link px-2">
                        <i class="text-lg el-icon-search"></i>
                    </search-link>
                </li>
                <li class="nav-item d-none d-lg-inline-block">
                    <a href="{{ route('history') }}" class="nav-link px-2" target="_blank">
                        <i class="text-lg el-icon-time"></i>
                    </a>
                </li>
                <li class="nav-item d-lg-none">
                    <a href="#" id="sidebar-mobile-trigger" class="nav-link px-2">
                        <i class="text-lg" custom="iconfont icon-menu"></i>
                    </a>
                </li>
                @include('partials.app-header-user')
            </ul>
            <div class="collapse navbar-collapse show navbar-scroll order-3 order-md-2 mx-md-4">
                <ul class="navbar-nav main-menu d-none d-lg-flex mx-auto px-4">
                    @if (!empty($mainMenu))
{{--                        @include('components.menus.items', ['items' => $mainMenu, 'showChild' => true])--}}
                    @endif
                </ul>
                <ul class="navbar-nav mobile-menu flex-row d-lg-none">
                    @if (!empty($mobileMenu))
{{--                        @include('components.menus.items', ['items' => $mobileMenu, 'showChild' => true])--}}
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>

