<!doctype html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<title>
		<?php wp_title('|', true, 'right'); ?>
	</title>
	<link rel="shortcut icon" href="/favicon.ico?v=0">
	
	<meta name="viewport" content="width=device-width">
	
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	
	<!-- Scripts that need to be loaded first -->
	<!--[if lt IE 9]>
	<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!--[if lt IE 8]><p class=chromeframe><?php _e('Your browser is <em>too old !','galopin'); ?></em> <a href="http://browsehappy.com/"><?php _e('Update your browser','galopin'); ?></a> <?php _e('or','galopin'); ?> <a href="http://www.google.com/chromeframe/?redirect=true"><?php _e('Install Google Chrome Frame','galopin'); ?></a> <?php _e('to display this website correctly','galopin'); ?>.</p><![endif]-->
	
	<div class="page-wrapper">
		<div class="content-wrapper <?php if (is_home())echo 'cover'; ?>">
			
			<header class="menu-wrapper">
				<div class="search-wrapper">
					<button class="form-toggle typcn typcn-zoom"></button>
					 <?php get_search_form(true); ?> 
				</div>
				
				<nav class="main-menu">
					<?php
					wp_nav_menu(array(
						'theme_location' => 'primary',
						'menu_class'     => 'top-level-menu',
						'container'      => false,
						'depth'          => 2,
						'fallback_cb'    => 'galopin_nomenu'
					));
					?>
				</nav>
				
				<ul class="social-menu">
					<li>
						<a href="#" class="typcn typcn-social-facebook-circular"></a>
					</li>
				</ul>
			</header>
			
			<div class="content <?php if (galopin_is_masonry()) echo 'masonry-wrapper'; ?>">
				<div class="hero-image" style="background-image: url(<?php echo get_option('galopin_hero_image'); ?>);">
					<button class="menu-toggle typcn typcn-th-menu"></button>

					<a href="<?php echo home_url(); ?>" class="hero-text">
						Galopin
					</a>
				</div>