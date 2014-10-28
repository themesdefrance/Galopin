<?php

define('EDD_SL_STORE_URL', 'https://www.themesdefrance.fr');
define('EDD_SL_THEME_NAME', 'Galopin');
define('EDD_SL_THEME_VERSION', '0.001');
define('EDD_SL_LICENSE_KEY', 'galopin_license_edd');

if(!class_exists('EDD_SL_Theme_Updater'))
	include(dirname( __FILE__ ).'/admin/EDD_SL_Theme_Updater.php');

define('GALOPIN_COCORICO_PREFIX', 'galopin_');
if(is_admin())
	require_once 'admin/Cocorico/Cocorico.php';

// Widgets
require_once 'admin/widgets/social.php';
require_once 'admin/widgets/calltoaction.php';
require_once 'admin/widgets/video.php';

// Themes functions
require_once 'admin/functions/galopin-functions.php';

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
		
		// Load language
		load_theme_textdomain('galopin', get_template_directory().'/languages');
		
		// Register menus
		register_nav_menus( array(
			'primary'   => __('Main menu', 'galopin'),
			'footer' => __('Footer menu', 'galopin'),
		) );
		
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
		add_image_size('galopin-post-thumbnail-full', 900, 400, true);
		
		// Add Meta boxes for post formats
		require_once 'admin/metaboxes/post-formats.php';

	}
}
add_action('after_setup_theme', 'galopin_setup');

//add custom image size to native dailogs
if (!function_exists('galopin_image_size_names_choose')){
	function galopin_image_size_names_choose($sizes) {
		$added = array('galopin-post-thumbnail'=>__('Post width', 'galopin'));
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
		
		wp_register_script('fitvids', get_template_directory_uri().'/js/min/jquery.fitvids.min.js', array('jquery'), $theme->get('Version'), true);
		
		wp_register_script('jq-aim', get_template_directory_uri().'/js/min/jquery.aim.min.js', array('jquery'), $theme->get('Version'), true);
		
		wp_register_script('galopin', get_template_directory_uri().'/js/min/galopin.min.js', array('jquery'), $theme->get('Version'), true);
		
		//main stylesheet
		wp_enqueue_style('stylesheet', get_stylesheet_directory_uri().'/style.css', array(), $theme->get('Version'));
		
		//icons
		wp_enqueue_style('icons', get_stylesheet_directory_uri().'/fonts/typicons.min.css', array(), $theme->get('Version'));
		
		wp_enqueue_script('fitvids');
		wp_enqueue_script('jq-aim');
		wp_enqueue_script('masonry');
		
		wp_enqueue_script('galopin');
	}
}
add_action('wp_enqueue_scripts', 'galopin_enqueue');

/////////////////////////
////  Admin stuff   /////
/////////////////////////

// Add admin menu
if (!function_exists('galopin_admin_menu')){
	function galopin_admin_menu(){
		add_theme_page(__('Galopin Settings', 'galopin'),__('Galopin Settings', 'galopin'), 'edit_theme_options', 'galopin_options', 'galopin_options');
	}
}
add_action('admin_menu', 'galopin_admin_menu');

if (!function_exists('galopin_options')){
	function galopin_options(){
		if (!current_user_can('edit_theme_options')) {
			wp_die(__('You do not have sufficient permissions to access this page.'));
		}
       	
       	include 'admin/index.php';
    }
}

// Custom CSS loading
if(!function_exists('galopin_custom_styles')){
	function galopin_custom_styles(){
		if (get_option("galopin_custom_css")){
			echo '<style type="text/css">';
			echo strip_tags(stripslashes(get_option("galopin_custom_css")));
			echo '</style>';
		}
	}
}
add_action('wp_head', 'galopin_custom_styles', 99);

// Main galopin color
if(!function_exists('galopin_user_styles')){
	function galopin_user_styles(){
		if (get_option('galopin_color')){
			$color = apply_filters('galopin_color', get_option('galopin_color'));
			
			require_once 'admin/functions/color-functions.php';
			$hsl = galopin_RGBToHSL(galopin_HTMLToRGB($color));
			if ($hsl->lightness > 180){
				$contrast = apply_filters('galopin_color_contrast', '#333');
			}
			else{
				$contrast = apply_filters('galopin_color_contrast', '#fff');
			}
			
			$hsl->lightness -= 30;
			$complement = apply_filters('galopin_color_complement', galopin_HSLToHTML($hsl->hue, $hsl->saturation, $hsl->lightness));
		}
		else{ // Default color
			$color = '#E54C3C';
			$complement = '#c73829';
			$contrast = '#fff';
		} 
		?>
			<style type="text/css">
			.button, 
			.comment-form input[type="submit"], 
			html a.button,
			input[type='submit'],
			input[type='button'],
			.widget_calendar #next a, 
			.widget_calendar #prev a,
			.menu-wrapper,
			.search-form .submit-btn,
			.post-content th,
			.post-pagination,
			.pagination,
			.menu-wrapper .sub-menu a:hover,
			.back-to-top{
				background: <?php echo $color; ?>;
				color: <?php echo $contrast; ?>;
			}
			.button:hover, 
			.comment-form input[type="submit"]:hover, 
			html a.button:hover,
			input[type='submit']:hover,
			input[type='button']:hover,
			.widget_calendar #next a:hover, 
			.widget_calendar #prev a:hover,
			.search-form .submit-btn:hover,
			.post-content th:hover,
			.post-pagination:hover,
			.back-to-top:hover{
				background: <?php echo $complement; ?>;
				color: <?php echo $contrast; ?>;
			}
			.masonry .brick-link:before,
			.post-thumbnail .post-permalink:before{
				background: <?php echo $contrast; ?>;
				color: <?php echo $color; ?>;
			}
			.menu-wrapper .sub-menu a,
			.footer a,
			.post-header-title a:hover,
			.post-header-meta a,
			.masonry .post-header-title,
			.post-content ul > li:before,
			.post-content ol > li:before,
			.post-content a,
			.post-footer-meta a,
			.comment-author a,
			.comment-reply-link,
			.widget a,
			.comment-form .logged-in-as a,
			.post-header-title:before,
			.widget > h3:before{
				color: <?php echo $color; ?>;
			}
			.footer a:hover,
			.post-header-meta a:hover,
			.post-content a:hover,
			.post-footer-meta a:hover,
			.comment-author a:hover,
			.comment-reply-link:hover,
			.widget a:hover,
			.comment-form .logged-in-as a:hover{
				color: <?php echo $complement; ?>;
			}
			
			.footer,
			.post-header,
			.comment-footer,
			.masonry-footer,
			.masonry-header{
				border-color: <?php echo $color; ?>;
			}
			
			.masonry .brick:hover,
			.blog .post-thumbnail:hover,
			.archive .post-thumbnail:hover{
				background: <?php echo $color; ?>;
			}
			
			.masonry .brick:hover .post-header-title,
			.masonry .brick:hover .post-header-title:before,
			.masonry .brick:hover .post-header-title blockquote a,
			.masonry .brick:hover .post-content,
			.masonry .brick:hover .masonry-footer{
				color: <?php echo $contrast; ?>;
			}			
			</style>
		<?php }
}
add_action('wp_head','galopin_user_styles', 98);


////////////////////////////////////
// License activation
////////////////////////////////////

if(!function_exists('galopin_edd')){
	function galopin_edd(){
		$license = trim(get_option(EDD_SL_LICENSE_KEY));
		$status = get_option('galopin_license_status');
		
		if (!$status){
			//valider la license
			$api_params = array(
				'edd_action'=>'activate_license',
				'license'=>$license,
				'item_name'=>urlencode(EDD_SL_THEME_NAME)
			);
	
			$response = wp_remote_get(add_query_arg($api_params, EDD_SL_STORE_URL), array('timeout'=>15, 'sslverify'=>false));
	
			if (!is_wp_error($response)){
				$license_data = json_decode(wp_remote_retrieve_body($response));
				if ($license_data->license === 'valid') update_option('galopin_license_status', true);
			}
		}
		
		$edd_updater = new EDD_SL_Theme_Updater(array( 
				'remote_api_url'=> EDD_SL_STORE_URL,
				'version' 	=> EDD_SL_THEME_VERSION,
				'license' 	=> $license,
				'item_name' => EDD_SL_THEME_NAME,
				'author'	=> __('Themes de France','galopin')
			)
		);
	}
}
add_action('admin_init', 'galopin_edd');

////////////////////////////////////
// Etendard notifications
////////////////////////////////////

if(!function_exists('galopin_admin_notice')){
	function galopin_admin_notice(){
		global $current_user;
        $user_id = $current_user->ID;
	
		if(!get_option('galopin_license_status')){
			echo '<div class="error"><p>';
			_e("In order to get updates, please enter your licence that you received by email.", 'galopin');
			echo '</p></div>';
		}
	}
}
add_action('admin_notices', 'galopin_admin_notice');