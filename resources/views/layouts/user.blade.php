<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Dawn') }}</title>
    <link href="{{ mix('css/app.css', 'static/app') }}" rel="stylesheet">
</head>
<body >
<div id="app">
    @include('partials.app-header')
    <div class="bg-dark bg-cover" style="background-image: url('{{ Auth::user()->cover ?? asset('/images/bg/bg-1.jpg') }}');">
        <div class="bg-dark-overlay pt-4 pt-md-5">
            <div class="container">
                <div class="d-flex flex-fill flex-column flex-md-row align-items-md-center py-4 py-md-5">
                    <div class="mb-3 mb-md-0">
					<span class="flex-avatar w-96 rounded">
						<img alt="" src="{{ Auth::user()->avatar }}" class="avatar avatar-96 photo avatar-default" height="96" width="96"><span class="avatar-status avatar-bottom"><span class="badge badge-pill badge-info font-theme text-xs mx-1">Lv.1</span></span>					</span>
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
                        <el-button type="primary" circle icon="el-icon-camera-solid"></el-button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="navbar-apollo mt-3 mt-md-4">
            <div class="nav">
                <a href="{{ route('user.home') }}" class="nav-link {{ routeIs('user.home') ? 'active' : '' }}">
                    <span class="d-block" >
                        <i class="text-xl iconfont icon-home"></i>
                    </span>
                </a>
                <a href="{{ route('user.posts') }}" class="nav-link {{ routeIs('user.posts') ? 'active': '' }}">
                    <span class="d-block" >
                        <i class="text-xl iconfont icon-posts"></i>
                    </span>
                </a>
                <a href="{{ route('user.comments') }}" class="nav-link {{ routeIs('user.comments') ? 'active': '' }}">
                    <span class="d-block" >
                        <i class="text-xl iconfont icon-comment"></i>
                    </span>
                </a>
                <a href="{{ route('user.favorites') }}" class="nav-link {{ routeIs('user.favorites') ? 'active': '' }}">
                    <span class="d-block" >
                        <i class="text-xl iconfont icon-uncollect"></i>
                    </span>
                </a>
                <a href="{{ route('user.profile') }}" class="nav-link {{ routeIs('user.profile') ? 'active': '' }}">
                    <span class="d-block" >
                        <i class="text-xl iconfont icon-setting"></i>
                    </span>
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
