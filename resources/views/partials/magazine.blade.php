<?php

$magazine_layout = 'black';
$bg_style = '';
if ($magazine_layout === 'black') {
    $bg_type = get_option('bg_type');
    switch ($bg_type) {
        case 'color':
            $bg_style .= 'background: ' . get_option('magazine_layout_black_bg_color', '#000');
            break;
        case 'image':
            $bg_style .= 'background-image: url(\'' . url('/static/images/bg.jpg') . '\');';
            break;
        default:
            $bg_style .= 'background: #000';
            break;
    }
}
?>

<section class="nice-featured nice-featured-style02 mt-0 mt-md-4 mt-lg-4-2" style="{{ $bg_style }}">
    <div class="container">
        <div class="row no-gutters">
            @include('components.magazine.left')
            <div class="items items-right col-12 col-md-6 mt-2 mt-md-0">
                <div class="row no-gutters flex-nowrap flex-md-wrap">
                    @each('components.magazine.right', $posts, 'post')
                </div>
            </div>
        </div>
    </div>
</section>
