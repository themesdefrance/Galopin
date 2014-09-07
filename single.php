<?php 
$sidebar = get_option('galopin_show_sidebar');
?>
<?php get_header(); ?>
<div class="wrapper">	
	<div class="<?php if ($sidebar) echo 'grid'; ?>">
		<div class="<?php if ($sidebar) echo 'col-2-3'; ?>">
			<?php the_post(); get_template_part('content', get_post_format()); ?>
			<?php comments_template(); ?>
			<div class="pagination">
				<?php galopin_posts_nav(false, ''); ?>
			</div>
		</div>
		<?php if ($sidebar){ ?>
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