<?php 
$masonry = galopin_is_masonry();
$sidebar = get_option('galopin_show_sidebar');
?>

<?php get_header(); ?>

<?php do_action('galopin_before_main'); ?>	

<div class="wrapper">
	
	<?php do_action('galopin_top_main'); ?>

	<div class="<?php if (!$masonry && $sidebar) echo 'grid'; ?>">
	
		<div class="main<?php if (!$masonry && $sidebar) echo ' col-2-3'; ?>" role="main" itemprop="mainContentOfPage">
			
			<?php if ($masonry){ get_template_part('header', 'masonry'); } ?>
			
			<ul class="posts <?php if ($masonry) echo 'masonry'; ?>">
			
				<?php while (have_posts()) : the_post(); ?>
				
					<li class="<?php if ($masonry) echo 'brick'; ?>">
					
						<?php if ($masonry): ?><a class="brick-link" title="<?php _e('Read more','galopin'); ?>" href="<?php the_permalink(); ?>"><?php endif; ?>
						
							<?php get_template_part('content', get_post_format()); ?>
							
						<?php if ($masonry): ?></a><?php endif; ?>
						
					</li>
				
				<?php endwhile; ?>
				
			</ul><!--END .posts-->
			
			<?php galopin_posts_nav(false, '', '<div class="pagination">', '</div>'); ?>
			
		</div>
		
		<?php if (!$masonry && $sidebar)get_sidebar('blog'); ?>
		
	</div><!--END .main -->
	
	<?php do_action('galopin_bottom_main'); ?>
	
</div><!--END .wrapper -->

<?php do_action('galopin_after_main'); ?>

<?php get_footer(); ?>