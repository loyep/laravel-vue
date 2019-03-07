<?php
$slide_layout = 'full';
$slide_below_card_layout = 'full';
$slide_below_card = true;
//  全宽或居中
//if ($slide_layout == 'full') {
//echo '<section class="nice-slider slider-style01 mt-0 mt-md-4-2">';
//    echo '<div class="container-fluid pl-0 pr-0">';
//        echo '<div class="owl-carousel">';
//            }else{
//            echo '<section class="nice-slider slider-style02  mt-3 mt-md-4-2">';
//                echo '<div class="container">';
//                    echo '<div class="owl-carousel">';
//
//                        }
//                        get_template_part('template-parts/slide');
//                        echo '</div></div>';
//                echo '</section>';
//            }
//
//            if( cs_get_option('slide_region') == 'silide' && cs_get_option('slide_below_card') ){
//
//            if( cs_get_option('slide_below_card_layout') == 'full' ){
//
//            echo '<section class="nice-featured-posts">';
//                echo '<div class="owl-carousel owl-stage">';
//                    get_template_part( 'template-parts/slide-below-card' );
//                    echo '</div>';
//                echo '</section>';
//
//            }else{
//            echo '<section class="nice-featured-posts py-3 py-md-0 mt-md-3">';
//                echo '<div class="container">';
//                    echo '<div class="owl-carousel owl-stage">';
//                        get_template_part( 'template-parts/slide-below-card' );
//                        echo '</div>';
//                    echo '</div>';
//                echo '</section>';
//            }
?>

@if ($slide_layout === 'full')
    <section class="nice-slider slider-style01 mt-0 mt-md-4-2">
        <div class="container-fluid pl-0 pr-0">
            <div class="owl-carousel">
                @include('components.slides')
            </div>
        </div>
    </section>
@else
    <section class="nice-slider slider-style02  mt-3 mt-md-4-2">
        <div class="container">
            <div class="owl-carousel">
                @include('components.slides')
            </div>
        </div>
    </section>
@endif

@if ($slide_below_card)
    @if ($slide_below_card_layout === 'full')
        <section class="nice-featured-posts">
            <div class="owl-carousel owl-stage">
                @include('components.slides.below-card')
            </div>
        </section>
    @else
        <section class="nice-featured-posts py-3 py-md-0 mt-md-3">
            <div class="container">
                <div class="owl-carousel owl-stage">
                    @include('components.slides.below-card')
                </div>
            </div>
        </section>
    @endif
@endif
