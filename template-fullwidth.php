<?php 
/*
Template Name: Fullwidth
*/
__('Fullwidth','galopin');
?>

<?php get_header(); ?>

<div class="wrapper">	
			
			<ul class="posts">
			
				<?php while (have_posts()) : the_post(); ?>
				
					<li>
						<?php get_template_part('content'); ?>
						
					</li>
				
				<?php endwhile; ?>
				
			</ul>
			
			<?php galopin_posts_nav(false, '', '<div class="pagination">', '</div>'); ?>
			
		</div>

<?php get_footer(); ?>