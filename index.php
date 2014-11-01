<?php 
$masonry = galopin_is_masonry();
$sidebar = get_option('galopin_show_sidebar');
?>

<?php get_header(); ?>

<div class="wrapper">	

	<div class="<?php if (!$masonry && $sidebar) echo 'grid'; ?>">
	
		<div class="<?php if (!$masonry && $sidebar) echo 'col-2-3'; ?>">
			
			<?php if ($masonry){ get_template_part('header', 'masonry'); } ?>
			
			
			<ul class="posts <?php if ($masonry) echo 'masonry'; ?>">
			
				<?php while (have_posts()) : the_post(); ?>
				
					<li class="<?php if ($masonry) echo 'brick'; ?>">
					
						<?php if ($masonry): ?><a class="brick-link" title="<?php _e('Read more','galopin'); ?>" href="<?php the_permalink(); ?>"><?php endif; ?>
						
							<?php get_template_part('content', get_post_format()); ?>
							
						<?php if ($masonry): ?></a><?php endif; ?>
						
					</li>
				
				<?php endwhile; ?>
				
			</ul>
			
			<?php galopin_posts_nav(false, '', '<div class="pagination">', '</div>'); ?>
			
		</div>
		
		<?php if (!$masonry && $sidebar){ ?>
		
		<aside class="sidebar col-1-3">
		
			<?php get_sidebar('blog'); ?>
			
		</aside>
		
		<?php } ?>
		
	</div>
	
</div>

<?php get_footer(); ?>