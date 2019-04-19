@php

$navClass = '';
$logo = '';
 if (isset($index_menu_style) && ($index_menu_style == 'immersed' || $index_menu_style == 'dark' || $index_menu_style == 'image')) {
    $navClass = 'fixed-top';
}

$logo = '';
	$index_menu_style = get_field('index_menu_style', 'option');
	if (is_home() && ($index_menu_style == 'immersed' || $index_menu_style == 'dark' || $index_menu_style == 'image')) {
		$logo = get_field('logo_dark', 'option');
		return empty($logo) ? get_template_directory_uri().'/images/logo-dark.png' : esc_url($logo);
	}
	$logo = get_field('logo', 'option');
	return empty($logo) ? get_template_directory_uri().'/images/logo.png' : esc_url($logo);

@endphp

<header class="header">
    <nav class="{{ $navClass }}">
        <div class="navbar navbar-expand-lg">
            <div class="container">
                <a href="{{ url('/') }}" rel="home" class="navbar-brand m-0 order-1 order-lg-1">
{{--                    <img src="<?php echo cosy19_get_logo() ?>" class="" alt="<?php bloginfo( 'name' ); ?>">--}}
                    <span class="text-white">PRISM</span>
                </a>
                <!-- / brand -->
                <div class="collapse navbar-collapse order-lg-2">
                    <ul class="navbar-nav main-menu mx-auto px-4">
                        <?php
                        if ( function_exists( 'wp_nav_menu' ) && has_nav_menu('menu-1') ) {
                            wp_nav_menu( array( 'container' => false, 'items_wrap' => '%3$s', 'theme_location' => 'menu-1' ) );
                        } else {
                            _e('<li><a href="/wp-admin/nav-menus.php">Please set up your first menu at [Admin -> Appearance -> Menus]</a></li>', 'cosy19');
                        }
                        ?>
                    </ul>
                </div>
                <ul class="nav nav-pills nav-submenu align-items-center order-2 order-lg-3">
                    <li class="nav-item">
                        <a href="#" class="nav-link search-popup"><i class="text-lg iconfont icon-sousuo"></i></a>
                    </li>
                    <?php cosy19_the_view_history_link() ?>
                    <li class="nav-item d-lg-none">
                        <a class="nav-link" href="#" id="sidebar-mobile-trigger"><i class="text-lg iconfont icon-menu-outline"></i></a>
                    </li>
                    <?php if (get_option('users_can_register')): ?>
                    <li class="nav-item d-none d-lg-inline-block">
                        <a href="<?php echo admin_url('post-new.php') ?>" class="nav-link"><i class="text-lg iconfont icon-bianji"></i></a>
                    </li>
                    <?php if (is_user_logged_in()): ?>
                    <li class="nav-item">
                        <a href="<?php echo get_edit_profile_url();?>" class="nav-link pr-lg-0">
									<span class="avatar w-32">
										<?php echo get_avatar( $current_user->data->ID, 32, '', '', array('class' => '') ); ?>
							        </span>
                        </a>
                    </li>
                    <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link sign-link active" href="<?php echo wp_login_url() ?>"><?php _e('Sign in', 'cosy19') ?></a>
                    </li>
                    <?php endif; ?>
                    <?php endif; ?>
                </ul>
                <form role="search" method="get" class="navbar-search-wrap" action="<?php echo home_url( '/' ) ?>" style="display: none;"><input type="search" class="form-control navbar-search-input" placeholder="<?php _e('Type Something...', 'cosy19') ?>" name="s"> <i class="iconfont icon-quxiao" id="navbar-search-close"></i></form>
                <!-- brand -->
            </div>
        </div>
        <div class="navbar-collapse navbar-scroll d-lg-none">
            <div class="container">
                <ul class="navbar-nav flex-row">
                    <?php
                    if ( function_exists( 'wp_nav_menu' ) && has_nav_menu('menu-3') ) {
                        wp_nav_menu( array( 'container' => false, 'items_wrap' => '%3$s', 'theme_location' => 'menu-3', 'depth' => 1 ) );
                    } else {
                        _e('<li><a href="/wp-admin/nav-menus.php">Please set up your first menu at [Admin -> Appearance -> Menus]</a></li>', 'cosy19');
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

</header>

