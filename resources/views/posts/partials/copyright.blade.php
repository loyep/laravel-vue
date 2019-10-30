@php
    $source = $post->source;
    $copyright_author = $post->user->display_name;
    $copyright_url = url('/');
    $copyright_type = 1;
    if (!empty($source) && $source = json_decode($source) && is_object($source)) {
        $copyright_type = 2;
        $copyright_author = $source->name;
        $copyright_url = $source->url;
    }
@endphp

<div class="hr-short"></div>
@if($copyright_type === 1)
    <div class="post-declare mt-3 mt-md-4">
        <p>本文系作者 @<a href="{{ $post->user->link }}">{{ $copyright_author }}</a> 原创发布在
            <a href="{{ $copyright_url }}">{{ config('app.name') }}</a>。未经许可，禁止转载。</p>
    </div>
@else
    <div class="post-declare mt-3 mt-md-4">
        <p>本文系作者 @<a href="{{ $copyright_url }}" target="_blank">{{ $copyright_author }}</a> 授权发布在
            <a href="{{ $copyright_url }}">{{ config('app.name') }}</a>。未经许可，禁止转载。</p>
    </div>
@endif
