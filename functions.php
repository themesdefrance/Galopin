<?php

//////////////////
// Bootstraping //
//////////////////
if (!function_exists('galopin_activation')){
	function galopin_activation(){
		global $wp_rewrite;
		$wp_rewrite->flush_rules();
	}
}
add_action('after_switch_theme', 'galopin_activation');

//Register menus, sidebars and image sizes
if (!function_exists('galopin_setup')){
	function galopin_setup(){
		// Register menus
		register_nav_menu('primary', __('Main menu', 'galopin'));
		register_nav_menu('footer', __('Footer menu', 'galopin'));
		
		//Register sidebars
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
		
		// Enable thumbnails
		add_theme_support('post-thumbnails');
		
		// Set images sizes
		add_image_size('galopin-post-thumbnail', 633, 400, true);
		
		// Load language
		//load_theme_textdomain('galopin', get_template_directory().'/local');
	}
}
add_action('after_setup_theme', 'galopin_setup');

//add custom image size to native dailogs
if (!function_exists('galopin_image_size_names_choose')){
	function galopin_image_size_names_choose($sizes) {
		$added = array('etendard-post-thumbnail'=>__('Post', 'galopin'));
		$newsizes = array_merge($sizes, $added);
		return $newsizes;
	}
}
add_filter('image_size_names_choose', 'galopin_image_size_names_choose');

//register supported post formats
if(!function_exists('galopin_custom_format')){
	function galopin_custom_format() {
		$cpts = array('post' => array('video', 'link', 'quote'));
		$current_post_type = $GLOBALS['typenow'];
		if ($current_post_type == 'post') add_theme_support('post-formats', $cpts[$GLOBALS['typenow']]);
	}
}
add_action( 'load-post.php', 'galopin_custom_format' );
add_action( 'load-post-new.php', 'galopin_custom_format' );

//enqueue styles & scripts
if (!function_exists('galopin_enqueue')){
	function galopin_enqueue(){
	
		$theme = wp_get_theme();
		
		//main stylesheet
		wp_enqueue_style('stylesheet', get_stylesheet_directory_uri().'/style.css', array(), $theme->get('Version'));
		
		//icons
		wp_enqueue_style('icons', get_stylesheet_directory_uri().'/fonts/typicons.min.css', array(), $theme->get('Version'));
	}
}
add_action('wp_enqueue_scripts', 'galopin_enqueue');


/////////////////////////
// Utility functions   //
/////////////////////////
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

// Function to call if no primary menu
if (!function_exists('galopin_nomenu')){
	function galopin_nomenu(){
		echo '<ul class="top-level-menu"><li><a href="'.admin_url('nav-menus.php').'">'.__('Set up the main menu', 'galopin').'</a></li></ul>';
	}
}