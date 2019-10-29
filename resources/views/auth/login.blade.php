@extends('layouts.auth')

@section('content')
    <div class="sign-boby d-flex flex-fill flex-column px-4 py-5 px-3 px-lg-5 mt-n4 mt-md-0">
        <div class="text-xl text-center mb-5">
            欢迎回来！
        </div>
        <router-view></router-view>
        <div class="text-xs text-center mt-4">
            @if (Route::has('register'))
                <a class="text-dark" href="{{ route('register') }}">立即注册</a>
            @endif
            @if (Route::has('register') && Route::has('password.request'))
                <span class="text-primary mx-1">/</span>
            @endif
            @if (Route::has('password.request'))
                <a class="text-dark" href="{{ route('password.request') }}">找回密码</a>
            @endif
        </div>
        <div class="mt-4 text-center">
            <button type="button" class="btn btn-light btn-icon btn-md btn-circle mx-2">
                <span><i class="iconfont icon-github"></i></span>
            </button>
        </div>
    </div>
@endsection
