<?php get_header(); ?>

	<div class="wrapper" role="main" itemprop="mainContentOfPage">
		
		<ul class="posts">
			<li>

				<article <?php post_class('post'); ?> itemscope itemtype="http://schema.org/Article">
				
					<header class="post-header">
						
						
						<h1 class="post-header-title" itemprop="headline">
								
							<?php _e('Oops, there is nothing here...', 'galopin'); ?>
									
						</h1>
						
						
					</header>
					
					<div class="post-content" itemprop="articleBody">
						
						<p>
							<?php printf(__("The page you requested does not seem to exist. You can go back to <a href=\"%s\">the home page</a> or browse the archives :", 'galopin'), home_url()); ?>
						</p>
						
						
						<ul class="galopin-archives">
							<?php echo galopin_archives(); ?>
						</ul>
						
					</div>
					
					<footer class="post-footer">
						
						
					</footer>
					
				</article>
				
			</li>
		</ul>
		
	
	</div>
<?php get_footer(); ?>