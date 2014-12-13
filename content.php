<?php 	$sidebar = get_option('galopin_show_sidebar');
		$postlink = ((is_single() || is_page() || galopin_is_masonry()) ? false : true); ?>

<?php do_action('galopin_before_post'); ?>

<article <?php post_class('post'); ?> itemscope itemtype="http://schema.org/Article">
	
	<?php do_action('galopin_top_post'); ?>
	
	<header class="post-header">
		
		<?php do_action('galopin_top_header_post'); ?>
					
		<?php if (has_post_thumbnail() && !post_password_required()): ?>
		
			<div class="post-thumbnail">
			
				<?php if ($postlink){ ?> <a href="<?php the_permalink(); ?>" title="<?php _e('Read more','galopin'); ?>" class="post-permalink"><?php } ?>

					<?php
						if($sidebar)
							the_post_thumbnail('galopin-post-thumbnail');
						else
							the_post_thumbnail('galopin-post-thumbnail-full');
					?>
					
				<?php if ($postlink){ ?></a> <?php } ?>
					
			</div><!--END .entry-thumbnail-->
			
		<?php endif; ?>
		
		
		<?php if (is_single() || is_page()): ?>
			
			<h1 class="entry-title post-header-title" itemprop="headline">
				
				<?php the_title(); ?>
					
			</h1>
			
		<?php elseif(!is_page()): ?>
		
			<h2 class="entry-title post-header-title" itemprop="headline">
			
				<?php if (galopin_is_masonry()): ?>
					
					<?php the_title(); ?>
					
				<?php else: ?>
				
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php the_title(); ?>
				</a>
				
				<?php endif; ?>
				
			</h2>
			
		
		<?php endif; ?> 
		
		<?php if (!galopin_is_masonry()) get_template_part('content', 'header-meta'); ?>
		
		<?php do_action('galopin_bottom_header_post'); ?>
		
	</header>
		
	<?php get_template_part('content', 'body'); ?>
	
	<?php get_template_part('content', 'footer-meta'); ?>
	
	<?php do_action('galopin_bottom_post'); ?>
	
</article>

<?php do_action('galopin_after_post'); ?>