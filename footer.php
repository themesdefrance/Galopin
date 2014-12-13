			</div> <!-- END .content -->
			
			<div class="footer-wrapper">
					
				<div class="wrapper">
				
					<div class="footerbar">
		
						<div class="grid">
							
							<?php do_action('galopin_footer_widgets_top'); ?>
						
								<?php dynamic_sidebar('footer'); ?>
							
							<?php do_action('galopin_footer_widgets_bottom'); ?>
							
						</div><!-- END .grid -->
			
					</div><!-- END .footerbar -->
					
				</div><!-- END .wrapper -->
				
				<footer class="footer" role="contentinfo" itemscope="itemscope" itemtype="http://schema.org/WPFooter">
					<div class="grid">
						
						<?php do_action('galopin_footer_top'); ?>
						
						<div class="footnote col-1-2">
							<?php
							if(get_option("galopin_footer_left")) {
								echo strip_tags(get_option("galopin_footer_left"), '<strong><a><em><img>');
							}else{
								printf(__('<strong>%s</strong> - Galopin by <a href="https://www.themesdefrance.fr/" target="_blank">Themes de France</a>', 'galopin'),date('Y'));
							}
							 ?>
						</div><!-- END .footnote.col-1-2 -->
						<div class="menu col-1-2">
							<?php
							wp_nav_menu(array(
								'theme_location' => 'footer',
								'menu_class'     => 'top-level-menu',
								'container'      => false,
								'depth'          => 1,
								'fallback_cb'    => ''
							));
							?>
						</div><!-- END .menu.col-1-2 -->
						
						<?php do_action('galopin_footer_bottom'); ?>
						
					</div><!-- END .grid -->
				</footer><!-- END .footer -->
				
				<button id="back-to-top" title="<?php _e('Back to the top', 'galopin'); ?>" class="back-to-top typcn typcn-arrow-up-thick"></button>
			
			</div><!-- END .footer-wrapper -->
			
			
		</div><!-- END .content-wrapper -->
	</div><!-- END .page-wrapper -->
	
	<?php wp_footer(); ?>
	
</body>
</html>