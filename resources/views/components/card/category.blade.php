@php
    $class = 'd-none d-lg-block text-xs ';

    if ($style == 'small') $class .= 'mb-1 ';
    if ($style == 'medium') $class .= 'my-2 ';
    if ($style == 'plain') $class .= 'mb-1 ';

    $dot = null;//get_field('kuang_style_nice', 'option')['card_dot'];
    if ($dot == 'hollow') $class .= 'list-cat-style list-cat-dot-circle ';
    if ($dot == 'solid') $class .= 'list-cat-style list-cat-dot ';

    if ($dot) {
        $color = null;//get_field('card_dot_color', 'category_'.$template_params['cat']->term_id);
        if (!$color) $color = get_field('card_dot_color_customize', 'category_'.$template_params['cat']->term_id);
        $color_style = $dot == 'hollow' ? "border-color: $color;" : "background-color: $color;";
    }
@endphp

<div class="{{ $class }}">
    @if (!empty($dot))
        <i class="cat-dot" style="{{ $color_style }}"></i>
    @endif
    <a href="{{ $cat->getLink() }}" class="text-muted"
       target="_blank">{{ $cat->name }}</a>
</div>
