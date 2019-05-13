<div class="breadcrumbs mb-3 d-none d-md-block">
    <span itemprop="itemListElement">
          <a href="{{ url('/') }}" itemprop="item"><span itemprop="name" class="text-muted">首页</span></a>
    </span>
    <span class="sep">›</span>
    <span itemprop="itemListElement">
        <a href="{{ $article->category->getLink() }}" itemprop="item">
            <span itemprop="name" class="text-muted">{{ $article->category->name }}</span>
        </a>
    </span>
    <span class="sep">›</span>
    <span class="current">{{ $article->title }}</span>
</div>
