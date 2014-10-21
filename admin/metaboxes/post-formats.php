<?php

// Post metaboxes
if(!function_exists('galopin_add_meta_boxes')){
	function galopin_add_meta_boxes(){
		add_meta_box(
					'galopin_link',
					__('Link', 'galopin'),
					'galopin_link_callback',
					 'post',
					 'normal',
					 'high'
					 );
					 
		add_meta_box(
					'galopin_quote',
					__('Quote', 'galopin'),
					'galopin_quote_callback',
					 'post',
					 'normal',
					 'high'
					 );
		
		add_meta_box(
					'galopin_video',
					__('Video', 'galopin'),
					'galopin_video_callback',
					 'post',
					 'normal',
					 'high'
					 );
	}
}
add_action('admin_init', 'galopin_add_meta_boxes');


// Callback functions

if(!function_exists('galopin_link_callback')){
	function galopin_link_callback( $post ) {
	
		$form = new Cocorico(GALOPIN_COCORICO_PREFIX, false);
		$form->startForm();
		
		$form->setting(array('type'=>'url',
						 'name'=>'_link_meta',
						 'label'=>__('Link to feature', 'galopin'),
						 'description' => __('Add a link to feature for this post. You\'re free to talk about it in the post content.','galopin')
						 )
					  );
		
		$form->endForm();
		$form->render();
	}
}

if(!function_exists('galopin_quote_callback')){
	function galopin_quote_callback( $post ) {
		
		$form = new Cocorico(GALOPIN_COCORICO_PREFIX, false);
		$form->startForm();
		
		$form->setting(array('type'=>'text',
						 'name'=>'_quote_meta',
						 'label'=>__('Quote to feature', 'galopin'),
						 'description' => __('Add some wise words and talk about it in the post content.','galopin')
						 )
					  );
		
		$form->setting(array('type'=>'text',
						 'name'=>'_quote_author_meta',
						 'label'=>__('Quote author (optional)', 'galopin'),
						 'description' => __('Be nice and don\'t forget to credit the quote author.','galopin')
						 )
					  );
		
		$form->endForm();
		$form->render();
		
	}
}

if(!function_exists('galopin_video_callback')){
	function galopin_video_callback( $post ) {
	
		$form = new Cocorico(GALOPIN_COCORICO_PREFIX, false);
		$form->startForm();
		
		$form->setting(array('type'=>'url',
						 'name'=>'_video_meta',
						 'label'=>__('Video to feature', 'galopin'),
						 'description' => __('Add a video link from Youtube, Dailymotion or Vimeo.','galopin')
						 )
					  );
		
		$form->endForm();
		$form->render();
	}
}

// Show the right metabox for each format
if(!function_exists('galopin_display_metaboxes')){
	function galopin_display_metaboxes() {
	
	    if ( get_post_type() == "post" ){ ?>
	    
	        <script>
	            jQuery(document).ready(function($) {
	            
		            // Set variables
		            var link_radio = $('#post-format-link'),
		            	quote_radio = $('#post-format-quote'),
		            	video_radio = $('#post-format-video'),
		            	link_metabox = $('#galopin_link'),
		            	quote_metabox = $('#galopin_quote'),
		            	video_metabox = $('#galopin_video'),
		            	all_formats = $('#post-formats-select input');
			            
		            hideAllMetaBoxes();
		            
		            all_formats.change( function() {
					    
				        hideAllMetaBoxes();
				
				        if( $(this).val() == 'link' ) {
							link_metabox.show();
						}
						else if( $(this).val() == 'quote' ) {
						    quote_metabox.show();
						} 
						else if( $(this).val() == 'video' ) {
							video_metabox.show();
						} 
				
					});
				
				    if(link_radio.is(':checked'))
				        link_metabox.show();
				
				    if(quote_radio.is(':checked'))
				        quote_metabox.show();
				        
				    if(video_radio.is(':checked'))
						video_metabox.show();
		            
		            
		            function hideAllMetaBoxes(){
			            link_metabox.hide();
			            quote_metabox.hide();
			            video_metabox.hide();
		            }
	            });
	        </script>
	        
	<?php
		}
	}
}
// Add inline js in admin
add_action( 'admin_print_scripts', 'galopin_display_metaboxes',1000);