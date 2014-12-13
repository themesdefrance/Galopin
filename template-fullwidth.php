<?php 
/*
Template Name: Fullwidth
*/
__('Fullwidth','galopin');
?>

<?php get_header(); ?>

<?php do_action('galopin_before_main'); ?>	

<div class="wrapper">	
	
	<?php do_action('galopin_top_main'); ?>
	
	<div class="main" role="main" itemprop="mainContentOfPage">
	
		<ul class="posts">
		
			<?php while (have_posts()) : the_post(); ?>
			
				<li>
					<?php get_template_part('content'); ?>
				</li>
			
			<?php endwhile; ?>
			
		</ul><!--END .posts -->
		
		<?php galopin_posts_nav(false, '', '<div class="pagination">', '</div>'); ?>
	
	</div><!--END .main -->

	<?php do_action('galopin_bottom_main'); ?>
	
</div><!--END .wrapper -->

<?php do_action('galopin_after_main'); ?>

<?php get_footer(); ?>