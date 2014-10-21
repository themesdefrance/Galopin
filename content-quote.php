<?php $quote = "“" . get_post_meta($post->ID, '_galopin_quote_meta', true) . "”"; ?>
<?php $author_quote = get_post_meta($post->ID, '_galopin_quote_author_meta', true); ?>

<article <?php post_class('post'); ?> itemscope itemtype="http://schema.org/Article">

	<header class="post-header">
		
		<div class="post-quote">
		
			<?php if (is_single()): ?>
				
				<h1 class="post-header-title" itemprop="name">
				
					<blockquote><?php echo $quote; ?></blockquote>
					
				</h1>
				
			<?php else: ?>
				
				<h2 class="post-header-title" itemprop="name">
				
					<blockquote>
					
						<?php if (galopin_is_masonry()): ?>
						
							<?php echo $quote; ?>
							
						<?php else: ?>
						
							<a href="<?php the_permalink(); ?>" title="<?php echo $quote; ?>">
							
								<?php echo $quote; ?>
								
							</a>
						
						<?php endif; ?>
					
					</blockquote>
					
				</h2>
				
			<?php endif; ?>
			
			<span class="post-quote-author"><?php echo $author_quote; ?></span>
			
		</div>
		
		<?php if (!galopin_is_masonry()) get_template_part('content', 'header-meta'); ?>
		
	</header>
	
	<?php if(!galopin_is_masonry()){ ?>
		
		<div class="post-content quote" itemprop="articleBody">
			
			<?php get_template_part('content', 'body'); ?>
			
		</div>
		
	<?php } ?>
	
	<footer class="post-footer">
	
		<?php get_template_part('content', 'footer-meta'); ?>
		
	</footer>
	
</article>