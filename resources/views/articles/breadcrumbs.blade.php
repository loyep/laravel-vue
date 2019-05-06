<div class="breadcrumbs light-10 mb-3 mb-md-4 d-none d-md-block">
  <span itemprop="itemListElement">
    <a href="{{ url('/') }}" itemprop="item" class="home"><span itemprop="name">首页</span></a>
  </span>
    <span class="sep"><i class="fal fa-angle-right"></i></span>
    <span itemprop="itemListElement">
    <a href="{{ $category->getLink() }}" itemprop="item">
      <span itemprop="name">{{ $category->name }}</span>
    </a>
  </span>
    <span class="sep"><i class="fal fa-angle-right"></i></span>
    <span class="current">正文</span>
</div>
