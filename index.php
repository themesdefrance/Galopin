<?php get_header(); ?>
<div class="hero-image">
	<button class="menu-toggle typcn typcn-th-menu"></button>

	<div class="hero-text">
		Galopin
	</div>
</div>

<div class="wrapper">	
	<div class="grid">
		<ul class="posts col-2-3">
			<?php while (have_posts()) : the_post(); ?>
			<li>
				<?php get_template_part('content', get_post_format()); ?>
			</li>
			<?php endwhile; ?>
		</ul>
		<aside class="sidebar col-1-3">
			<?php get_sidebar('blog'); ?>
		</aside>
	</div>

	<aside class="footerbar">
		<?php get_sidebar('footer'); ?>
	</aside>
</div>
<?php get_footer(); ?>