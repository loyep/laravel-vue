<div class="media post-author p-4 p-lg-4-2 my-4">
    <div class="author-avatar mr-2 mr-md-3">
        <a href="{{ $author->perm_link }}">
            <img alt='' src='{{ $author->avatar }}' class='avatar avatar-65 photo' height='65' width='65'/>
        </a>
    </div>
    <div class="media-body author-info">
        <h4 class="name">
            <a href="{{ $author->permLink }}">
                {{ $author->display_name }}
            </a>
        </h4>
        <div class="desc text-secondary font-14">
            {{ $author->description }}
        </div>
        <div class="links mt-3 mt-md-2">
            <ul>
                <li class="mr-3 font-14" data-toggle="tooltip" data-placement="top" title="微博">
                    <a href="#" target="_blank" class="btn-author-sns text-light"><i class="fab fa-weibo"></i></a>
                </li>
                <li class="mr-3 font-14" data-toggle="tooltip" data-placement="top" title="微信">
                    <a href="javascript:;" data-module="miPopup" data-selector="#author_qrcode"
                       class="btn-author-sns text-light">
                        <i class="fab fa-weixin"></i>
                    </a>
                </li>
                <div class="dialog-suxing" id="author_qrcode">
                    <div class="dialog-content dialog-wechat-content">
                        <p>扫码关注</p>
                        <img alt=""
                             src="https://cn.bing.com/th?id=OHR.EarlyBloomer_ZH-CN1044452089_1920x1080.jpg&rf=NorthMale_1920x1080.jpg&pid=hp"/>
                        <div class="btn-close">
                            <i class="icon icon-close"></i>
                        </div>
                    </div>
                </div>
                <li class="mr-3 font-14" data-toggle="tooltip" data-placement="top" title="QQ">
                    <a href="#" target="_blank" class="btn-author-sns text-light">
                        <i class="fab fa-qq"></i>
                    </a>
                </li>
                <li class="font-14" data-toggle="tooltip" data-placement="top" title="Github">
                    <a href="#" target="_blank" class="btn-author-sns text-dark">
                        <i class="fab fa-github"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
