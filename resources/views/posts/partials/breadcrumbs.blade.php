{{--<div class="d-none d-md-block breadcrumbs mb-3 mb-md-4">--}}
{{--    <span itemprop="itemListElement">--}}
{{--        <a href="https://apollo.2.demo.nicetheme.xyz/" itemprop="item" class="home">--}}
{{--            <span itemprop="name" class="text-muted">首页</span>--}}
{{--        </a>--}}
{{--    </span>--}}
{{--    <span class="sep">›</span>--}}
{{--    <span itemprop="itemListElement">--}}
{{--        <a href="https://apollo.2.demo.nicetheme.xyz/category/chuchuang" itemprop="item">--}}
{{--            <span itemprop="name" class="text-muted">初创</span>--}}
{{--        </a>--}}
{{--    </span>--}}
{{--    <span class="sep">›</span>--}}
{{--    <span class="current">Hello , Apollo</span>--}}
{{--</div>--}}

<div class="d-none d-md-block breadcrumbs mb-3 mb-md-4">
    <span itemprop="itemListElement">
        <a href="{{ url('/') }}" itemprop="item" class="home">
            <span itemprop="name" class="text-muted">首页</span></a>
    </span>
    <span class="sep">›</span>
    <span itemprop="itemListElement">
        <a href="{{ $post->category->link }}" itemprop="item">
            <span itemprop="name" class="text-muted">{{ $post->category->name }}</span>
        </a>
    </span>
    <span class="sep">›</span>
    <span class="current">{{ $post->title }}</span>
</div>