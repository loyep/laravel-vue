@php
    $post_copyright = $post->copyright;
    $copyright_author = $post->user->display_name;
    $copyright_url = url('/');
    $copyright_type = 1;
    if ($post_copyright) {
        if (is_object($post_copyright)) {
            $copyright_type = 2;
            $copyright_author = $post_copyright->name;
            $copyright_url = $post_copyright->link;
        }
    }
@endphp

@if (!empty($post_copyright))
    <div class="hr-short"></div>
    @if($copyright_type === 1)
        <div class="post-declare mt-3 mt-md-4">
            <p>本文系作者 @<a href="{{ $post->user->perm_link }}">{{ $copyright_author }}</a> 原创发布在
                <a href="{{ $copyright_url }}">{{ Prism::name() }}</a>。未经许可，禁止转载。</p>
        </div>
    @else
        <div class="post-declare mt-3 mt-md-4">
            <p>本文系作者 @<a href="{{ $copyright_url }}" target="_blank">{{ $copyright_author }}</a> 授权发布在
                <a href="{{ $copyright_url }}">{{ Prism::name() }}</a>。未经许可，禁止转载。</p></div>
    @endif
@endif
