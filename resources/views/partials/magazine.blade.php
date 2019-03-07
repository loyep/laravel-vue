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

@if ($magazine_layout === 'full')
    <section class="nice-featured mt-0 mt-md-4 mt-lg-4-2">
        <div class="container-fluid">
            @include('components.magazine')
        </div>
    </section>
@else
    <section class="nice-featured nice-featured-style02 mt-0 mt-md-4 mt-lg-4-2" style="{{ $bg_style }}">
        <div class="container">
            @include('components.magazine')
        </div>
    </section>
@endif
