@extends('layouts.auth')

@section('page_title', getTitle('注册'))

@section('content')
    <div class="sign-boby d-flex flex-fill flex-column px-4 py-5 px-3 px-lg-5 mt-n4 mt-md-0">
        <div class="sign-header font-theme text-xl text-center mb-4 mb-md-5">
            注册账号
        </div>
        <router-view></router-view>
        <div class="text-muted text-xs text-center mt-4 mt-md-5">
            <span>已经是会员了？<a href="{{ route('login') }}">立即登录</a></span>
        </div>
    </div>
@endsection
