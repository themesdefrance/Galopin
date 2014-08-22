<?php get_header(); ?>
<div class="hero-image">
	<button class="menu-toggle typcn typcn-th-menu"></button>

	<a href="#" class="hero-text">
		Galopin
	</a>
</div>

<div class="wrapper">	
	<div class="grid">
		<div class="col-2-3">
			<ul class="posts">
				<?php while (have_posts()) : the_post(); ?>
				<li>
					<?php get_template_part('content', get_post_format()); ?>
				</li>
				<?php endwhile; ?>
			</ul>
			<div class="pagination">
				<?php galopin_posts_nav(false, ''); ?>
			</div>
		</div>
		<aside class="sidebar col-1-3">
			<?php get_sidebar('blog'); ?>
		</aside>
	</div>

	<aside class="footerbar">
		<div class="grid">
			<?php get_sidebar('footer'); ?>
		</div>
	</aside>
</div>
<?php get_footer(); ?>