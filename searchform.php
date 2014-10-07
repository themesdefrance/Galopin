<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<label>
		<span class="screen-reader-text"><?php __('Search for:','galopin') ?></span>
		<input type="search" class="search-field" placeholder="<?php __('Search ...','galopin') ?>" value="" name="s" title="<?php __('Search for:','galopin') ?>" />
		<button class="reset-btn typcn typcn-times" type="reset"></button>
	</label>
	<button class="submit-btn typcn typcn-zoom" type="submit"></button>
</form>