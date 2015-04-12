<?php $sidebar = get_option('galopin_show_sidebar'); ?>
<?php get_header(); ?>

<?php do_action('galopin_before_main'); ?>

<div class="wrapper">

	<?php do_action('galopin_top_main'); ?>

	<div class="<?php if ($sidebar) echo 'grid'; ?>">

		<div class="main<?php if ($sidebar) echo ' col-2-3'; ?>" role="main" itemprop="mainContentOfPage">

			<?php the_post(); get_template_part('content', get_post_format()); ?>

			<?php galopin_single_post_nav(); ?>

			<?php if(comments_open()) comments_template(); ?>

		</div><!--END .main -->

		<?php if ($sidebar)get_sidebar('blog'); ?>

	</div><!--END .grid-->

	<?php do_action('galopin_bottom_main'); ?>

</div><!--END .wrapper -->

<?php do_action('galopin_after_main'); ?>

<?php get_footer(); ?>