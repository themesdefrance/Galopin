				<footer class="footer">
					<div class="grid">
						<div class="footnote col-1-2">
							left
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