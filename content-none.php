<?php do_action('galopin_before_post'); ?>

<article class="post" itemscope itemtype="http://schema.org/Article">
	
	<?php do_action('galopin_top_post'); ?>
	
	<div class="entry-content post-content">
				
		<p>
			<?php printf(__("Sorry, no posts were found. You can go back to <a href=\"%s\">the home page</a> or browse the archives :", 'galopin'), home_url()); ?>
		</p>
		
		<ul class="galopin-archives">
			<?php echo galopin_archives(); ?>
		</ul>
	
	</div><!--END .entry-content-->
	
	<?php do_action('galopin_bottom_post'); ?>
	
</article><!--END .post-->

<?php do_action('galopin_after_post'); ?>