@extends('layouts.auth')

@section('content')
    <div class="sign-boby d-flex flex-fill flex-column px-4 py-5 px-3 px-lg-5 mt-n4 mt-md-0">
        <div class="sign-header font-theme text-xl text-center mb-4 mb-md-5">
            欢迎回来！
        </div>
        <div class="sign-others mb-4 mb-md-5 text-center">
            <button type="button" class="btn btn-light btn-icon btn-md btn-circle qq-login mx-2">
                <span><i class="text-md nice-icon apollo-iconqq"></i></span>
            </button>
            <button type="button" class="btn btn-light btn-icon btn-md btn-circle wechat-login mx-2">
                <span><i class="text-md nice-icon apollo-iconwechat"></i></span>
            </button>
            <button type="button" class="btn btn-light btn-icon btn-md btn-circle weibo-login mx-2">
                <span><i class="text-md nice-icon apollo-iconweibo"></i></span>
            </button>
        </div>
{{--        <form id="sign-form">--}}
{{--            <div class="form-group">--}}
{{--                <input type="text" class="form-control form-control-lg" name="InputPhone" id="InputPhone" placeholder="手机 / 用户名">--}}
{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                <input type="password" class="form-control form-control-lg" name="InputPassword1" id="InputPassword1" placeholder="密码">--}}
{{--            </div>--}}
{{--            <div class="mt-4">--}}
{{--                <button type="submit" class="btn btn-dark btn-block btn-lg">登录</button>--}}
{{--            </div>--}}
{{--            <input type="hidden" id="_nonce" name="_nonce" value="d5d1774c94"><input type="hidden" name="action" value="nc-ajax-user-sign">--}}
{{--        </form>--}}
        <router-view></router-view>
        <div class="text-muted text-xs text-center mt-4 mt-md-5">
            @if (Route::has('register'))
                <span><a href="{{ route('register') }}">立即注册</a></span>
            @endif
            @if (Route::has('register') && Route::has('password.request'))
                <i class="text-primary mx-1">/</i>
            @endif
            @if (Route::has('password.request'))
                <span><a href="{{ route('password.request') }}">找回密码</a></span>
            @endif
        </div>
    </div>

{{--    <div class="sign-boby d-flex flex-fill flex-column px-4 py-5 px-3 px-lg-5 mt-n4 mt-md-0">--}}
{{--        <div class="text-xl text-center mb-5">--}}
{{--            欢迎回来！--}}
{{--        </div>--}}
{{--        <router-view></router-view>--}}
{{--        <div class="text-xs text-center mt-4">--}}
{{--            @if (Route::has('register'))--}}
{{--                <a class="text-dark" href="{{ route('register') }}">立即注册</a>--}}
{{--            @endif--}}
{{--            @if (Route::has('register') && Route::has('password.request'))--}}
{{--                <span class="text-primary mx-1">/</span>--}}
{{--            @endif--}}
{{--            @if (Route::has('password.request'))--}}
{{--                <a class="text-dark" href="{{ route('password.request') }}">找回密码</a>--}}
{{--            @endif--}}
{{--        </div>--}}
{{--        <div class="mt-4 text-center">--}}
{{--            <button type="button" class="btn btn-light btn-icon btn-md btn-circle mx-2">--}}
{{--                <span><i class="iconfont icon-github"></i></span>--}}
{{--            </button>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
