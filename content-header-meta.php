<?php if(!is_page() && !is_tag()): ?> 
		
	<span class="post-header-meta">
	
		<?php echo sprintf(__('Published on %2$s by <a href="%3$s">%4$s</a> in %5$s | ','galopin'), get_post_format_string(get_post_format()), get_the_date(), get_author_posts_url( get_the_author_meta( 'ID' ) ), get_the_author_meta('display_name') ,get_the_category_list('/')); ?> 
		
		<?php comments_number(__('No Comment', 'galopin'), __('One Comment', 'galopin'), __('% Comments', 'galopin')); ?> 
		
		<?php edit_post_link(__('Edit', 'galopin')); ?>
		
	</span>

<?php endif; ?>