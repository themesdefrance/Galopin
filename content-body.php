<?php 
if (is_single() || is_page()){
	the_content();
}
else if(is_category() || is_tax()){
	echo galopin_excerpt(25); ?>
	
	<a href="<?php the_permalink(); ?>" class="button" title="<?php the_title(); ?>"><?php _e('Read more','galopin'); ?></a>
<?php 
}else if(is_tag()|| is_search()){
	echo galopin_excerpt(0); // == No excerpt
}else{
	echo galopin_excerpt(50);
?>
	<a href="<?php the_permalink(); ?>" class="button" title="<?php the_title(); ?>"><?php _e('Read more','galopin'); ?></a>

<?php } ?>