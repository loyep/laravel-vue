@php
    $share = (new \App\Services\ShareService($post->getLink(), $post->title, $post->description, $post->image))
@endphp

<div class="post-social">
    <a href="{{ $share->weibo() }}" target="_blank" class="weibo"><i class="iconfont icon-weibo"></i></a>
    <a href="{{ $share->qq() }}" target="_blank" class="qq"><i class="iconfont icon-qq"></i></a>
    <a href="{{ $share->facebook() }}" target="_blank" class="facebook"><i class="iconfont icon-facebook"></i></a>
    <a href="{{ $share->twitter() }}" target="_blank" class="twitter"><i class="iconfont icon-twitter"></i></a>
    <a href="{{ $share->linkedin() }}" target="_blank" class="linkedin"><i class="iconfont icon-linkedin"></i></a>
</div>
