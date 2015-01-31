<?php 	$sidebar = get_option('galopin_show_sidebar'); ?>

<?php do_action('galopin_before_post'); ?>

<article <?php post_class('post'); ?> itemscope itemtype="http://schema.org/CreativeWork">
	
	<?php do_action('galopin_top_post'); ?>
	
	<header class="entry-header post-header">
		
		<?php do_action('galopin_top_header_post'); ?>
			
			<h1 class="entry-title post-header-title" itemprop="headline">
				
				<?php the_title(); ?>
					
			</h1><!--END .entry-title--> 
		
		<?php do_action('galopin_bottom_header_post'); ?>
		
	</header><!--END .entry-header-->
		
	<?php get_template_part('content', 'body'); ?>
	
	<?php get_template_part('content', 'footer-meta'); ?>
	
	<?php do_action('galopin_bottom_post'); ?>
	
</article><!--END .post-->

<?php do_action('galopin_after_post'); ?>