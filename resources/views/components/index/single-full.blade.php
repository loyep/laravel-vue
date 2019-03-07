<?php

/*
            /$$
    /$$    /$$$$
   | $$   |_  $$    /$$$$$$$
 /$$$$$$$$  | $$   /$$_____/
|__  $$__/  | $$  |  $$$$$$
   | $$     | $$   \____  $$
   |__/    /$$$$$$ /$$$$$$$/
          |______/|_______/
================================
        Keep calm and get rich.
                    Is the best.

  	@Author: Dami
  	@Date:   2017-09-03 16:45:11
  	@Last Modified by:   Dami
  	@Last Modified time: 2017-11-20 21:42:50

*/

$GLOBALS['list_hide_item_full'] = cs_get_option('index_list_hide_item_full');
$GLOBALS['list_hide_item_full'] = $GLOBALS['list_hide_item_full'] ? $GLOBALS['list_hide_item_full'] : array( 'none' );
$GLOBALS['list_hide_item_full'] = is_string($GLOBALS['list_hide_item_full']) ? array($GLOBALS['list_hide_item_full']) : $GLOBALS['list_hide_item_full'];
$GLOBALS['list_hide_item_mobile'] = cs_get_option('index_list_hide_item_mobile');
$GLOBALS['list_hide_item_mobile'] = $GLOBALS['list_hide_item_mobile'] ? $GLOBALS['list_hide_item_mobile'] : 'none';
$GLOBALS['index_list_hide_meta'] = cs_get_option('index_list_hide_item_meta');
$GLOBALS['index_list_hide_meta'] = $GLOBALS['index_list_hide_meta'] ? $GLOBALS['index_list_hide_meta'] : array('none');
?>

<main class="nice-main">
    <div class="posts-list home-list regular-list row justify-content-lg-center">
        <?php
        $masking_cats = cs_get_option('masking_cats');

        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array(
            'paged' => $paged,
            'post_status' => 'publish',
            'ignore_sticky_posts' => 1
        );

        if( is_array( $masking_cats ) ){
            $args['category__not_in'] = $masking_cats;
        }

        query_posts( $args );
        if ( have_posts() ) :
            $GLOBALS['mii'] = 1;
            while ( have_posts() ) : the_post();

                get_template_part('template-parts/full-ad-topic');
                get_template_part('template-parts/ajax-loop-full');
                $GLOBALS['mii']++;
            endwhile;
        endif;
        ?>


    </div>
    <?php
    if( cs_get_option('home_ajax_load') != 1 ) {
        the_posts_pagination( array(
            'prev_text'=>'<i class="fal fa-angle-left"></i>',
            'next_text'=>'<i class="fal fa-angle-right"></i>',
            'screen_reader_text' =>'',
            'mid_size' => 1,
        ) );
    }else{
    ?>
    <div class="posts-ajax-load">
        <div class="post-loading"><span></span><span></span><span></span><span></span><span></span></div>
        <?php if( $GLOBALS["wp_query"]->max_num_pages > 1 ){ ?>
        <button type="button" data-page="home" data-action="ajax_load_posts" data-paged="2" data-append="home-list" class="btn btn-secondary dposts-ajax-load">加载更多</button>
        <?php }else{ ?>
        <button type="button" data-page="home" data-action="ajax_load_posts" data-paged="2" data-append="home-list" class="btn btn-light dposts-ajax-load loading disabled" disabled>没有更多内容</button>
        <?php } ?>
    </div>
    <?php } ?>
</main>
