<?php

?>


<section class="nice-mobile-overlay <?php if (!get_option('head_user_info')) {
    echo 'no-user-sign';
}?>" id="nice-mobile-overlay">
    <div class="mobile-action">
        <button id="mobile-close-icon" class="btn btn-transparent btn-sm navbar-close color-white font-22 light-10">
            <i class="fal fa-times"></i>
        </button>
    </div>
    @if (get_option('head_user_info'))
        <div class="mobile-usernav">
            <div class="cosy-user-info position-relative py-5">
                <div class="black-gradient"></div>
                <div class="cosy-user-cover"
                     style="background-image: url('<?php //$mobile_login_bgp = wp_get_attachment_image_src(cs_get_option('mobile_login_bgp'), 'full'); echo $mobile_login_bgp[0]; ?>')"></div>
                <div class="overlay"></div>
                @auth()
                    <div class="d-flex position-relative align-items-center px-4 w-100">
                        <div class="d-flex">
                            <div class="cosy-user-avatar rounded-circle d-flex flex-shrink-0">
                                <a href="{{ current_user()->profileUrl }}">
                                    <img src="{{ current_user()->profileUrl }}" class="rounded-circle flex-shrink-0"/>
                                    <?php //echo get_avatar($current_user->data->ID, 64, '', '', array('class' => 'rounded-circle flex-shrink-0')); ?>
                                </a>
                            </div>
                            <div class="cosy-user-name ml-3">
                                <a class="font-18 color-white"
                                   href="{{ current_user()->profileUrl }}">{{ current_user()->name  }}</a>
                                <div class="d-block">
                                    <span class="font-12 badge badge-pill badge-light"><?php //echo get_translated_role_name($current_user->roles[0]) ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="flex-fill"></div>
                        <div class="pl-4"><a href="" class="d-block pl-4 text-light"><i
                                        class="fal fa-chevron-right"></i></a>
                        </div>
                    </div>
                @elseauth()
                    <div class="position-relative text-center w-100 mt-3">
                        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-overlay">登录</a>
                        <p class="font-12 color-white mt-2">立即登录/注册，享受更多福利</p>
                    </div>
                @endauth
            </div>
            @auth()
                <div class="cosy-user-data d-flex justify-content-around py-3">
                <span class="text-center">
                    <b class="font-theme text-dark font-18"><?php //echo count_user_posts($current_user->ID, 'post'); ?></b>
                    <small class="d-block font-12 text-muted">文章</small>
                </span>
                    <span class="text-center">
                    <b class="font-theme text-dark font-18"><?php //echo get_user_post_commented_count($current_user->ID); ?></b>
                    <small class="d-block font-12 text-muted">获评论</small>
                </span>
                    <span class="text-center">
                    <b class="font-theme text-dark font-18"><?php //echo get_user_post_liked_sum($current_user->ID); ?></b>
                    <small class="d-block font-12 text-muted">获点赞</small>
                </span>
                </div>
            @endauth
        </div>
    @endif
    <nav class="mobile-navigation">
        <ul id="mobile-menu-id" class="mobile-menu">
            <?php
            //            if (function_exists('wp_nav_menu') && has_nav_menu('mobile-warp-nav')) {
            //                wp_nav_menu(array('container' => false, 'items_wrap' => '%3$s', 'theme_location' => 'mobile-warp-nav', 'depth' => 2));
            //            } else {
            echo '<li><a href="/wp-admin/nav-menus.php">请到[后台->外观->菜单]中设置菜单。</a></li>';
            //            }
            ?>
        </ul>
        <div class="mobile-search">
            <form role="search" method="get" class="mobile-search-form" action="{{ route('search') }}">
                <div class="input-group mb-3">
                    <input type="search" name="q" id="s" class="form-control" placeholder="输入搜索关键词">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-light form-search-submit text-secondary px-3"
                                type="button"><i class="fal fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
        <?php
        //get_template_part('template-parts/menu-ad-mobile')
        ?>
    </nav>

</section>
<section class="nice-search-inner nice-search-inner-up">
    <div class="container">
        <div class="top_searchform_wrapper">

            <form method="get" action="{{ route('search') }}">
                <div class="input-group">
                    <input type="text" name="q" id="s" class="form-control font-16 font-xs-14" placeholder="输入搜索关键词"
                           required="">
                    <div class="input-group-append">
                        <button class="btn btn-primary font-16 font-xs-14" type="submit">搜索</button>
                    </div>
                </div>
            </form>
            <div class="search_inner_close">
                <div class="btn-search-close"><i class="icon icon-close"></i></div>
            </div>
        </div>
    </div>
</section>
<section
        class="nice-search-inner nice-search-inner-down d-none d-md-flex align-items-center justify-content-center align-content-center">
    <div class="container">
        <div class="featured-search-title mb-md-4">
            <h4 class="font-16">
                <span class="font-18  text-muted mr-2"><i class="fal fa-star"></i></span>推荐阅读
            </h4>
        </div>
        <div class="featured-search d-flex flex-column pb-md-5">
            <div class="row row-10 row-xs-15 flex-nowrap flex-lg-wrap">
                <?php
                //                $args = array(
                //                    'type' => 'post',
                //                    'posts_per_page' => 4,
                //                    'post_status' => 'publish',
                //                    'orderby' => 'rand',
                //                    'post__in' => get_option('sticky_posts'),
                //                    'ignore_sticky_posts' => true
                //                );
                //                $head_query = new WP_query($args);
                //                if ($head_query->have_posts()) :
                //                while ($head_query->have_posts()) :
                //                $head_query->the_post();
                //                update_post_caches($posts);
                //                $category = get_the_category(get_the_ID());
                //                $img = post_thumbnail_src();
                //                if (is_numeric($img)) {
                //                    $img = wp_get_attachment_image_src($img, 'full');
                //                    $img = $img[0];
                //                }
                ?>

                {{--<div class="item col-12 col-sm-12 col-md-12 col-lg-3">--}}
                {{--<article>--}}
                {{--<a class="custom-hover d-block" href="<?php //the_permalink(); ?>" target="_blank">--}}
                {{--<div class="custom-hover-img image"--}}
                {{--style="background-image: url('<?php //echo $img; ?>');"></div>--}}
                {{--<div class="content p-3 p-md-4">--}}
                {{--<div class="title"><h2--}}
                {{--class="font-18 <?php //echo get_title_font_weight() ?> text-l2 color-white"><?php //the_title(); ?></h2>--}}
                {{--</div>--}}
                {{--<div class="data nodots d-flex align-items-center flex-row font-12 text-light mt-3">--}}
                {{--<div class="flex-fill">--}}
                {{--<span class="u-cat"><?php //echo $category[0]->cat_name; ?></span>--}}
                {{--</div>--}}
                {{--<div class="text-nowrap">--}}
                {{--<span class="u-time"><?php //echo timeago(get_gmt_from_date(get_the_time('Y-m-d', get_the_ID()))); ?></span>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</a>--}}
                {{--</article>--}}
                {{--</div>--}}
                <?php
                //                endwhile;
                //                else :
                //                    echo '<div class="data-null">
                //                                    <p><i class="icon-null"></i></p>
                //                                    <p>抱歉，暂无内容</p>
                //                                </div>';
                //                endif;
                //                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
</section>
@if (get_option('duang_all'))

<section class="main-preloader">
    <div class="preloader-inner">
        <div class="loader-inner ball-scale-multiple">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
</section>
@endif
<header class="nice-header <?php //echo cs_get_option('mobile_header_layout'); ?>">
    <div class="<?php //echo $header_layout; ?> m-header">
        <div class="navbar navbar-expand-lg d-none d-lg-flex">
            <div class="navbar-header d-inline-block">
                <?php
                //                $logo_url = !empty($site_logo_arr[0]) ? $site_logo_arr[0] : get_template_directory_uri() . '/static/images/logo.png';
                //                $logo_mobile_url = !empty($site_logo_arr_mobile[0]) ? $site_logo_arr_mobile[0] : get_template_directory_uri() . '/static/images/logo-mobile.png';
                ?>
                <a class="navbar-brand" href="<?php //bloginfo('url'); ?>" title="<?php //bloginfo('name'); ?>"
                   style="background-image: url('<?php //echo $logo_url; ?>');"><?php //bloginfo('name'); ?></a>

            </div>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav navbar-site align-items-center flex-fill flex-nowrap">
                    <?php
                    //                    if (function_exists('wp_nav_menu') && has_nav_menu('head-nav')) {
                    //                        wp_nav_menu(array('container' => false, 'items_wrap' => '%3$s', 'theme_location' => 'head-nav', 'depth' => 3));
                    //                    } else {
                    //                        echo '<li><a href="/wp-admin/nav-menus.php">请到[后台->外观->菜单]中设置菜单。</a></li>';
                    //                    }
                    ?>
                </ul>
                <ul class="navbar-nav navbar-sign align-items-center">
                    <li>
                        <button class="btn btn-link btn-sm btn-search font-16 text-secondary px-2 py-0"><i
                                    class="fal fa-search"></i></button>
                    </li>
                    @if (get_option('head_user_info'))

                    <li><a class="font-16 text-secondary d-block px-2"
                           href="<?php //echo admin_url('post-new.php'); ?>"><i class="fal fa-edit"></i></a></li>
                    <?php
                    if ($current_user->ID == 0): ?>
                    <li><a href="<?php //echo esc_url(wp_login_url()); ?>"
                           class="btn btn-outline-primary btn-sm btn-signin ml-2">登录</a></li>
                    @else
                    <li class="nice-dropmenu flex-shrink-0 ml-2">
                        <a id="sign-menu" class="sign-avatar" ref="#" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <?php //echo get_avatar($current_user->data->ID, 64, '', ''); ?>
                        </a>
                        <ul class="dropdown-inner" aria-labelledby="sign-menu">
                            <li><a href="<?php // echo get_author_posts_url(get_current_user_ID());?>"><i
                                            class="icon icon-grid text-secondary"></i>个人主页</a></li>
                            <li><a href="<?php //echo get_edit_profile_url();?>"><i
                                            class="icon icon-settings text-secondary"></i>账号设置</a></li>
                            <li><a href="<?php //echo wp_logout_url() ?>"><i class="icon icon-logout text-secondary"></i>退出登录</a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    <?php
                    endif; ?>
                </ul>
            </div>
        </div>
        <div class="navbar mobile-navbar flex-row flex-nowrap d-flex d-lg-none">
            <div class="navbar-header">
                <?php
                //                $logo_url = !empty($site_logo_arr[0]) ? $site_logo_arr[0] : get_template_directory_uri() . '/static/images/logo.png';
                //                $logo_mobile_url = !empty($site_logo_arr_mobile[0]) ? $site_logo_arr_mobile[0] : get_template_directory_uri() . '/static/images/logo-mobile.png';
                ?>
                <a class="navbar-brand" href="<?php //bloginfo('url'); ?>" title="<?php //bloginfo('name'); ?>"
                   style="background-image: url('<?php //echo $logo_url; ?>');"><?php //bloginfo('name'); ?></a>
                <a class="navbar-brand mobile-navbar-brand d-none d-lg-none" href="<?php //bloginfo('url'); ?>"
                   title="<?php //bloginfo('name'); ?>"
                   style="background-image: url('<?php //echo $logo_mobile_url; ?>');"><?php //bloginfo('name'); ?></a>
            </div>
            <div class="navbar-collapse">
                <ul class="navbar-nav flex-row">
                    <?php
                    //                    if (function_exists('wp_nav_menu') && has_nav_menu('mobile-nav')) {
                    //                        wp_nav_menu(array('container' => false, 'items_wrap' => '%3$s', 'theme_location' => 'mobile-nav', 'depth' => 1));
                    //                    } else {
                    echo '<li><a href="/wp-admin/nav-menus.php">请到[后台->外观->菜单]中设置菜单。</a></li>';
                    //                    }
                    ?>
                </ul>
            </div>
            <button class="navbar-toggle mobile-navbar-toggle" id="mobile-menu-icon" type="button">
                <i class="icon icon-menu"></i>
            </button>
        </div>
    </div>
</header>
