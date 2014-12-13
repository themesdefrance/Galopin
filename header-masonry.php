<?php do_action('galopin_before_masonry_header'); ?>

<div class="masonry-header">
	
	<?php do_action('galopin_top_masonry_header'); ?>
	
	<?php if(is_category()){ ?>
	
			<h1 class="masonry-header-title">
				<?php single_cat_title(__('Posts from ', 'galopin')); ?>
			</h1>
			
	<?php }else if(is_tag()){ ?>
		
			<h1 class="masonry-header-title">
				<?php single_tag_title(__('Posts tagged by ', 'galopin')); ?>
			</h1>
			
	<?php }else if(is_search()){ ?>
		
			<h1 class="masonry-header-title">
				<?php printf( __( 'Search results for : %s', 'galopin' ), get_search_query() ); ?>
			</h1>
			
	<?php }else if(is_author()){ ?>
	
			<?php $author = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); ?>
			
			<h1 class="masonry-header-title">
				<?php printf( __( 'Posts by %s', 'galopin' ), $author->display_name ); ?>
			</h1>
		
	<?php }else if(is_archive()){ ?>
	
		<h1 class="masonry-header-title">
			<?php if (is_day()) { 
					_e('Archives from ', 'galopin');
					the_time(get_option('date_format'));
				}
				elseif(is_month()){
					_e('Archives for ', 'galopin');
					the_time('F Y');
				}
				elseif(is_year()){
					_e('Archives for ', 'galopin');
					the_time('Y');
				}
				else{
					_e('Archives', 'galopin');
				}
				?>
		</h1>
	
	<?php }else if(is_home()){ ?>
		
		<h1 class="masonry-header-title">
			<?php echo apply_filters('galopin_masonry_home_header_title', __('Blog', 'galopin')); ?>
		</h1>
		
	<?php }else{ ?>

		<h1 class="masonry-header-title">
			<?php echo apply_filters('galopin_masonry_default_header_title', __('Blog', 'galopin')); ?>
		</h1>
		
	<?php } ?>
	
	<?php do_action('galopin_bottom_masonry_header'); ?>
	
</div><!--END .masonry-header-->

<?php do_action('galopin_after_masonry_header'); ?>