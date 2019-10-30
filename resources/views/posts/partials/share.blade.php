@php
    $collected = true;
@endphp
<div class="d-md-flex flex-md-fill align-items-md-center text-center mt-md-5">
    <a href="javascript:;" data-id="" data-nonce=""
       class="d-none d-md-inline-block mr-3 apollo-collection{{ $collected ? ' current' :'' }}">
        <i class="text-xl text-height-xs iconfont icon-uncollect"></i>
        <span class="font-theme collection-count">{{ $collected ? '0' : '' }}</span>
    </a>
    <a class="d-none d-md-inline-block " id="btn-bigger-cover" href="javascript:;" data-id="">
        <i class="text-xl text-height-xs iconfont icon-zhuanfa"></i>
    </a>
    <div class="flex-md-fill"></div>
    <div class="post-social">
        <a href="#" target="_blank" class="btn btn-light btn-icon btn-weibo btn-rounded btn-md">
            <span><i class="iconfont icon-weibo"></i></span>
        </a>
        <a href="javascript:" class="btn btn-light btn-icon btn-weixin single-popup btn-rounded btn-md" data-img="#"
           data-title="微信扫一扫 分享朋友圈" data-desc="在微信中请长按二维码">
            <span><i class="iconfont icon-wechat"></i></span>
        </a>
        <a href="#" target="_blank" class="btn btn-light btn-icon btn-qq btn-rounded btn-md">
            <span><i class="iconfont icon-qq"></i></span>
        </a>
        <a href="#" target="_blank" class="btn btn-light btn-icon btn-facebook btn-rounded btn-md">
            <span><i class="iconfont icon-facebook"></i></span>
        </a>
        <a href="#" target="_blank" class="btn btn-light btn-icon btn-twitter btn-rounded btn-md">
            <span><i class="iconfont icon-twitter"></i></span>
        </a>
        <a href="#" target="_blank" class="btn btn-light btn-icon btn-linkedin btn-rounded btn-md">
            <span><i class="iconfont icon-linkedin"></i></span>
        </a>
    </div>
</div>
