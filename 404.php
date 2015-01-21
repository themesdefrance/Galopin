<?php get_header(); ?>
	
	<?php do_action('galopin_before_main'); ?>	
	
	<div class="wrapper">
		
		<?php do_action('galopin_top_main'); ?>
		
		<div class="main" role="main" itemprop="mainContentOfPage">
		
			<ul class="posts">
				<li>
					
					<?php do_action('galopin_before_post'); ?>
					
					<article <?php post_class('post'); ?> itemscope itemtype="http://schema.org/Article">
						
						<?php do_action('galopin_top_post'); ?>
						
						<header class="entry-header post-header">
							
							<h1 class="entry-title post-header-title" itemprop="headline">
									
								<?php _e('Oops, there is nothing here...', 'galopin'); ?>
										
							</h1>
							
						</header><!--END .entry-header-->
						
						<?php do_action('galopin_before_content'); ?>
						
						<div class="entry-content post-content" itemprop="articleBody">
							
							<?php do_action('galopin_top_content'); ?>
							
							<p>
								<?php printf(__("The page you requested does not seem to exist. You can go back to <a href=\"%s\">the home page</a> or browse the archives :", 'galopin'), home_url()); ?>
							</p>
							
							<ul class="galopin-archives">
								<?php echo galopin_archives(); ?>
							</ul>
							
							<?php do_action('galopin_bottom_content'); ?>
							
						</div><!--END .entry-content.post-content -->
						
						<?php do_action('galopin_after_content'); ?>
						
						<?php do_action('galopin_bottom_post'); ?>
						
					</article><!--END .post-->
					
					<?php do_action('galopin_after_post'); ?>
					
				</li>
			</ul><!--END .posts -->
		
		</div><!--END .main -->
		
		<?php do_action('galopin_bottom_main'); ?>
	
	</div><!--END .wrapper -->
	
	<?php do_action('galopin_after_main'); ?>	
	
<?php get_footer(); ?>