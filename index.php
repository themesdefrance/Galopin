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
<!--[if lt IE 8]><p class=chromeframe><?php _e('Your browser is <em>too old !','etendard'); ?></em> <a href="http://browsehappy.com/"><?php _e('Update your browser','etendard'); ?></a> <?php _e('or','etendard'); ?> <a href="http://www.google.com/chromeframe/?redirect=true"><?php _e('Install Google Chrome Frame','etendard'); ?></a> <?php _e('to display this website correctly','etendard'); ?>.</p><![endif]-->
	
	<div class="page-wrapper">
		<div class="content-wrapper">
			
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
						'fallback_cb'    => 'etendard_nomenu'
					));
					?>
				</nav>
				
				<ul class="social-menu">
					<li>
						<a href="#" class="typcn typcn-social-facebook-circular"></a>
					</li>
				</ul>
			</header>
			
			<div class="content">
				
				<div class="hero-image">
					<button class="menu-toggle typcn typcn-th-menu"></button>
					
					<div class="hero-text">
						Galopin
					</div>
				</div>
				
				<div class="wrapper">	
					<div class="grid">
						<ul class="posts col-2-3">
							<?php while (have_posts()) : the_post(); ?>
							<li>
								<?php get_template_part('content', get_post_format()); ?>
							</li>
							<?php endwhile; ?>
						</ul>
						<aside class="sidebar col-1-3">
							<?php get_sidebar('blog'); ?>
						</aside>
					</div>
					
					<aside class="footerbar">
						<?php get_sidebar('footer'); ?>
					</aside>
				</div>
				
				<footer class="footer">
					<div class="grid">
						<div class="note col-1-2">
							left
						</div>
						<div class="menu col-1-2">
							right
						</div>
					</div>
				</footer>
				
			</div>
			
		</div>
	</div>
	
	<?php wp_footer(); ?>
	
</body>
</html>