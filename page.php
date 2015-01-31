<?php $sidebar = get_option('galopin_show_sidebar'); ?>

<?php get_header(); ?>

<?php do_action('galopin_before_main'); ?>	

<div class="wrapper">
	
	<?php do_action('galopin_top_main'); ?>

	<div class="<?php if ($sidebar) echo 'grid'; ?>">
	
		<div class="main<?php if ($sidebar) echo ' col-2-3'; ?>" role="main" itemprop="mainContentOfPage">
				
				<?php if(have_posts()) : ?>
				
					<ul class="posts">
			
						<?php while (have_posts()) : the_post(); ?>
						
							<li>							
								
								<?php get_template_part('content', 'page'); ?>
								
							</li>
						
						<?php endwhile; ?>
					
					</ul><!--END .posts-->
				
				<?php else : ?>
					
						<?php get_template_part('content', 'none'); ?>
					
				<?php endif; ?>
			
		</div>
		
		<?php if ($sidebar)get_sidebar('blog'); ?>
		
	</div><!--END .main -->
	
	<?php do_action('galopin_bottom_main'); ?>
	
</div><!--END .wrapper -->

<?php do_action('galopin_after_main'); ?>

<?php get_footer(); ?>