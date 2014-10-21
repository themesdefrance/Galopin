<?php $link = get_post_meta($post->ID, '_galopin_link_meta', true); ?>

<article <?php post_class('article'); ?>>

	<header class="post-header">
	
		<div class="post-link">
		
			<?php if (is_single()): ?>
				
				<h1 class="post-header-title"><a href="<?php echo $link; ?>" title="<?php the_title(); ?>" rel="external"><?php the_title(); ?></a></h1>
				
			<?php else: ?>
			
				<h2 class="post-header-title">
				
					<?php if (galopin_is_masonry()): ?>
							
						<?php the_title(); ?>
						
					<?php else: ?>
					
						<a href="<?php echo $link; ?>" title="<?php the_title(); ?>">
						
							<?php the_title(); ?>
						</a>
					
					<?php endif; ?>
				
				</h2>
				
			<?php endif; ?>
		
		</div>
		
		<?php if (!galopin_is_masonry()) get_template_part('content', 'header-meta'); ?>
		
	</header>
	
	<div class="post-content">
		
		<?php //get_template_part( 'content', 'body' ); ?>	
		<?php if (!galopin_is_masonry()) get_template_part('content', 'body'); ?>
	</div>
	
	<footer class="post-footer">
	
		<?php get_template_part( 'content', 'footer-meta' ); ?>
		
	</footer>
	
</article>