@php
    $collected = true;
@endphp
<div class="d-md-flex flex-md-fill align-items-md-center text-center mt-md-5">
    @auth
        <a href="javascript:;" class="d-none d-md-inline-block mr-3 apollo-collection{{ $collected ? ' current' :'' }}">
            <i class="text-xl text-height-xs iconfont icon-uncollect"></i>
            <span class="font-theme collection-count">{{ $collected ? '0' : '' }}</span>
        </a>
    @endauth
    <a class="d-none d-md-inline-block " id="btn-bigger-cover" href="javascript:;" data-id="">
        <i class="text-xl text-height-xs iconfont icon-zhuanfa"></i>
    </a>
    <div class="flex-md-fill"></div>
    <social-share qrcode="{{ route('qrcode', ['url' => request()->fullUrl(), 'size' => '160']) }}"></social-share>
</div>
