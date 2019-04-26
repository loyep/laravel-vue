<div class="breadcrumbs mb-3 d-none d-md-block">
    <span itemprop="itemListElement">
          <a href="{{ url('/') }}" itemprop="item"><span itemprop="name" class="text-muted">首页</span></a>
    </span>
    <span class="sep">›</span>
    <span itemprop="itemListElement">
        <a href="{{ $post->category->perm_link }}" itemprop="item">
            <span itemprop="name" class="text-muted">{{ $post->category->name }}</span>
        </a>
    </span>
    <span class="sep">›</span>
    <span class="current">{{ $post->title }}</span>
</div>
