<?php do_action('galopin_before_content'); ?>

<div class="entry-content post-content <?php get_post_format(); ?>" itemprop="articleBody">

<?php do_action('galopin_top_content'); ?>

<?php

	if (is_single() || is_page()){
	
		the_content();
	}
	else if(is_category() || is_tax()){
	
		echo galopin_excerpt(25);
		
		if (!galopin_is_masonry()){ ?>
		
		<p class="readmore">
			<a href="<?php the_permalink(); ?>" class="bookmark button" title="<?php the_title_attribute(); ?>" rel="bookmark" itemprop="url"><?php _e('Read more','galopin'); ?></a>
		</p>
		
	<?php
		}
	 
	}else if(is_tag()|| is_search()){
	
		echo galopin_excerpt(0); // == No excerpt
		
	} else if (galopin_is_masonry()){
	
		echo galopin_excerpt(20);
		
	}else{
	
		echo galopin_excerpt(40);
		
		if (!galopin_is_masonry()){ ?>
		
			<p class="readmore">
				<a href="<?php the_permalink(); ?>" class="bookmark button" title="<?php the_title_attribute(); ?>" rel="bookmark" itemprop="url"><?php _e('Read more','galopin'); ?></a>
			</p>
		
		<?php } ?>
	
<?php } ?>

<?php do_action('galopin_after_content'); ?>

</div><!--END .entry-content -->

<?php do_action('galopin_after_content'); ?>