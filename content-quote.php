<?php $quote = "“" . get_post_meta($post->ID, '_galopin_quote_meta', true) . "”"; ?>
<?php $author_quote = get_post_meta($post->ID, '_galopin_quote_author_meta', true); ?>

<?php do_action('galopin_before_post'); ?>

<article <?php post_class('post'); ?> itemscope itemtype="http://schema.org/Article">
	
	<?php do_action('galopin_top_post'); ?>
	
	<header class="post-header">
		
		<?php do_action('galopin_top_header_post'); ?>
		
		<div class="post-quote">
		
			<?php if (is_single()): ?>
				
				<h1 class="entry-title post-header-title" itemprop="headline">
				
					<blockquote><?php echo sanitize_text_field($quote); ?></blockquote>
					
				</h1>
				
			<?php else: ?>
				
				<h2 class="entry-title post-header-title" itemprop="headline">
				
					<blockquote>
					
						<?php if (galopin_is_masonry()): ?>
						
							<?php echo sanitize_text_field($quote); ?>
							
						<?php else: ?>
						
							<a href="<?php the_permalink(); ?>" title="<?php echo sanitize_text_field($quote); ?>">
							
								<?php echo sanitize_text_field($quote); ?>
								
							</a>
						
						<?php endif; ?>
					
					</blockquote>
					
				</h2>
				
			<?php endif; ?>
			
			<span class="post-quote-author"><?php echo sanitize_text_field($author_quote); ?></span>
			
		</div>
		
		<?php if (!galopin_is_masonry()) get_template_part('content', 'header-meta'); ?>
		
		<?php do_action('galopin_bottom_header_post'); ?>
		
	</header>
	
	<?php if (!galopin_is_masonry()) get_template_part('content', 'body'); ?>
	
	<?php get_template_part('content', 'footer-meta'); ?>
	
	<?php do_action('galopin_bottom_post'); ?>
	
</article>

<?php do_action('galopin_after_post'); ?>