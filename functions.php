<?php

define('GALOPIN_COCORICO_PREFIX', 'galopin_');
require_once 'admin/Cocorico/Cocorico.php';

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
		
		// Add Meta boxes for post formats
		require_once 'admin/metaboxes/post-formats.php';
		
		// Load language
		//load_theme_textdomain('galopin', get_template_directory().'/local');
	}
}
add_action('after_setup_theme', 'galopin_setup');

//add custom image size to native dailogs
if (!function_exists('galopin_image_size_names_choose')){
	function galopin_image_size_names_choose($sizes) {
		$added = array('galopin-post-thumbnail'=>__('Post', 'galopin'));
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
		
		wp_register_script('fitvids', get_template_directory_uri().'/js/jquery.fitvids.js', array('jquery'), $theme->get('Version'), true);
		
		wp_register_script('galopin', get_template_directory_uri().'/js/galopin.js', array('jquery'), $theme->get('Version'), true);
		
		//main stylesheet
		wp_enqueue_style('stylesheet', get_stylesheet_directory_uri().'/style.css', array(), $theme->get('Version'));
		
		//icons
		wp_enqueue_style('icons', get_stylesheet_directory_uri().'/fonts/typicons.min.css', array(), $theme->get('Version'));
		
		wp_enqueue_script('fitvids');
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
		add_theme_page('Galopin Settings', 'Galopin Settings', 'edit_theme_options', 'galopin_options', 'galopin_options');
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
			echo htmlentities(stripslashes(get_option("galopin_custom_css")), ENT_NOQUOTES);
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
			
			require_once 'admin/color_functions.php';
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
			.widget_calendar #next a:hover, 
			.widget_calendar #prev a:hover,
			.search-form .submit-btn:hover,
			.post-content th:hover,
			.post-pagination:hover,
			.back-to-top:hover{
				background: <?php echo $complement; ?>;
				color: <?php echo $contrast; ?>;
			}
			.menu-wrapper .sub-menu a,
			.footer a,
			.post-header-title a,
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
			.post-header-title a:hover,
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
			
			.masonry .brick:hover{
				<?php $hsl_hover = galopin_RGBToHSL(galopin_HTMLToRGB($contrast)); ?>
				background: <?php echo $color; ?>;
				text-shadow: 0 0 3px <?php echo galopin_HSLToHTML($hsl_hover->hue, $hsl_hover->saturation, $hsl_hover->lightness, 0.7); ?>;
			}
			
			.masonry .brick:hover .post-header-title,
			.masonry .brick:hover .post-header-title:before,
			.masonry .brick:hover .post-header-title blockquote a,
			.masonry .brick:hover .masonry-footer,
			.typcn-th-menu:before{
				text-shadow: 0 0 3px <?php echo galopin_HSLToHTML($hsl_hover->hue, $hsl_hover->saturation, $hsl_hover->lightness, 0.7); ?>;
			}
			
			.masonry .brick-link:before{
				background: <?php echo $contrast; ?>;
				color: <?php echo $color; ?>;
			}
			@media only screen and (max-width: 550px){
				body:not(.home) .hero-image{
					background: <?php echo $color; ?> !important;
					color: <?php echo $contrast; ?> !important;
				}
			}
			
			
			</style>
		<?php }
}
add_action('wp_head','galopin_user_styles', 98);


/////////////////////////
// Utility functions   //
/////////////////////////
if (!function_exists('galopin_is_masonry')){
	function galopin_is_masonry(){
		// Are we on a page that support masonry ? If yes, check if masonry is activated
		if(!is_page() && !is_single() && !is_404() && !is_singular() && !is_attachment() && !is_page_template() && !is_preview())
			return get_option('galopin_masonry');
		return false;
	}
}

if (!function_exists('galopin_excerpt')){
	function galopin_excerpt($length){
		if($length==0)
			return '';
		
		$content = strip_shortcodes(get_the_content());
		$excerpt = "<p>" . wp_trim_words( $content , $length ) . "</p>";
		return $excerpt;
	}
}

// Thanks to https://gist.github.com/tommcfarlin/f2310bfad60b60ae00bf#file-is-paginated-post-php
if (!function_exists('galopin_is_paginated_post')){
	function galopin_is_paginated_post() {
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

//customized pagination links
if (!function_exists('galopin_posts_nav')){
	//derived from http://www.wpbeginner.com/wp-themes/how-to-add-numeric-pagination-in-your-wordpress-theme/
	/*
	 @param $extremes : display or not previous & next links
	 @param $separator : string to insert between each page
	*/
	
	function galopin_posts_nav($extremes=true, $separator='|'){
		if (is_singular()) return;
	
		global $wp_query;
		$output = '';
	
		// Stop execution if there's only 1 page
		if($wp_query->max_num_pages <= 1) return;
	
		$paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
		$max = intval($wp_query->max_num_pages);
	
		// Add current page to the array
		if ($paged >= 1) $links[] = $paged;
	
		// Add the pages around the current page to the array
		if ($paged >= 3){
			$links[] = $paged - 1;
			$links[] = $paged - 2;
		}
	
		if (($paged + 2 ) <= $max){
			$links[] = $paged + 2;
			$links[] = $paged + 1;
		}
		
		$current = apply_filters('galopin_post_nav_current', '<span class="current">%s</span>');
		$linkTemplate = apply_filters('galopin_post_nav_link', '<a href="%s">%s</a>');
	
		// Previous Post Link
		if ($extremes && get_previous_posts_link()) previous_posts_link();
	
		// Link to first page, plus ellipses if necessary */
		if (!in_array(1, $links)){
			if ($paged == 1)
				$output .= sprintf($current, '1');
			else
				$output .= sprintf($linkTemplate, esc_url(get_pagenum_link(1)), '1');
			
			echo $separator;
			if (!in_array(2, $links)) $output .= '…'.$separator;
		}
	
		// Link to current page, plus 2 pages in either direction if necessary
		sort($links);
		foreach ((array) $links as $link){
			if ($paged == $link)
				$output .= sprintf($current, $link);
			else
				$output .= sprintf($linkTemplate, esc_url(get_pagenum_link($link)), $link);
				
			if ($link < $max) $output .= $separator;
		}
	
		// Link to last page, plus ellipses if necessary
		if (!in_array($max, $links)){
			if (!in_array($max-1, $links)) $output .= '…'.$separator;
	
			if ($paged == $max)
				$output .= sprintf($current, $link);
			else
				$output .= sprintf($linkTemplate, esc_url(get_pagenum_link($max)), $max);
		}
		
		echo apply_filters('galopin_post_nav', $output);
	
		// Next Post Link
		if ($extremes && get_next_posts_link()) next_posts_link();
	}
}

// Borrowed from http://themeshaper.com/2012/11/04/the-wordpress-theme-comments-template/
if (!function_exists('galopin_comment')){
	function galopin_comment($comment, $args, $depth){
		$GLOBALS['comment'] = $comment;
		switch ($comment->comment_type) :
			case 'pingback' :
			case 'trackback' :
		?>
		<li class="post pingback">
			<p>
				<?php echo apply_filters('galopin_pingback', __('Pingback:', 'galopin')); ?>
				<?php comment_author_link(); ?>
			</p>
		<?php
			break;
		default :
		?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
			<article id="comment-<?php comment_ID(); ?>" class="comment">
				<aside class="comment-aside">
					<?php if ($comment->comment_approved == '0') : ?>
						<em><?php echo apply_filters('galopin_commentaire_modere', __('Your comment is waiting for moderation.', 'galopin')); ?></em>
					<?php endif; ?>
					<?php echo get_avatar($comment, 80); ?>
				</aside>
				
				<div class="comment-main">
					<header class="comment-header">
						<div class="comment-author vcard">
							<?php echo apply_filters('galopin_commentaire_auteur', sprintf(__('%s', 'galopin'), sprintf(__('<cite class="fn">%s</cite>', 'galopin'), get_comment_author_link()))); ?>
						</div>
					</header>
		 
					<div class="post-content">
						<?php comment_text(); ?>
					</div>
					
					<footer class="comment-footer">
						<div class="comment-date">
							<?php echo apply_filters('galopin_commentaire_date', sprintf(__('Published on %s at %s', 'galopin'),get_comment_date(),get_comment_time('H:i'))); ?>
						</div>
						<div class="reply">
							<?php 
							comment_reply_link(array_merge($args, 
								array(	'depth'=>$depth, 
										'max_depth'=>$args['max_depth'],
										'reply_text'=>apply_filters('galopin_commentaire_repondre', __('Reply', 'galopin'))))); 
							?>
						</div>
					<footer>
				</div>
			</article>
		<?php
			break;
		endswitch;
	}
}

//relies on the Cocorico Social plugin : https://wordpress.org/plugins/cocorico-social/
if (!function_exists('galopin_social')){
	function galopin_social(){
		$export = '';
		
		if (function_exists('coco_social_share')){
			$networks =  get_option('cocosocial_networks_blocks');
			
			if (is_array($networks)){
			
				foreach ($networks as $network=>$enabled){
					if (!$enabled) continue;
					
					switch ($network){
						case 'twitter':
							$export .= '<li><a href="https://twitter.com/'.get_option('cocosocial_twitter_username').'" class="typcn typcn-social-twitter-circular"></a></li>';
							break;
						case 'email':
						case 'viadeo':
							//sorry, no viadeo support because wedon't have an icon for it
							//and email doesnt make too much sense here
							break;
						default:
							$url = get_option('cocosocial_'.$network.'_url');
							if (trim($url) !== ''){
								$icon = $network;
								if ($network == 'googleplus') $icon = 'google-plus';
	
								$export .= '<li><a href="'.esc_url($url).'" class="typcn typcn-social-'.$icon.'-circular"></a></li>';
							}
							break;
					}
				}
			}
		}
		
		return $export;
	}
}

// Only get post in search results
if (!function_exists('galopin_search_filter')){
	function galopin_search_filter($query) {
	
		if ($query->is_search)
			$query->set('post_type', 'post');
		return $query;
	}
}
add_filter('pre_get_posts','galopin_search_filter');
