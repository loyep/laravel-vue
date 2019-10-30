@extends('layouts.auth')

@section('content')
    <div class="sign-boby d-flex flex-fill flex-column px-4 py-5 px-3 px-lg-5 mt-n4 mt-md-0">
        <div class="sign-header font-theme text-xl text-center mb-4 mb-md-5">
            找回密码
        </div>
        <router-view></router-view>
        <div class="text-muted text-xs text-center mt-4 mt-md-5">
            <span>想起来了！<a href="{{ route('login') }}">返回登录</a></span>
        </div>
    </div>
@endsection
