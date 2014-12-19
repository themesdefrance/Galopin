<?php $video_link = get_post_meta($post->ID, '_galopin_video_meta', true); ?>

<?php do_action('galopin_before_post'); ?>

<article <?php post_class('article'); ?> itemscope itemtype="http://schema.org/Article">

	<?php do_action('galopin_top_post'); ?>
	
	<header class="post-header">
		
		<?php do_action('galopin_top_header_post'); ?>
	
		<div class="post-video">
									
			<?php echo wp_oembed_get( esc_url($video_link)); ?>
			
		</div>
		
		<?php if (is_single()): ?>
			
			<h1 class="entry-title post-header-title" itemprop="headline"><?php the_title(); ?></h1>
			
		<?php else: ?>
		
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
		
	<?php get_template_part( 'content', 'body' ); ?>	
	
	<?php get_template_part( 'content', 'footer-meta' ); ?>
	
	<?php do_action('galopin_bottom_post'); ?>
	
</article>

<?php do_action('galopin_after_post'); ?>