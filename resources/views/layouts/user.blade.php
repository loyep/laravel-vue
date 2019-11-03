<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('page_title', 'Dawn')</title>
    <meta name="keywords" content="{{ $keywords ?? '' }}" />
    <meta name="description" content="{{ $description ?? '' }}" />

    <meta property="og:type" content="article">
    <meta property="og:title" content="@yield('page_title', 'Dawn')">
    <meta property="og:description" content="{{ $description ?? config('blog.description') }}">
    <meta property="og:image" content="{{ asset('favicon.ico') }}">

    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="@yield('page_title', 'Dawn')">
    <meta name="twitter:description" content="{{ $description ?? config('blog.description') }}">
    <meta name="twitter:image" content="{{ asset('favicon.ico') }}">

    <link rel="apple-touch-icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}">
    <meta name="msapplication-TileImage" content="{{ asset('favicon.ico') }}">

    <link href="{{ mix('css/app.css', 'static/app') }}" rel="stylesheet">
</head>
<body class="nice-style-radius nice-style-shadow nice-style-border">
<div id="app">
    @include('partials.app-header')
    <div class="bg-dark bg-cover" style="background-image: url('{{ thumbnail(Auth::user()->cover ?? '/images/bg/bg-1.jpg') }}');">
        <div class="bg-dark-overlay pt-4 pt-md-5">
            <div class="container">
                <div class="d-flex flex-fill flex-column flex-md-row align-items-md-center py-4 py-md-5">
                    <div class="mb-3 mb-md-0">
					<span class="flex-avatar w-96 rounded">
						<img alt="" src="{{ Auth::user()->avatar }}" height="96" width="96">
                    </span>
                    </div>
                    <div class="text-white mx-md-4 flex-fill">
                        <div class="name text-lg">{{ Auth::user()->display_name }}<i class="cut"></i><span class="badge badge-rank badge-primary text-xs mx-1">投稿者</span></div>
                        <div class="desc text-sm mt-2"></div>
                        <div class="data text-lg mt-2">
							<span class="mr-3">
								<a href="" class="">
									<span class="font-theme text-lg text-white">{{ Auth::user()->articles_count ?? 0 }}</span><small class=" text-xs text-light mx-1">文章</small>
								</a>
							</span>
                            <span class="mr-3">
								<a href="" class="">
									<span class="font-theme text-lg text-white">{{ Auth::user()->comments_count ?? 0 }}</span><small class=" text-xs text-light mx-1">评论</small>
								</a>
							</span>
                            <span class="mr-3">
								<a class="">
									<span class="font-theme text-lg text-white">{{ Auth::user()->likes_count ?? 0 }}</span><small class=" text-xs text-light mx-1">赞</small>
								</a>
							</span>
                            <span>
								<a>
									<span class="font-theme text-lg text-white points">{{ Auth::user()->likes_count ?? 0 }}</span><small class=" text-xs text-light mx-1">积分</small>
								</a>
							</span>
                        </div>
                    </div>
                </div>
                <div class="apollo-header-action">
                    <a href="javascript:;" class="change-cover-image">
                        <el-tooltip content="自定义封面图" placement="top">
                            <el-button type="primary" circle icon="el-icon-camera-solid"></el-button>
                        </el-tooltip>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="navbar-apollo mt-3 mt-md-4">
            <div class="nav">
                <a href="{{ route('user.home') }}" class="nav-link {{ routeIs('user.home') ? 'active' : '' }}">
                    <el-tooltip content="我的主页">
                        <span class="d-block" >
                            <i class="text-xl iconfont icon-home"></i>
                        </span>
                    </el-tooltip>
                </a>
                <a href="{{ route('user.posts') }}" class="nav-link {{ routeIs('user.posts') ? 'active': '' }}">
                    <el-tooltip content="我的文章">
                        <span class="d-block" >
                            <i class="text-xl iconfont icon-posts"></i>
                        </span>
                    </el-tooltip>
                </a>
                <a href="{{ route('user.comments') }}" class="nav-link {{ routeIs('user.comments') ? 'active': '' }}">
                    <el-tooltip content="我的评论">
                        <span class="d-block" >
                            <i class="text-xl iconfont icon-comment"></i>
                        </span>
                    </el-tooltip>
                </a>
                <a href="{{ route('user.favorites') }}" class="nav-link {{ routeIs('user.favorites') ? 'active': '' }}">
                    <el-tooltip content="我的收藏">
                        <span class="d-block" >
                            <i class="text-xl iconfont icon-uncollect"></i>
                        </span>
                    </el-tooltip>
                </a>
                <a href="{{ route('user.profile') }}" class="nav-link {{ routeIs('user.profile') ? 'active': '' }}">
                    <el-tooltip content="账户设置">
                        <span class="d-block" >
                            <i class="text-xl iconfont icon-setting"></i>
                        </span>
                    </el-tooltip>
                </a>
            </div>
        </div>
    </div>
    @yield('content')
    <footer>
        <div class="container">
            <div class="footer-copyright text-muted text-center text-xs py-5">
                Copyright © {{ date('Y') }} <a href="{{ url('/') }}" title="{{ config('app.name') }}" rel="home">
                    {{ config('app.name') }}
                </a>
            </div>
        </div>
    </footer>
</div>
<script src="{{ mix('js/app.js', 'static/app') }}"></script>
</body>
</html>
