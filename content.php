<article <?php post_class('post'); ?> itemscope itemtype="http://schema.org/Article">

	<header class="post-header">
	
		<?php if(!is_category() && !is_tag()): ?>
					
			<?php if (has_post_thumbnail() && !post_password_required()): ?>
			
				<div class="post-thumbnail">
				
					<?php if (is_single() || is_page() || galopin_is_masonry()): ?>
					
						<?php the_post_thumbnail('galopin-post-thumbnail'); ?>
						
					<?php else: ?>
					
						<a href="<?php the_permalink(); ?>" title="<?php esc_attr(the_title()); ?>"><?php the_post_thumbnail('galopin-post-thumbnail'); ?></a>
						
					<?php endif; ?>
				</div><!--END .entry-thumbnail-->
				
			<?php endif; ?>
		
		<?php endif; ?>
		
		<?php if (is_single() || is_page()): ?>
			
			<h1 class="post-header-title" itemprop="name">
				
				<?php the_title(); ?>
					
			</h1>
			
		<?php elseif(!is_page()): ?>
		
			<h2 class="post-header-title" itemprop="name">
			
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
		
	</header>
	
	<div class="post-content" itemprop="articleBody">
		
		<?php get_template_part('content', 'body'); ?>

	</div>
	
	<footer class="post-footer">
	
		<?php get_template_part('content', 'footer-meta'); ?>
		
	</footer>
	
</article>