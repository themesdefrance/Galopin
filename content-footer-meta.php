<footer class="post-footer">
	
	<?php do_action('galopin_top_footer_post'); ?>
	
	<?php if(apply_filters('galopin_display_post_tags', true)){ ?>
	
		<?php if(has_tag() && is_single()){ ?>
		
			<span class="post-footer-meta" itemscope="keywords">
			
				<?php echo get_the_tag_list(apply_filters('galopin_before_post_tags', ''),' | ',apply_filters('galopin_after_post_tags', '')); ?>
			
			</span>
			
		<?php } ?>
	
	<?php } ?>
	
	<?php if(galopin_is_paginated_post() && !galopin_is_masonry()){ ?>
		<nav>
		
		<?php wp_link_pages(array(
			'before'=>'<div class="post-pagination"><span class="page-links-title">'.__('Pages:', 'galopin').'</span>', 
			'after'=>'</div>'
		)); ?>
		
		</nav>
	<?php } ?>
	
	<?php if (galopin_is_masonry()){ ?>
		<div class="masonry-footer">
			<time class="date updated">
				<?php the_time(get_option('date_format')); ?>
			</time>
		</div>
	<?php } ?>
	
	<?php do_action('galopin_bottom_footer_post'); ?>
	
</footer>