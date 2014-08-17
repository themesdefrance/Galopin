<?php

$theme = wp_get_theme();
wp_enqueue_style('stylesheet', get_stylesheet_directory_uri().'/style.css', array(), $theme->get('Version'));
wp_enqueue_style('icons', get_stylesheet_directory_uri().'/fonts/typicons.min.css', array(), $theme->get('Version'));
register_nav_menu('primary', __('Main menu', 'galopin'));

if (!function_exists('etendard_excerpt')){
	function etendard_excerpt($length){
		if($length==0)
			return '';
		
		$content = strip_shortcodes(get_the_content());
		$excerpt = "<p>" . wp_trim_words( $content , $length ) . "</p>";
		return $excerpt;
	}
}

// Thanks to https://gist.github.com/tommcfarlin/f2310bfad60b60ae00bf#file-is-paginated-post-php
if (!function_exists('etendard_is_paginated_post')){
	function etendard_is_paginated_post() {
		global $multipage;
		return 0 !== $multipage;
	}
}


register_sidebar(array(
		'name'          => __('Sidebar', 'galopin'),
		'id'            => 'blog',
		'description'   => __('Add widgets in the sidebar.', 'galopin'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
));

register_sidebar(array(
		'name'          => __('Footer', 'galopin'),
		'id'            => 'footer',
		'description'   => __('Add widgets in the footer.', 'galopin'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
));