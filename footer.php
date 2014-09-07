				<footer class="footer">
					<div class="grid">
						<div class="footnote col-1-2">
							<?php
							if(get_option("galopin_footer_left")) {
								echo strip_tags(get_option("galopin_footer_left"), '<strong><a><em><img>');
							}
							else{  
								_e('<strong>2014</strong> - Galopin by <a href="https://www.themesdefrance.fr" target="_blank">Themes de France</a>', 'galopin');
							} ?>
						</div>
						<div class="menu col-1-2">
							<?php
							wp_nav_menu(array(
								'theme_location' => 'footer',
								'menu_class'     => 'top-level-menu',
								'container'      => false,
								'depth'          => 1,
								'fallback_cb'    => 'galopin_nomenu'
							));
							?>
						</div>
					</div>
				</footer>
				
			</div>
			
		</div>
	</div>
	
	<?php wp_footer(); ?>
	
</body>
</html>