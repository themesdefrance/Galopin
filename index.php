<?php 
$masonry = galopin_is_masonry();
$sidebar = get_option('galopin_show_sidebar');
?>

<?php get_header(); ?>

<div class="wrapper">	

	<div class="<?php if (!$masonry && $sidebar) echo 'grid'; ?>">
	
		<div class="<?php if (!$masonry && $sidebar) echo 'col-2-3'; ?>">
		
			<ul class="posts <?php if ($masonry) echo 'masonry'; ?>">
			
				<?php while (have_posts()) : the_post(); ?>
				
				<li class="<?php if ($masonry) echo 'brick'; ?>">
				
					<?php get_template_part('content', get_post_format()); ?>
					
				</li>
				
				<?php endwhile; ?>
				
			</ul>
			
			<div class="pagination">
				<?php galopin_posts_nav(false, ''); ?>
			</div>
			
		</div>
		
		<?php if (!$masonry && $sidebar){ ?>
		
		<aside class="sidebar col-1-3">
		
			<?php get_sidebar('blog'); ?>
			
		</aside>
		
		<?php } ?>
		
	</div>

	<aside class="footerbar">
	
		<div class="grid">
		
			<?php get_sidebar('footer'); ?>
			
		</div>
		
	</aside>
	
</div>

<?php get_footer(); ?>