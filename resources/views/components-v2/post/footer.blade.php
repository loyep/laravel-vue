
<div class="post-footer d-flex flex-column flex-md-row align-items-center my-5">
    <div class="post-action mb-4 mb-md-0">
        <a class="btn-action btn-like post-like font-theme {{ $is_like ? 'current' : '' }} d-none d-md-inline-block"
           href="javascript:;"
           data-action="ding" data-id="1"><i class="icon icon-heart font-22"></i>
            <span class="count font-14 font-xs-12 mt-2 mt-md-0">{{ $post->likes }}</span>
        </a>
    </div>
    <div class="flex-fill">
    </div>
    <div class="text-nowrap">
        <ul class="social bdsharebuttonbox">
            <li data-toggle="tooltip" data-placement="top" title="分享至微博">
                <a class="weibo" rel="nofollow" target="_blank"
                   href="{{ Prism::share()->weibo() }}">
                    <i class="fab fa-weibo"></i>
                </a>
            </li>
            <li data-toggle="tooltip" data-placement="top" title="分享至微信">
                <a class="weixin single-weixin"
                   data-img="{!! Prism::share()->weixin() !!}"
                   rel="nofollow" href="javascript:;">
                    <i class="fab fa-weixin"></i>
                </a>
            </li>
            <li data-toggle="tooltip" data-placement="top" title="分享至QQ">
                <a class="qq" rel="nofollow" target="_blank"
                   href="{{ Prism::share()->qq() }}">
                    <i class="fab fa-qq"></i>
                </a>
            </li>
            <li data-toggle="tooltip" data-placement="top" title="分享至Fackbook">
                <a class="fackbook" rel="nofollow" target="_blank"
                   href="{{ Prism::share()->facebook() }}">
                    <i class="fab fa-facebook-square"></i>
                </a>
            </li>
            <li data-toggle="tooltip" data-placement="top" title="分享至Twitter">
                <a class="twitter" rel="nofollow" target="_blank"
                   href="{{ Prism::share()->twitter() }}">
                    <i class="fab fa-twitter"></i>
                </a>
            </li>
        </ul>
    </div>
</div>
